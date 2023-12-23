<?php

declare(strict_types=1);

use Fulll\Domain\Model\Fleet;
use Fulll\Domain\Model\Vehicle;
use Behat\Behat\Context\Context;
use Fulll\Infra\Repository\FleetRepository;
use Fulll\App\Command\RegisterVehicleCommand;
use Fulll\App\Handler\RegisterVehicleHandler;
use Fulll\Infra\Repository\VehicleRepository;

class FeatureContext implements Context
{
    private FleetRepository $fleetRepository;
    private VehicleRepository $vehicleRepository;
    private RegisterVehicleHandler $registerVehicleHandler;
    private Fleet $myFleet;
    private Fleet $otherUserFleet;
    private Vehicle $vehicle;
    private ?string $exceptionMessage = null;

    public function __construct()
    {
        $this->fleetRepository = new FleetRepository();
        $this->vehicleRepository = new VehicleRepository();
        $this->registerVehicleHandler = new RegisterVehicleHandler($this->fleetRepository, $this->vehicleRepository);
    }

    /**
     * @Given my fleet
     */
    public function myFleet()
    {
        $this->myFleet = new Fleet(1);

        $this->fleetRepository->save($this->myFleet);
    }

    /**
     * @Given a vehicle
     */
    public function aVehicle()
    {
        $this->vehicle = new Vehicle(1, 'ABC123');

        $this->vehicleRepository->save($this->vehicle);
    }

    /**
     * @When I register this vehicle into my fleet
     */
    public function iRegisterThisVehicleIntoMyFleet()
    {
        $command = new RegisterVehicleCommand($this->myFleet->getId(), $this->vehicle->getId(), $this->vehicle->getPlateNumber());
        $this->registerVehicleHandler->handle($command);
    }

    /**
     * @Then this vehicle should be part of my vehicle fleet
     */
    public function thisVehicleShouldBePartOfMyVehicleFleet()
    {
        $fleet = $this->fleetRepository->getById($this->myFleet->getId());
        $vehicles = $fleet->getVehicles();

        assert(in_array($this->vehicle, $vehicles), 'Vehicle is not part of the fleet.');
    }

    /**
     * @Given I have registered this vehicle into my fleet
     */
    public function iHaveRegisteredThisVehicleIntoMyFleet()
    {
        $command = new RegisterVehicleCommand($this->myFleet->getId(), $this->vehicle->getId(), $this->vehicle->getPlateNumber());
        $this->registerVehicleHandler->handle($command);
    }

    /**
     * @When I try to register this vehicle into my fleet
     */
    public function iTryToRegisterThisVehicleIntoMyFleet()
    {
        $command = new RegisterVehicleCommand($this->myFleet->getId(), $this->vehicle->getId(), $this->vehicle->getPlateNumber());
        try {
            $this->registerVehicleHandler->handle($command);
        } catch (\RuntimeException $exception) {
            $this->exceptionMessage = $exception->getMessage();
        }
    }

    /**
     * @Then I should be informed this this vehicle has already been registered into my fleet
     */
    public function iShouldBeInformedThisThisVehicleHasAlreadyBeenRegisteredIntoMyFleet()
    {
        assert(isset($this->exceptionMessage) && strpos($this->exceptionMessage, 'Vehicle is already registered in this fleet.') !== false);
    }

    /**
     * @Given the fleet of another user
     */
    public function theFleetOfAnotherUser()
    {
        $this->otherUserFleet = new Fleet(2);

        $this->fleetRepository->save($this->otherUserFleet);
    }

    /**
     * @Given this vehicle has been registered into the other user's fleet
     */
    public function thisVehicleHasBeenRegisteredIntoTheOtherUsersFleet()
    {
        $command = new RegisterVehicleCommand($this->otherUserFleet->getId(), $this->vehicle->getId(), $this->vehicle->getPlateNumber());
        $this->registerVehicleHandler->handle($command);
    }
}

<?php

namespace App\Handler;

use App\Command\RegisterVehicleCommand;
use Domain\Model\Fleet;
use Domain\Model\Vehicle;
use Infra\Repository\FleetRepository;
use Infra\Repository\VehicleRepository;

/**
 * RegisterVehicleHandler handles the registration of a vehicle into a fleet.
 *
 * This handler is responsible for executing the business logic associated with
 * the registration of a vehicle into a fleet based on the provided command.
 */
class RegisterVehicleHandler
{
    private FleetRepository $fleetRepository;
    private VehicleRepository $vehicleRepository;

    /**
     * Constructs a new RegisterVehicleHandler instance.
     *
     * @param FleetRepository   $fleetRepository   The repository for fleets.
     * @param VehicleRepository $vehicleRepository The repository for vehicles.
     */
    public function __construct(FleetRepository $fleetRepository, VehicleRepository $vehicleRepository)
    {
        $this->fleetRepository = $fleetRepository;
        $this->vehicleRepository = $vehicleRepository;
    }

    /**
     * Handles the RegisterVehicleCommand to register a vehicle into a fleet.
     *
     * @param RegisterVehicleCommand $command The registration command.
     *
     * @throws \RuntimeException If the vehicle is already registered.
     */
    public function handle(RegisterVehicleCommand $command): void
    {
        $fleetId = $command->getFleetId();
        $vehicleId = $command->getVehicleId();
        $plateNumber = $command->getPlateNumber();

        $fleet = $this->fleetRepository->getById($fleetId);
        if ($fleet === null) {
            $fleet = new Fleet($fleetId);
        }

        $existingVehicle = $this->vehicleRepository->getById($vehicleId);
        if ($existingVehicle !== null) {
            // Handle scenario: "I can't register the same vehicle twice"
            throw new \RuntimeException('This vehicle has already been registered.');
        }

        $vehicle = new Vehicle($vehicleId, $plateNumber);
        $fleet->addVehicle($vehicle);

        $this->fleetRepository->save($fleet);
        $this->vehicleRepository->save($vehicle);
    }
}

<?php

namespace Fulll\App\Handler;

use Fulll\App\Command\RegisterVehicleCommand;
use Fulll\Domain\Model\Fleet;
use Fulll\Domain\Model\Vehicle;
use Fulll\Infra\Repository\FleetRepository;
use Fulll\Infra\Repository\VehicleRepository;

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

        $fleet = $this->fleetRepository->getById($fleetId);
        if ($fleet === null) {
            throw new \RuntimeException('Fleet not found.');
        }

        $vehicle = $this->vehicleRepository->getById($vehicleId);
        if ($vehicle === null) {
            throw new \RuntimeException('Vehicle not found.');
        }

        if ($fleet->hasVehicle($vehicle)) {
            throw new \RuntimeException('Vehicle is already registered in this fleet.');
        }

        $fleet->addVehicle($vehicle);

        $this->fleetRepository->save($fleet);
    }
}

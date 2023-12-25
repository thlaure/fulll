<?php

namespace Fulll\App\Handler;

use Fulll\Domain\Model\Location;
use Fulll\App\Command\LocalizeVehicleCommand;
use Fulll\Infra\Repository\FleetRepository;
use Fulll\Infra\Repository\VehicleRepository;

/**
 * LocalizeVehicleHandler handles the localization of a vehicle.
 *
 * This handler is responsible for executing the business logic associated with
 * localizing a vehicle based on the provided command.
 */
class LocalizeVehicleHandler
{
    private FleetRepository $fleetRepository;
    private VehicleRepository $vehicleRepository;

    /**
     * Constructs a new LocalizeVehicleHandler instance.
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
     * Handles the LocalizeVehicleCommand to localize a vehicle.
     *
     * @param LocalizeVehicleCommand $command The localization command.
     *
     * @throws \RuntimeException If the fleet or vehicle is not found.
     */
    public function handle(LocalizeVehicleCommand $command): void
    {
        $fleetId = $command->getFleetId();
        $vehicleId = $command->getVehicleId();
        $lat = $command->getLat();
        $lng = $command->getLng();

        $fleet = $this->fleetRepository->getById($fleetId);
        if ($fleet === null) {
            throw new \RuntimeException('Fleet not found.');
        }

        $vehicle = $this->vehicleRepository->getById($vehicleId);
        if ($vehicle === null) {
            throw new \RuntimeException('Vehicle not found.');
        }

        if (!$fleet->hasVehicle($vehicle)) {
            throw new \RuntimeException('Vehicle is not part of the fleet.');
        }

        $currentLocation = $vehicle->getLocation();
        if ($currentLocation !== null && $currentLocation->getLat() === $lat && $currentLocation->getLng() === $lng) {
            throw new \RuntimeException('Vehicle is already parked at this location.');
        }

        $location = new Location($lat, $lng);
        $vehicle->localize($location);

        $this->vehicleRepository->save($vehicle);
    }
}

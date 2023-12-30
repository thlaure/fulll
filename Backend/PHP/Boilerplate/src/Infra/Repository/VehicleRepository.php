<?php

namespace Fulll\Infra\Repository;

use Fulll\Domain\Model\Location;
use PDO;
use Fulll\Domain\Model\Vehicle;
use Fulll\Infra\MySQLConnection;

/**
 * Repository for managing vehicles.
 */
class VehicleRepository
{
    private array $vehicles = [];

    /**
     * Gets a vehicle by its plate number.
     *
     * @param string $plateNumber The plate number of the vehicle.
     *
     * @return Vehicle|null The vehicle, or null if not found.
     */
    public function getByPlateNumber(string $plateNumber): ?Vehicle
    {
        foreach ($this->vehicles as $vehicle) {
            if ($vehicle->getPlateNumber() === $plateNumber) {
                return $vehicle;
            }
        }

        return null;
    }

    /**
     * Saves a vehicle.
     *
     * @param Vehicle $vehicle The vehicle to be saved.
     */
    public function save(Vehicle $vehicle): void
    {
        $this->vehicles[] = $vehicle;
    }
}

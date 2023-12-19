<?php

namespace Infra\Repository;

use Domain\Model\Vehicle;

/**
 * Repository for managing vehicles.
 */
class VehicleRepository
{
    private array $vehicles = [];

    /**
     * Finds a vehicles by its identifier.
     *
     * @param string $plateNumber The plate number of the vehicle.
     *
     * @return Vehicle|null The vehicle, or null if not found.
     */
    public function find(string $plateNumber): ?Vehicle
    {
        return $this->vehicles[$plateNumber] ?? null;
    }

    /**
     * Saves a vehicle.
     *
     * @param Vehicle $vehicle The vehicle to be saved.
     */
    public function save(Vehicle $vehicle): void
    {
        $this->vehicles[$vehicle->getPlateNumber()] = $vehicle;
    }
}

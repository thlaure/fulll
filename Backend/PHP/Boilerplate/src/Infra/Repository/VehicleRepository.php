<?php

namespace Fulll\Infra\Repository;

use Fulll\Domain\Model\Vehicle;

/**
 * Repository for managing vehicles.
 */
class VehicleRepository
{
    private array $vehicles = [];

    /**
     * Gets a vehicle by its identifier.
     *
     * @param int $id The identifier of the vehicle.
     *
     * @return Vehicle|null The vehicle, or null if not found.
     */
    public function getById(int $id): ?Vehicle
    {
        return $this->vehicles[$id] ?? null;
    }

    /**
     * Saves a vehicle.
     *
     * @param Vehicle $vehicle The vehicle to be saved.
     */
    public function save(Vehicle $vehicle): void
    {
        $this->vehicles[$vehicle->getId()] = $vehicle;
    }
}

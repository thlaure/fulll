<?php

namespace Fulll\Domain\Model;

/**
 * Represents a fleet of vehicles.
 */
class Fleet
{
    private int $id;
    private array $vehicles = [];

    /**
     * Initializes a new instance of the Fleet class.
     *
     * @param int $id The identifier of the fleet.
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * Gets the identifier of the fleet.
     *
     * @return int The fleet identifier.
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Adds a vehicle to the fleet.
     *
     * @param Vehicle $vehicle The vehicle to be added.
     */
    public function addVehicle(Vehicle $vehicle): void
    {
        $this->vehicles[] = $vehicle;
    }

    /**
     * Gets the list of vehicles in the fleet.
     *
     * @return array The list of vehicles.
     */
    public function getVehicles(): array
    {
        return $this->vehicles;
    }

    /**
     * Verifies if the fleet has a specific vehicle.
     *
     * @param Vehicle $vehicle The vehicle to be verified.
     * 
     * @return boolean
     */
    public function hasVehicle(Vehicle $vehicle): bool
    {
        foreach ($this->vehicles as $v) {
            if ($v->getId() === $vehicle->getId()) {
                return true;
            }
        }

        return false;
    }
}

<?php

namespace Domain\Model;

/**
 * Represents a fleet of vehicles.
 */
class Fleet
{
    private string $id;
    private array $vehicles = [];

    /**
     * Initializes a new instance of the Fleet class.
     *
     * @param string $id The identifier of the fleet.
     */
    public function __construct(string $id)
    {
        $this->id = $id;
    }

    /**
     * Gets the identifier of the fleet.
     *
     * @return string The fleet identifier.
     */
    public function getId(): string
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
}

<?php

namespace Fulll\Domain\Model;

/**
 * Represents a fleet of vehicles.
 */
class Fleet
{
    private int $id;
    private int $userId;
    private array $vehicles = [];

    /**
     * Initializes a new instance of the Fleet class.
     *
     * @param int $userId The identifier of user of the fleet.
     */
    public function __construct(int $userId)
    {
        $this->userId = $userId;
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
     * Sets the identifier of the fleet.
     *
     * @param int $id The fleet identifier.
     * 
     * @return void
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * Gets the identifier of the user of the fleet.
     *
     * @return int The user identifier.
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * Sets the identifier of the user of the fleet.
     *
     * @param int $userId The user identifier.
     * 
     * @return void
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
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
            if ($v->getPlateNumber() === $vehicle->getPlateNumber()) {
                return true;
            }
        }

        return false;
    }
}

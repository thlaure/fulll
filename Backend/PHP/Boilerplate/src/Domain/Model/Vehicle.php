<?php

namespace Fulll\Domain\Model;

/**
 * Represents a vehicle within the fleet.
 */
class Vehicle
{
    private int $id;
    private string $plateNumber;
    private ?Location $location = null;

    /**
     * Initializes a new instance of the Vehicle class.
     *
     * @param int $id The unique identifier of the vehicle.
     * @param string $plateNumber The plate number of the vehicle.
     */
    public function __construct(int $id, string $plateNumber)
    {
        $this->id = $id;
        $this->plateNumber = $plateNumber;
    }

    /**
     * Gets the unique identifier of the vehicle.
     *
     * @return int The unique identifier.
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Gets the plate number of the vehicle.
     *
     * @return string The plate number.
     */
    public function getPlateNumber(): string
    {
        return $this->plateNumber;
    }
    
    /**
     * Gets the location of the vehicle.
     *
     * @return Location|null The location of the vehicle, or null if not localized.
     */
    public function getLocation(): ?Location
    {
        return $this->location;
    }

    /**
     * Localizes the vehicle to a specific location.
     *
     * @param Location $location The location to which the vehicle is localized.
     */
    public function localize(Location $location): void
    {
        $this->location = $location;
    }
}

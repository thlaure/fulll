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
     * @param string $plateNumber The plate number of the vehicle.
     */
    public function __construct(string $plateNumber)
    {
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
     * Sets the unique identifier of the vehicle.
     *
     * @param int $id The unique identifier.
     * 
     * @return void
     */
    public function setId(int $id): void
    {
        $this->id = $id;
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
     * Sets the plate number of the vehicle.
     *
     * @param string $plateNumber The plate number.
     * 
     * @return void
     */
    public function setPlateNumber(string $plateNumber): void
    {
        $this->plateNumber = $plateNumber;
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
    public function setLocation(Location $location): void
    {
        $this->location = $location;
    }
}

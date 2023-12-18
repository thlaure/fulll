<?php

namespace Domain\Model;

/**
 * Represents a vehicle within the fleet.
 */
class Vehicle
{
    private string $plateNumber;

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
     * Gets the plate number of the vehicle.
     *
     * @return string The plate number.
     */
    public function getPlateNumber(): string
    {
        return $this->plateNumber;
    }
}

<?php

namespace Fulll\App\Command;

/**
 * RegisterVehicleCommand represents the command to register a vehicle into a fleet.
 *
 * This command carries the necessary data to execute the registration process,
 * including the fleet ID, vehicle ID, and the plate number of the vehicle.
 */
class RegisterVehicleCommand
{
    private int $fleetId;
    private int $vehicleId;
    private string $plateNumber;

    /**
     * Constructs a new RegisterVehicleCommand instance.
     *
     * @param int    $fleetId      The ID of the fleet.
     * @param int    $vehicleId    The ID of the vehicle.
     * @param string $plateNumber  The plate number of the vehicle.
     */
    public function __construct(int $fleetId, int $vehicleId, string $plateNumber)
    {
        $this->fleetId = $fleetId;
        $this->vehicleId = $vehicleId;
        $this->plateNumber = $plateNumber;
    }

    /**
     * Gets the fleet ID associated with the command.
     *
     * @return int The fleet ID.
     */
    public function getFleetId(): int
    {
        return $this->fleetId;
    }

    /**
     * Gets the vehicle ID associated with the command.
     *
     * @return int The vehicle ID.
     */
    public function getVehicleId(): int
    {
        return $this->vehicleId;
    }

    /**
     * Gets the plate number associated with the command.
     *
     * @return string The plate number.
     */
    public function getPlateNumber(): string
    {
        return $this->plateNumber;
    }
}

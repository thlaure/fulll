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
    private int $fleetUserId;
    private int $vehicleId;
    private string $plateNumber;

    /**
     * Constructs a new RegisterVehicleCommand instance.
     *
     * @param int    $fleetUserId      The user ID of the fleet.
     * @param string $plateNumber  The plate number of the vehicle.
     */
    public function __construct(int $fleetUserId, string $plateNumber)
    {
        $this->fleetUserId = $fleetUserId;
        $this->plateNumber = $plateNumber;
    }

    /**
     * Gets the fleet user ID associated with the command.
     *
     * @return int The fleet user ID.
     */
    public function getFleetUserId(): int
    {
        return $this->fleetUserId;
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

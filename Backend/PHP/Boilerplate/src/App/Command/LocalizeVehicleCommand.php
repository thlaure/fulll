<?php

namespace Fulll\App\Command;

use Fulll\Domain\Model\Location;

/**
 * LocalizeVehicleCommand represents the command to localize a vehicle to a specific location.
 */
class LocalizeVehicleCommand
{
    private int $fleetId;
    private int $vehicleId;
    private float $lat;
    private float $lng;
    private ?float $alt;

    /**
     * Constructs a new LocalizeVehicleCommand instance.
     *
     * @param int      $fleetId      The ID of the fleet.
     * @param int      $vehicleId    The ID of the vehicle.
     * @param float    $lat           The latitude coordinate.
     * @param float    $lng           The longitude coordinate.
     * @param float    $alt           The altitude coordinate.
     */
    public function __construct(int $fleetId, int $vehicleId, float $lat, float $lng, float $alt = null)
    {
        $this->fleetId = $fleetId;
        $this->vehicleId = $vehicleId;
        $this->lat = $lat;
        $this->lng = $lng;
        $this->alt = $alt;
    }

    /**
     * Gets the fleet ID associated with the command.
     *
     * @return integer The fleet ID.
     */
    public function getFleetId(): int
    {
        return $this->fleetId;
    }

    /**
     * Gets the vehicle ID associated with the command.
     *
     * @return integer The vehicle ID.
     */
    public function getVehicleId(): int
    {
        return $this->vehicleId;
    }

    /**
     * Gets the latitude coordinate associated with the command.
     *
     * @return float The latitude coordinate.
     */
    public function getLat(): float
    {
        return $this->lat;
    }

    /**
     * Gets the longitude coordinate associated with the command.
     *
     * @return float The longitude coordinate.
     */
    public function getLng(): float
    {
        return $this->lng;
    }

    /**
     * Gets the altitude coordinate associated with the command.
     *
     * @return float The altitude coordinate.
     */
    public function getAlt(): float
    {
        return $this->alt;
    }

    /**
     * Creates a Location object from the command data.
     *
     * @return Location The location.
     */
    public function getLocation(): Location
    {
        return new Location($this->lat, $this->lng, $this->alt);
    }
}

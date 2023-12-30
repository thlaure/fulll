<?php

namespace Fulll\App\Command;

use Fulll\Domain\Model\Location;

/**
 * LocalizeVehicleCommand represents the command to localize a vehicle to a specific location.
 */
class LocalizeVehicleCommand
{
    private int $fleetUserId;
    private string $plateNumber;
    private float $lat;
    private float $lng;
    private ?float $alt;

    /**
     * Constructs a new LocalizeVehicleCommand instance.
     *
     * @param int      $fleetUserId      The user ID of the fleet.
     * @param string   $plateNumber    The plate number of the vehicle.
     * @param float    $lat           The latitude coordinate.
     * @param float    $lng           The longitude coordinate.
     * @param ?float    $alt           The altitude coordinate.
     */
    public function __construct(int $fleetUserId, string $plateNumber, float $lat, float $lng, ?float $alt = null)
    {
        $this->fleetUserId = $fleetUserId;
        $this->plateNumber = $plateNumber;

        $this->validateLatitude($lat);
        $this->validateLongitude($lng);

        $this->lat = $lat;
        $this->lng = $lng;
        $this->alt = $alt;
    }

    /**
     * Validates the latitude coordinate.
     * 
     * @param float $lat The latitude coordinate.
     * 
     * @return void
     */
    private function validateLatitude(float $lat): void
    {
        if ($lat < -90 || $lat > 90) {
            throw new \InvalidArgumentException('Invalid latitude value.');
        }
    }

    /**
     * Validates the longitude coordinate.
     * 
     * @param float $lng The longitude coordinate.
     * 
     * @return void
     */
    private function validateLongitude(float $lng): void
    {
        if ($lng < -180 || $lng > 180) {
            throw new \InvalidArgumentException('Invalid longitude value.');
        }
    }

    /**
     * Gets the fleet user ID associated with the command.
     *
     * @return integer The fleet user ID.
     */
    public function getFleetUserId(): int
    {
        return $this->fleetUserId;
    }

    /**
     * Gets the vehicle plate number associated with the command.
     *
     * @return string The vehicle plate number.
     */
    public function getPlateNumber(): string
    {
        return $this->plateNumber;
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
     * @return ?float The altitude coordinate.
     */
    public function getAlt(): ?float
    {
        return $this->alt;
    }
}

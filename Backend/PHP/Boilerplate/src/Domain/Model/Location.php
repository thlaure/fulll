<?php

namespace Fulll\Domain\Model;

/**
 * Represents a location on the Earth using coordinates.
 */
class Location
{
    private float $lat;
    private float $lng;
    private ?float $alt;

    /**
     * Initializes a new instance of the Location class.
     *
     * @param float $lat The latitude coordinate.
     * @param float $lng The longitude coordinate.
     * @param ?float $alt The altitude coordinate.
     */
    public function __construct(float $lat, float $lng, float $alt = null)
    {
        $this->lat = $lat;
        $this->lng = $lng;
        $this->alt = $alt;
    }

    /**
     * Gets the latitude coordinate.
     *
     * @return float The latitude coordinate.
     */
    public function getLat(): float
    {
        return $this->lat;
    }

    /**
     * Sets the latitude coordinate.
     *
     * @param float $lat The latitude coordinate.
     * 
     * @return void
     */
    public function setLat(float $lat): void
    {
        $this->lat = $lat;
    }

    /**
     * Gets the longitude coordinate.
     *
     * @return float The longitude coordinate.
     */
    public function getLng(): float
    {
        return $this->lng;
    }

    /**
     * Sets the longitude coordinate.
     *
     * @param float $lng The longitude coordinate.
     * 
     * @return void
     */
    public function setLng(float $lng): void
    {
        $this->lng = $lng;
    }

    /**
     * Gets the altitude coordinate.
     *
     * @return ?float The altitude coordinate.
     */
    public function getAlt(): ?float
    {
        return $this->alt;
    }

    /**
     * Sets the altitude coordinate.
     *
     * @param ?float $alt The altitude coordinate.
     * 
     * @return void
     */
    public function setAlt(float $alt): void
    {
        $this->alt = $alt;
    }
}

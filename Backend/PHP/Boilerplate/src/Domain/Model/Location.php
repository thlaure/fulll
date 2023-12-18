<?php

namespace Domain\Model;

/**
 * Represents a location on the Earth using coordinates.
 */
class Location
{
    private float $lat;
    private float $lng;

    /**
     * Initializes a new instance of the Location class.
     *
     * @param float $lat The latitude coordinate.
     * @param float $lng The longitude coordinate.
     */
    public function __construct(float $lat, float $lng)
    {
        $this->lat = $lat;
        $this->lng = $lng;
    }

    public function getLat()
    {
        return $this->lat;
    }

    public function setLat(float $lat)
    {
        $this->lat = $lat;
    }

    public function getLng()
    {
        return $this->lng;
    }

    public function setLng(float $lng)
    {
        $this->lng = $lng;
    }
}

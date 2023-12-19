<?php

namespace Infra\Repository;

use Domain\Model\Fleet;

/**
 * Repository for managing fleets.
 */
class FleetRepository
{
    private array $fleets = [];

    /**
     * Gets a fleet by its identifier.
     *
     * @param int $fleetId The identifier of the fleet.
     *
     * @return Fleet|null The fleet, or null if not found.
     */
    public function getById(int $fleetId): ?Fleet
    {
        return $this->fleets[$fleetId] ?? null;
    }

    /**
     * Saves a fleet.
     *
     * @param Fleet $fleet The fleet to be saved.
     */
    public function save(Fleet $fleet): void
    {
        $this->fleets[$fleet->getId()] = $fleet;
    }
}

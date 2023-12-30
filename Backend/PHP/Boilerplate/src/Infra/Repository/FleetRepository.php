<?php

namespace Fulll\Infra\Repository;

use Fulll\Domain\Model\Fleet;

/**
 * Repository for managing fleets.
 */
class FleetRepository
{
    private array $fleets = [];

    /**
     * Gets a fleet by its user identifier.
     *
     * @param int $userId The identifier of the user of the fleet.
     *
     * @return Fleet|null The fleet, or null if not found.
     */
    public function getByUserId(int $userId): ?Fleet
    {
        foreach ($this->fleets as $fleet) {
            if ($fleet->getUserId() === $userId) {
                return $fleet;
            }
        }

        return null;
    }

    /**
     * Saves a fleet.
     *
     * @param Fleet $fleet The fleet to be saved.
     */
    public function save(Fleet $fleet): void
    {
        $this->fleets[] = $fleet;
    }
}

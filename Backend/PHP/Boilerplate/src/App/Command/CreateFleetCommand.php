<?php

namespace Fulll\App\Command;

/**
 * CreateFleetCommand represents the command to create a new fleet.
 */
class CreateFleetCommand
{
    private int $userId;

    /**
     * CreateFleetCommand constructor.
     *
     * @param int $userId The ID of the user creating the fleet.
     */
    public function __construct(int $userId)
    {
        $this->userId = $userId;
    }

    /**
     * Gets the user ID associated with the command.
     *
     * @return int The user ID.
     */
    public function getUserId(): int
    {
        return $this->userId;
    }
}

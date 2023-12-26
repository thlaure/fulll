<?php

namespace Fulll\App\Handler;

use Fulll\App\Command\CreateFleetCommand;
use Fulll\Domain\Model\Fleet;
use Fulll\Infra\Repository\FleetRepository;

/**
 * CreateFleetHandler handles the creation of a new fleet.
 */
class CreateFleetHandler
{
    private FleetRepository $fleetRepository;

    /**
     * CreateFleetHandler constructor.
     *
     * @param FleetRepository $fleetRepository The repository for fleets.
     */
    public function __construct(FleetRepository $fleetRepository)
    {
        $this->fleetRepository = $fleetRepository;
    }

    /**
     * Handles the CreateFleetCommand to create a new fleet.
     *
     * @param CreateFleetCommand $command The creation command.
     */
    public function handle(CreateFleetCommand $command): void
    {
        $userId = $command->getUserId();
        $fleet = new Fleet($userId);

        $this->fleetRepository->save($fleet);
    }
}

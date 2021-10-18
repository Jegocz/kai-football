<?php declare(strict_types=1);

namespace App\Model\EntityManager;

interface TeamsEntityManagerInterface
{
    /**
     * @param \App\Model\DataTransferObjects\TeamDataTransferObject[] $teams
     */
    public function save(array $teams): void;

    public function saveArray(array $teams): void;
}

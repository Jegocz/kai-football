<?php declare(strict_types=1);

namespace App\Model\EntityManager;

class TeamsEntityManager implements TeamsEntityManagerInterface
{
    /**
     * @param \App\Model\DataTransferObjects\TeamDataTransferObject[] $teams
     */
    public function save(array $teams): void
    {
        file_put_contents(__DIR__ . '/../../teams.json', json_encode($teams, JSON_PRETTY_PRINT));
    }

    public function saveArray(array $teams): void
    {
        file_put_contents(__DIR__ . '/../../teams.json', json_encode($teams, JSON_PRETTY_PRINT));
    }
}

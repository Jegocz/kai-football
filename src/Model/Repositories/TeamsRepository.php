<?php declare(strict_types=1);

namespace App\Model\Repositories;

class TeamsRepository implements TeamsRepositoryInterface
{
    /**
     * @return array
     */
    public function getTeams(): array
    {
        $teamsContent = file_get_contents(__DIR__ . '/../../teams.json');

        return json_decode($teamsContent, true);
    }

    /**
     * @param int $id
     *
     * @return array
     */
    public function getOneTeamById(int $id): array
    {
        $teams = $this->getTeams();

        foreach ($teams as $team) {
            if ($team['id'] === $id) {
                return $team;
            }
        }

        return [];
    }
}

<?php declare(strict_types=1);

namespace App\Model\Mapper;

use App\Model\DataTransferObjects\TeamDataTransferObject;

class TeamsMapper implements MapperInterface
{
    /**
     * @param array $teams
     *
     * @return array
     */
    public function __invoke(array $teams): array
    {
        $teamsArray = [];
        foreach ($teams as $team) {
            $teamDto = new TeamDataTransferObject();
            $teamDto->setId($team['id']);
            $teamDto->setName($team['name']);
            $teamDto->setAddress($team['address']);
            $teamDto->setWebsite($team['website']);
            $teamDto->setFounded($team['founded']);

            $teamsArray[] = $teamDto;
        }

        return $teamsArray;
    }
}

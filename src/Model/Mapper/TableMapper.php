<?php declare(strict_types=1);

namespace App\Model\Mapper;

use App\Model\DataTransferObjects\TableDataTransferObject;
use App\Model\DataTransferObjects\TablePositionDataTransferObject;
use App\Model\DataTransferObjects\TeamDataTransferObject;

class TableMapper implements MapperInterface
{
    /**
     * @param array $table
     *
     * @return \App\Model\DataTransferObjects\TableDataTransferObject|null
     */
    public function __invoke(array $table): ?TableDataTransferObject
    {
        if (empty($table)) {
            return null;
        }

        $tableDto = new TableDataTransferObject();

        $tablePositionsArray = [];
        foreach ($table as $tablePosition) {
            $tablePositionDto = new TablePositionDataTransferObject();
            $tablePositionDto->setPosition($tablePosition['position']);
            $tablePositionDto->setPoints($tablePosition['points']);

            $teamDto = new TeamDataTransferObject();
            $teamDto->setId($tablePosition['team']['id']);
            $teamDto->setName($tablePosition['team']['name']);

            $tablePositionDto->setTeam($teamDto);

            $tablePositionsArray[] = $tablePositionDto;
        }

        $tableDto->setTablePositions($tablePositionsArray);

        return $tableDto;
    }
}

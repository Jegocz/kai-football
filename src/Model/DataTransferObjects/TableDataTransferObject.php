<?php declare(strict_types=1);

namespace App\Model\DataTransferObjects;

class TableDataTransferObject
{
    /**
     * @var \App\Model\DataTransferObjects\TablePositionDataTransferObject[]
     */
    private $tablePositions;

    /**
     * @param array $tablePositions
     */
    public function __construct(array $tablePositions = [])
    {
        $this->tablePositions = $tablePositions;
    }

    /**
     * @return \App\Model\DataTransferObjects\TablePositionDataTransferObject[]
     */
    public function getTablePositions(): array
    {
        return $this->tablePositions;
    }

    /**
     * @param \App\Model\DataTransferObjects\TablePositionDataTransferObject[] $tablePositions
     */
    public function setTablePositions(array $tablePositions): void
    {
        $this->tablePositions = $tablePositions;
    }
}

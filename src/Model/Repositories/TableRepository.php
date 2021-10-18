<?php declare(strict_types=1);

namespace App\Model\Repositories;

use App\Model\DataTransferObjects\TableDataTransferObject;
use App\Model\Mapper\MapperInterface;

class TableRepository implements TableRepositoryInterface
{
    /**
     * @var \App\Model\Mapper\MapperInterface
     */
    private MapperInterface $tableMapper;

    /**
     * @param \App\Model\Mapper\MapperInterface $tableMapper
     */
    public function __construct(MapperInterface $tableMapper)
    {
        $this->tableMapper = $tableMapper;
    }

    /**
     * @return \App\Model\DataTransferObjects\TableDataTransferObject
     */
    public function getTable(): TableDataTransferObject
    {
        $tableContent = file_get_contents(__DIR__ . '/../../table.json');

        return json_decode($tableContent, true);
    }

    /**
     * @return \App\Model\DataTransferObjects\TableDataTransferObject|null
     */
    public function getTableAsArray(): ?TableDataTransferObject
    {
        $tableContent = file_get_contents(__DIR__ . '/../../table.json');
        $tableContentArray = json_decode($tableContent, true);

        return ($this->tableMapper)($tableContentArray);
    }
}

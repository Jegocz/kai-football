<?php declare(strict_types=1);

namespace App\Model\EntityManager;

use App\Model\DataTransferObjects\TableDataTransferObject;

class TableEntityManager implements TableEntityManagerInterface
{
    /**
     * @param \App\Model\DataTransferObjects\TableDataTransferObject $tableDataTransferObject
     */
    public function save(TableDataTransferObject $tableDataTransferObject): void
    {
        file_put_contents(__DIR__ . '/../../table.json', json_encode($tableDataTransferObject, JSON_PRETTY_PRINT));
    }

    public function saveArray(array $table): void
    {
        file_put_contents(__DIR__ . '/../../table.json', json_encode($table, JSON_PRETTY_PRINT));
    }
}

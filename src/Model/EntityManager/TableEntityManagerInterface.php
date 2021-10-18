<?php declare(strict_types=1);

namespace App\Model\EntityManager;

use App\Model\DataTransferObjects\TableDataTransferObject;

interface TableEntityManagerInterface
{
    /**
     * @param \App\Model\DataTransferObjects\TableDataTransferObject $tableDataTransferObject
     */
    public function save(TableDataTransferObject $tableDataTransferObject): void;

    public function saveArray(array $table): void;
}

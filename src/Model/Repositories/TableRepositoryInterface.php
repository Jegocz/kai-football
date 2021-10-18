<?php declare(strict_types=1);

namespace App\Model\Repositories;

use App\Model\DataTransferObjects\TableDataTransferObject;

interface TableRepositoryInterface
{
    /**
     * @return \App\Model\DataTransferObjects\TableDataTransferObject
     */
    public function getTable(): TableDataTransferObject;

    /**
     * @return TableDataTransferObject|null
     */
    public function getTableAsArray(): ?TableDataTransferObject;
}

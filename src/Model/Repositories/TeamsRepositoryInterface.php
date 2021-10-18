<?php declare(strict_types=1);

namespace App\Model\Repositories;

interface TeamsRepositoryInterface
{
    /**
     * @return array
     */
    public function getTeams(): array;
}

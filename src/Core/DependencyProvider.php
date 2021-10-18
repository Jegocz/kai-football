<?php declare(strict_types=1);

namespace App\Core;

use App\Controller\TableController;
use App\Controller\TeamController;
use App\Model\EntityManager\TableEntityManager;
use App\Model\EntityManager\TeamsEntityManager;
use App\Model\Mapper\TableMapper;
use App\Model\Mapper\TeamsMapper;
use App\Model\Repositories\TableRepository;
use App\Model\Repositories\TeamsRepository;

class DependencyProvider implements DependencyProviderInterface
{
    /**
     * @param \App\Core\ContainerInterface $container
     */
    public function provideDependencies(ContainerInterface $container): void
    {
        $container->set(TableEntityManager::class, new TableEntityManager());
        $container->set(TeamsEntityManager::class, new TeamsEntityManager());

        $tableMapper = new TableMapper();
        $container->set(TableMapper::class, $tableMapper);
        $container->set(TeamsMapper::class, new TeamsMapper());

        $container->set(TableRepository::class, new TableRepository($tableMapper));
        $container->set(TeamsRepository::class, new TeamsRepository());

        $container->set(Api::class, new Api());
        $container->set(View::class, new View());

        $container->set(TableController::class, new TableController($container));
        $container->set(TeamController::class, new TeamController($container));
    }
}

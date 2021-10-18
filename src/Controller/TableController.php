<?php declare(strict_types=1);

namespace App\Controller;

use App\Core\Api;
use App\Core\ContainerInterface;
use App\Core\View;
use App\Model\EntityManager\TableEntityManager;
use App\Model\Mapper\TableMapper;
use App\Model\Repositories\TableRepository;

class TableController implements ControllerInterface
{
    /**
     * @var \App\Core\ApiInterface
     */
    private $api;

    /**
     * @var \App\Model\Mapper\MapperInterface
     */
    private $tableMapper;
    /**
     * @var \App\Model\EntityManager\TableEntityManagerInterface
     */
    private $tableEntityManager;
    /**
     * @var \App\Model\Repositories\TableRepositoryInterface
     */
    private $tableRepository;
    /**
     * @var \App\Core\ViewInterface
     */
    private $view;

    /**
     * @param \App\Core\ContainerInterface $container
     */
    public function __construct(
        ContainerInterface $container
    )
    {
        $this->api = $container->get(Api::class);
        $this->tableMapper = $container->get(TableMapper::class);
        $this->tableEntityManager = $container->get(TableEntityManager::class);
        $this->tableRepository = $container->get(TableRepository::class);
        $this->view = $container->get(View::class);
    }

    /**
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function action(): void
    {
        $rawStandings = $this->api->getPlStandings();
        //$tableDto = ($this->tableMapper)($rawStandings['standings'][0]['table']);

        // for now
        // $this->tableEntityManager->save($tableDto);
        $this->tableEntityManager->saveArray($rawStandings['standings'][0]['table']);

        // for now
        // $tableDto = $this->tableRepository->getTable();
        $tableDto = $this->tableRepository->getTableAsArray();

        $this->view->render(
            'index.twig',
            [
                'table' => $tableDto
            ]
        );
    }
}

<?php declare(strict_types=1);

namespace App\Controller;

use App\Core\Api;
use App\Core\ApiInterface;
use App\Core\ContainerInterface;
use App\Core\View;
use App\Core\ViewInterface;
use App\Model\EntityManager\TeamsEntityManager;
use App\Model\Mapper\TeamsMapper;
use App\Model\Repositories\TeamsRepository;

class TeamController implements ControllerInterface
{
    /**
     * @var \App\Core\ApiInterface|mixed
     */
    private ApiInterface $api;
    /**
     * @var \App\Core\ViewInterface|mixed
     */
    private ViewInterface $view;
    /**
     * @var \App\Model\EntityManager\TeamsEntityManager
     */
    private TeamsEntityManager $teamsEntityManager;
    /**
     * @var \App\Model\Repositories\TeamsRepository
     */
    private TeamsRepository $teamsRepository;
    /**
     * @var \App\Model\Mapper\TeamsMapper|mixed
     */
    private TeamsMapper $teamsMapper;

    /**
     * @param \App\Core\ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->api = $container->get(Api::class);
        $this->view = $container->get(View::class);
        $this->teamsEntityManager = $container->get(TeamsEntityManager::class);
        $this->teamsRepository = $container->get(TeamsRepository::class);
        $this->teamsMapper = $container->get(TeamsMapper::class);
    }

    /**
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function action(): void
    {
        $rawTeams = $this->api->getTeams();
        //$teamDto = ($this->teamMapper)($rawTeams['teams']);

        // for now
        // $this->teamEntityManager->save($tableDto);
        $this->teamsEntityManager->saveArray($rawTeams['teams']);

        // for now
        // $teamsDto = $this->teamsRepository->getTable();
        $team = $this->teamsRepository->getOneTeamById((int)$_GET['id']);
        $teams = ($this->teamsMapper)([$team]);

        $teamDto = $teams[0];

        if (!$teamDto->getId()) {
            header("Location: " . '/');
            exit();
        }

        $this->view->render(
            'team.twig',
            [
                'team' => $teamDto
            ]
        );
    }
}

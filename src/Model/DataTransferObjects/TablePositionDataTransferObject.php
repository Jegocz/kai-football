<?php declare(strict_types=1);

namespace App\Model\DataTransferObjects;

class TablePositionDataTransferObject
{
    /**
     * @var int|null
     */
    private $position;
    /**
     * @var \App\Model\DataTransferObjects\TeamDataTransferObject|null
     */
    private $team;
    /**
     * @var int|null
     */
    private $points;

    /**
     * @param int|null $position
     * @param \App\Model\DataTransferObjects\TeamDataTransferObject|null $team
     * @param int|null $points
     */
    public function __construct(
        int $position = null,
        TeamDataTransferObject $team = null,
        int $points = null
    )
    {
        $this->position = $position;
        $this->team = $team;
        $this->points = $points;
    }

    /**
     * @return int|null
     */
    public function getPosition(): ?int
    {
        return $this->position;
    }

    /**
     * @param int|null $position
     */
    public function setPosition(?int $position): void
    {
        $this->position = $position;
    }

    /**
     * @return \App\Model\DataTransferObjects\TeamDataTransferObject|null
     */
    public function getTeam(): ?TeamDataTransferObject
    {
        return $this->team;
    }

    /**
     * @param \App\Model\DataTransferObjects\TeamDataTransferObject|null $team
     */
    public function setTeam(?TeamDataTransferObject $team): void
    {
        $this->team = $team;
    }

    /**
     * @return int|null
     */
    public function getPoints(): ?int
    {
        return $this->points;
    }

    /**
     * @param int|null $points
     */
    public function setPoints(?int $points): void
    {
        $this->points = $points;
    }
}

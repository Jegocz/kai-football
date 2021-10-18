<?php declare(strict_types=1);

namespace App\Model\DataTransferObjects;

class TeamDataTransferObject
{
    /**
     * @var int|null
     */
    private $id;
    /**
     * @var string|null
     */
    private $name;
    private ?string $address;
    private ?string $website;
    private ?int $founded;

    /**
     * @param int|null $id
     * @param string|null $name
     */
    public function __construct(
        int $id = null,
        string $name = null,
        string $address = null,
        string $website = null,
        int $founded = null
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
        $this->website = $website;
        $this->founded = $founded;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param string|null $address
     */
    public function setAddress(?string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return string|null
     */
    public function getWebsite(): ?string
    {
        return $this->website;
    }

    /**
     * @param string|null $website
     */
    public function setWebsite(?string $website): void
    {
        $this->website = $website;
    }

    /**
     * @return int|null
     */
    public function getFounded(): ?int
    {
        return $this->founded;
    }

    /**
     * @param int|null $founded
     */
    public function setFounded(?int $founded): void
    {
        $this->founded = $founded;
    }
}

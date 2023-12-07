<?php

namespace App\Entity;

use App\Repository\GroupRightsRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=GroupRightsRepository::class)
 * @ApiResource
 */
class GroupRights
{
    /**
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="doctrine.uuid_generator")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=group::class, inversedBy="groupRights")
     */
    private $group_id;

    /**
     * @ORM\ManyToOne(targetEntity=rights::class, inversedBy="groupRights")
     */
    private $rights_id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGroupId(): ?group
    {
        return $this->group_id;
    }

    public function setGroupId(?group $group_id): self
    {
        $this->group_id = $group_id;

        return $this;
    }

    public function getRightsId(): ?rights
    {
        return $this->rights_id;
    }

    public function setRightsId(?rights $rights_id): self
    {
        $this->rights_id = $rights_id;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
}

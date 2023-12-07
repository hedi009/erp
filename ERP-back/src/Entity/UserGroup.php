<?php

namespace App\Entity;

use App\Repository\UserGroupRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=UserGroupRepository::class)
 * @ApiResource
 */
class UserGroup
{
    /**
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="doctrine.uuid_generator")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=user::class, inversedBy="userGroups")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=group::class, inversedBy="userGroups")
     */
    private $groups;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(?user $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getGroups(): ?group
    {
        return $this->groups;
    }

    public function setGroups(?group $groups): self
    {
        $this->groups = $groups;

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\UserRightsRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource
 * @ORM\Entity(repositoryClass=UserRightsRepository::class)
 */
class UserRights
{
    /**
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="doctrine.uuid_generator")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="userRights")
     * @ORM\JoinColumn(nullable=true)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Rights::class, inversedBy="userRights")
     * @ORM\JoinColumn(nullable=true)
     */
    private $rights;

    public function getId(): ?string
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

    public function getRights(): ?rights
    {
        return $this->rights;
    }

    public function setRights(?rights $rights): self
    {
        $this->rights = $rights;

        return $this;
    }
}

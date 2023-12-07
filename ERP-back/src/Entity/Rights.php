<?php

namespace App\Entity;

use App\Repository\RightsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * @ApiResource
 * @ORM\Entity(repositoryClass=RightsRepository::class)
 */
class Rights
{
    /**
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="doctrine.uuid_generator")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $module;

    /**
     * @ORM\OneToMany(targetEntity=UserRights::class, mappedBy="rights")
     */
    private $userRights;

    /**
     * @ORM\OneToMany(targetEntity=GroupRights::class, mappedBy="rights_id")
     */
    private $groupRights;

    public function __construct()
    {
        $this->userRights = new ArrayCollection();
        $this->groupRights = new ArrayCollection();
    }





    public function getId(): ?string
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getModule(): ?string
    {
        return $this->module;
    }

    public function setModule(?string $module): self
    {
        $this->module = $module;

        return $this;
    }

    /**
     * @return Collection< int , UserRights>
     */
    public function getUserRights(): Collection
    {
        return $this->userRights;
    }

    public function addUserRight(UserRights $userRight): self
    {
        if (!$this->userRights->contains($userRight)) {
            $this->userRights[] = $userRight;
            $userRight->setRights($this);
        }

        return $this;
    }

    public function removeUserRight(UserRights $userRight): self
    {
        if ($this->userRights->removeElement($userRight)) {
            // set the owning side to null (unless already changed)
            if ($userRight->getRights() === $this) {
                $userRight->setRights(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, GroupRights>
     */
    public function getGroupRights(): Collection
    {
        return $this->groupRights;
    }

    public function addGroupRight(GroupRights $groupRight): self
    {
        if (!$this->groupRights->contains($groupRight)) {
            $this->groupRights[] = $groupRight;
            $groupRight->setRightsId($this);
        }

        return $this;
    }

    public function removeGroupRight(GroupRights $groupRight): self
    {
        if ($this->groupRights->removeElement($groupRight)) {
            // set the owning side to null (unless already changed)
            if ($groupRight->getRightsId() === $this) {
                $groupRight->setRightsId(null);
            }
        }

        return $this;
    }








}

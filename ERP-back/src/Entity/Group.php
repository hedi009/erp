<?php

namespace App\Entity;

use App\Repository\GroupRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;


/**
 * @ORM\Entity(repositoryClass=GroupRepository::class)
 * @ORM\Table(name="`group`")
 * @ApiResource
 */
class Group
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
     * @ORM\Column(type="datetime_immutable")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $updated_at;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=user::class, inversedBy="groups")
     */
    private $created_by;

    /**
     * @ORM\ManyToOne(targetEntity=user::class, inversedBy="groups")
     */
    private $deleted_by;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $deleted_at;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $deleted;

    /**
     * @ORM\OneToMany(targetEntity=GroupRights::class, mappedBy="group_id")
     */
    private $groupRights;

    /**
     * @ORM\OneToMany(targetEntity=UserGroup::class, mappedBy="groups")
     */
    private $userGroups;

    public function __construct()
    {
        $this->groupRights = new ArrayCollection();
        $this->userGroups = new ArrayCollection();
    }

    public function getId(): ?int
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

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeImmutable $updated_at): self
    {
        $this->updated_at = $updated_at;

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

    public function getCreatedBy(): ?user
    {
        return $this->created_by;
    }

    public function setCreatedBy(?user $created_by): self
    {
        $this->created_by = $created_by;

        return $this;
    }

    public function getDeletedBy(): ?user
    {
        return $this->deleted_by;
    }

    public function setDeletedBy(?user $deleted_by): self
    {
        $this->deleted_by = $deleted_by;

        return $this;
    }

    public function getDeletedAt(): ?\DateTimeImmutable
    {
        return $this->deleted_at;
    }

    public function setDeletedAt(\DateTimeImmutable $deleted_at): self
    {
        $this->deleted_at = $deleted_at;

        return $this;
    }

    public function getDeleted(): ?int
    {
        return $this->deleted;
    }

    public function setDeleted(?int $deleted): self
    {
        $this->deleted = $deleted;

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
            $groupRight->setGroupId($this);
        }

        return $this;
    }

    public function removeGroupRight(GroupRights $groupRight): self
    {
        if ($this->groupRights->removeElement($groupRight)) {
            // set the owning side to null (unless already changed)
            if ($groupRight->getGroupId() === $this) {
                $groupRight->setGroupId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, UserGroup>
     */
    public function getUserGroups(): Collection
    {
        return $this->userGroups;
    }

    public function addUserGroup(UserGroup $userGroup): self
    {
        if (!$this->userGroups->contains($userGroup)) {
            $this->userGroups[] = $userGroup;
            $userGroup->setGroups($this);
        }

        return $this;
    }

    public function removeUserGroup(UserGroup $userGroup): self
    {
        if ($this->userGroups->removeElement($userGroup)) {
            // set the owning side to null (unless already changed)
            if ($userGroup->getGroups() === $this) {
                $userGroup->setGroups(null);
            }
        }

        return $this;
    }
}

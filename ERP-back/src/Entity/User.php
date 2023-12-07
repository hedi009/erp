<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use ApiPlatform\Core\Annotation\ApiResource;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * @ApiResource
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="doctrine.uuid_generator")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true , nullable=true)
     */
    private $username;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;
    private $plainPassword;

    /**
     * @return mixed
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    /**
     * @param mixed $plainPassword
     */
    public function setPlainPassword($plainPassword): void
    {
        $this->plainPassword = $plainPassword;
    }

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $birth_date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $birth_place;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $first_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $last_name;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $employer;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $job;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $working_hours;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $salary;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $hiring_date;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $gender;

    /**
     * @ORM\Column(type="string", length=255 ,nullable=true)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $secondary_email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $national_registration_number;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $updated_at;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse_line1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse_line2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse_complement;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $facebook;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $skype;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $linkedin;



    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $validated_at;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $bar_code;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $private_note;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $public_note;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $reference;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $api_key;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $last_login_at;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $previous_login_at;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $start_validity;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $end_validity;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $internal;

    /**
     * @ORM\OneToMany(targetEntity=UserRights::class, mappedBy="user")
     */
    private $userRights;

    /**
     * @ORM\OneToMany(targetEntity=Group::class, mappedBy="created_by")
     */
    private $groups;

    /**
     * @ORM\OneToMany(targetEntity=UserGroup::class, mappedBy="user")
     */
    private $userGroups;

    public function __construct()
    {
        $this->groups = new ArrayCollection();
        $this->userGroups = new ArrayCollection();
    }







    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string)$this->email;
    }

    public function setUsername(string $email): self
    {
        $this->username =$email;


        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string)$this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birth_date;
    }

    public function setBirthDate(?\DateTimeInterface $birth_date): self
    {
        $this->birth_date = $birth_date;

        return $this;
    }

    public function getBirthPlace(): ?string
    {
        return $this->birth_place;
    }

    public function setBirthPlace(?string $birth_place): self
    {
        $this->birth_place = $birth_place;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(?string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(?string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getEmployer(): ?int
    {
        return $this->employer;
    }

    public function setEmployer(?int $employer): self
    {
        $this->employer = $employer;

        return $this;
    }

    public function getJob(): ?string
    {
        return $this->job;
    }

    public function setJob(?string $job): self
    {
        $this->job = $job;

        return $this;
    }

    public function getWorkingHours(): ?int
    {
        return $this->working_hours;
    }

    public function setWorkingHours(?int $working_hours): self
    {
        $this->working_hours = $working_hours;

        return $this;
    }

    public function getSalary(): ?float
    {
        return $this->salary;
    }

    public function setSalary(?float $salary): self
    {
        $this->salary = $salary;

        return $this;
    }

    public function getHiringDate(): ?\DateTimeInterface
    {
        return $this->hiring_date;
    }

    public function setHiringDate(?\DateTimeInterface $hiring_date): self
    {
        $this->hiring_date = $hiring_date;

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

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(?string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getSecondaryEmail(): ?string
    {
        return $this->secondary_email;
    }

    public function setSecondaryEmail(?string $secondary_email): self
    {
        $this->secondary_email = $secondary_email;

        return $this;
    }

    public function getNationalRegistrationNumber(): ?string
    {
        return $this->national_registration_number;
    }

    public function setNationalRegistrationNumber(?string $national_registration_number): self
    {
        $this->national_registration_number = $national_registration_number;

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

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getAdresseLine1(): ?string
    {
        return $this->adresse_line1;
    }

    public function setAdresseLine1(?string $adresse_line1): self
    {
        $this->adresse_line1 = $adresse_line1;

        return $this;
    }

    public function getAdresseLine2(): ?string
    {
        return $this->adresse_line2;
    }

    public function setAdresseLine2(string $adresse_line2): self
    {
        $this->adresse_line2 = $adresse_line2;

        return $this;
    }

    public function getAdresseComplement(): ?string
    {
        return $this->adresse_complement;
    }

    public function setAdresseComplement(?string $adresse_complement): self
    {
        $this->adresse_complement = $adresse_complement;

        return $this;
    }

    public function getFacebook(): ?string
    {
        return $this->facebook;
    }

    public function setFacebook(?string $facebook): self
    {
        $this->facebook = $facebook;

        return $this;
    }

    public function getSkype(): ?string
    {
        return $this->skype;
    }

    public function setSkype(?string $skype): self
    {
        $this->skype = $skype;

        return $this;
    }

    public function getLinkedin(): ?string
    {
        return $this->linkedin;
    }

    public function setLinkedin(?string $linkedin): self
    {
        $this->linkedin = $linkedin;

        return $this;
    }



    public function getValidatedAt(): ?\DateTimeImmutable
    {
        return $this->validated_at;
    }

    public function setValidatedAt(\DateTimeImmutable $validated_at): self
    {
        $this->validated_at = $validated_at;

        return $this;
    }

    public function getBarCode(): ?string
    {
        return $this->bar_code;
    }

    public function setBarCode(?string $bar_code): self
    {
        $this->bar_code = $bar_code;

        return $this;
    }

    public function getPrivateNote(): ?string
    {
        return $this->private_note;
    }

    public function setPrivateNote(?string $private_note): self
    {
        $this->private_note = $private_note;

        return $this;
    }

    public function getPublicNote(): ?string
    {
        return $this->public_note;
    }

    public function setPublicNote(?string $public_note): self
    {
        $this->public_note = $public_note;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getApiKey(): ?string
    {
        return $this->api_key;
    }

    public function setApiKey(?string $api_key): self
    {
        $this->api_key = $api_key;

        return $this;
    }

    public function getLastLoginAt(): ?\DateTimeImmutable
    {
        return $this->last_login_at;
    }

    public function setLastLoginAt(\DateTimeImmutable $last_login_at): self
    {
        $this->last_login_at = $last_login_at;

        return $this;
    }

    public function getPreviousLoginAt(): ?\DateTimeImmutable
    {
        return $this->previous_login_at;
    }

    public function setPreviousLoginAt(?\DateTimeImmutable $previous_login_at): self
    {
        $this->previous_login_at = $previous_login_at;

        return $this;
    }

    public function getStartValidity(): ?\DateTimeInterface
    {
        return $this->start_validity;
    }

    public function setStartValidity(?\DateTimeInterface $start_validity): self
    {
        $this->start_validity = $start_validity;

        return $this;
    }

    public function getEndValidity(): ?\DateTimeInterface
    {
        return $this->end_validity;
    }

    public function setEndValidity(?\DateTimeInterface $end_validity): self
    {
        $this->end_validity = $end_validity;

        return $this;
    }

    public function getInternal(): ?int
    {
        return $this->internal;
    }

    public function setInternal(?int $internal): self
    {
        $this->internal = $internal;

        return $this;
    }

    /**
     * @return Collection<int, UserRights>
     */
    public function getUserRights(): Collection
    {
        return $this->userRights;
    }

    public function addUserRight(UserRights $userRight): self
    {
        if (!$this->userRights->contains($userRight)) {
            $this->userRights[] = $userRight;
            $userRight->setUser($this);
        }

        return $this;
    }

    public function removeUserRight(UserRights $userRight): self
    {
        if ($this->userRights->removeElement($userRight)) {
            // set the owning side to null (unless already changed)
            if ($userRight->getUser() === $this) {
                $userRight->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Group>
     */
    public function getGroups(): Collection
    {
        return $this->groups;
    }

    public function addGroup(Group $group): self
    {
        if (!$this->groups->contains($group)) {
            $this->groups[] = $group;
            $group->setCreatedBy($this);
        }

        return $this;
    }

    public function removeGroup(Group $group): self
    {
        if ($this->groups->removeElement($group)) {
            // set the owning side to null (unless already changed)
            if ($group->getCreatedBy() === $this) {
                $group->setCreatedBy(null);
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
            $userGroup->setUser($this);
        }

        return $this;
    }

    public function removeUserGroup(UserGroup $userGroup): self
    {
        if ($this->userGroups->removeElement($userGroup)) {
            // set the owning side to null (unless already changed)
            if ($userGroup->getUser() === $this) {
                $userGroup->setUser(null);
            }
        }

        return $this;
    }







}
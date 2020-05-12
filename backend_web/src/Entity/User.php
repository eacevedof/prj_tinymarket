<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 *
 * @ORM\Table(name="base_user", uniqueConstraints={@ORM\UniqueConstraint(name="base_user_email_uindex", columns={"email"})})
 * @ORM\Entity
 */
class User extends BaseEntity implements UserInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     */
    private $email;

    /**
     * @var string|null
     * @ORM\Column(name="password", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $password = null;

    /**
     * @var string|null
     * @ORM\Column(name="phone", type="string", length=20, nullable=true, options={"default"="NULL"})
     */
    private $phone = null;

    /**
     * @var string|null
     * @ORM\Column(name="fullname", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $fullname = null;

    /**
     * @var string|null
     * @ORM\Column(name="address", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $address = null;

    /**
     * @var bool|null
     * @ORM\Column(name="age", type="boolean", nullable=true, options={"default"="NULL"})
     */
    private $age = null;

    /**
     * @var string|null
     * @ORM\Column(name="geo_location", type="string", length=500, nullable=true, options={"default"="NULL"})
     */
    private $geoLocation = null;

    /**
     * @var int|null
     * @ORM\Column(name="id_gender", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $idGender = null;

    /**
     * @var int|null
     * @ORM\Column(name="id_nationality", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $idNationality = null;

    /**
     * @var int|null
     * @ORM\Column(name="id_country", type="integer", nullable=true, options={"default"="NULL","comment"="app_array.type=country"})
     */
    private $idCountry = null;

    /**
     * @var int|null
     * @ORM\Column(name="id_language", type="integer", nullable=true, options={"default"="NULL","comment"="su idioma de preferencia"})
     */
    private $idLanguage = null;

    /**
     * @var string|null
     * @ORM\Column(name="path_picture", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $pathPicture = null;

    /**
     * @var int|null
     * @ORM\Column(name="id_profile", type="integer", nullable=true, options={"default"="NULL","comment"="app_array.type=profile: user,maintenaince,system"})
     */
    private $idProfile = null;

    /**
     * @var string|null
     * @ORM\Column(name="tokenreset", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $tokenreset = null;

    /**
     * @var int|null
     * @ORM\Column(name="log_attempts", type="integer", nullable=true)
     */
    private $logAttempts = '0';

    /**
     * @var int|null
     * @ORM\Column(name="rating", type="integer", nullable=true, options={"default"="NULL","comment"="la puntuacion"})
     */
    private $rating = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="date_validated", type="string", length=14, nullable=true, options={"default"="NULL","comment"="cuando valido su cuenta por email"})
     */
    private $dateValidated = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="code_cache", type="string", length=500, nullable=true, options={"default"="NULL"})
     */
    private $codeCache = null;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\App\Task", mappedBy="user")
     */
    private $tasks;


    /**
     * @return int
     */
    public function getId(): int {return $this->id;}

    /**
     * @param string $email
     */
    public function setEmail(string $email): void { $this->email = $email;}

    /**
     * @return string|null
     */
    public function getEmail(): ?string { return $this->email;}

    /**
     * @param string|null $password
     */
    public function setPassword(?string $password): void { $this->password = $password;}

    /**
     * @return string|null
     */
    public function getPassword(): ?string {return $this->password;}

    /**
     * @param string|null $fullname
     */
    public function setFullname(?string $fullname): void {$this->fullname = $fullname;}

    /**
     * @return string|null
     */
    public function getFullname(): ?string { return $this->fullname;}

    /**
     * @return int|null
     */
    public function getIdProfile(): ?int { return $this->idProfile;}

    /**
     * @param int|null $idProfile
     * @return User
     */
    public function setIdProfile(?int $idProfile): User
    {
        $this->idProfile = $idProfile;
        return $this;
    }
    /**
     * @inheritDoc
     */
    public function getRoles(){ return ["ROLE_$this->idProfile"];}

    /**
     * @inheritDoc
     */
    public function getSalt(){return null;}

    /**
     * @inheritDoc
     */
    public function getUsername(){return $this->email;}

    /**
     * @inheritDoc
     */
    public function eraseCredentials(){;}

    /**
     * @return Collection|Task[]
     */
    public function getTasks():Collection {return $this->tasks;}

}

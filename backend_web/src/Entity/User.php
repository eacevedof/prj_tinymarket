<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * User
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
     * @Groups({"all"})
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     */
    private $email;

    /**
     * @var string|null
     * @Groups({"all"})
     * @ORM\Column(name="password", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $password = null;

    /**
     * @var string|null
     * @Groups({"all"})
     * @ORM\Column(name="phone", type="string", length=20, nullable=true, options={"default"="NULL"})
     */
    private $phone = null;

    /**
     * @var string|null
     * @Groups({"all"})
     * @ORM\Column(name="fullname", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $fullname = null;

    /**
     * @var string|null
     * @Groups({"all"})
     * @ORM\Column(name="address", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $address = null;

    /**
     * @var bool|null
     * @Groups({"all"})
     * @ORM\Column(name="age", type="boolean", nullable=true, options={"default"="NULL"})
     */
    private $age = null;

    /**
     * @var string|null
     * @Groups({"all"})
     * @ORM\Column(name="geo_location", type="string", length=500, nullable=true, options={"default"="NULL"})
     */
    private $geoLocation = null;

    /**
     * @var int|null
     * @Groups({"all"})
     * @ORM\Column(name="id_gender", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $idGender = null;

    /**
     * @var int|null
     * @Groups({"all"})
     * @ORM\Column(name="id_nationality", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $idNationality = null;

    /**
     * @var int|null
     * @Groups({"all"})
     * @ORM\Column(name="id_country", type="integer", nullable=true, options={"default"="NULL","comment"="app_array.type=country"})
     */
    private $idCountry = null;

    /**
     * @var int|null
     * @Groups({"all"})
     * @ORM\Column(name="id_language", type="integer", nullable=true, options={"default"="NULL","comment"="su idioma de preferencia"})
     */
    private $idLanguage = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="path_picture", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $pathPicture = null;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_profile", type="integer", nullable=true, options={"default"="NULL","comment"="app_array.type=profile: user,maintenaince,system,enterprise, individual, client"})
     */
    private $idProfile = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tokenreset", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $tokenreset = null;

    /**
     * @var int|null
     *
     * @ORM\Column(name="log_attempts", type="integer", nullable=true)
     */
    private $logAttempts = '0';

    /**
     * @var int|null
     *
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
 * ==========================================================================================================
 * ==========================================================================================================
 * ==========================================================================================================
 */

    /**
     * @return string|null
     */
    public function getPassword(): ?string {return $this->password;}

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
     * @return int
     */
    public function getId(): int {return $this->id;}

    /**
     * @return string|null
     */
    public function getEmail(): ?string { return $this->email;}

    /**
     * @param string $email
     * @return User
     */
    public function setEmail(string $email): User
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @param string|null $password
     * @return User
     */
    public function setPassword(?string $password): User
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     * @return User
     */
    public function setPhone(?string $phone): User
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFullname(): ?string
    {
        return $this->fullname;
    }

    /**
     * @param string|null $fullname
     * @return User
     */
    public function setFullname(?string $fullname): User
    {
        $this->fullname = $fullname;
        return $this;
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
     * @return User
     */
    public function setAddress(?string $address): User
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getAge(): ?bool
    {
        return $this->age;
    }

    /**
     * @param bool|null $age
     * @return User
     */
    public function setAge(?bool $age): User
    {
        $this->age = $age;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getGeoLocation(): ?string
    {
        return $this->geoLocation;
    }

    /**
     * @param string|null $geoLocation
     * @return User
     */
    public function setGeoLocation(?string $geoLocation): User
    {
        $this->geoLocation = $geoLocation;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getIdGender(): ?int
    {
        return $this->idGender;
    }

    /**
     * @param int|null $idGender
     * @return User
     */
    public function setIdGender(?int $idGender): User
    {
        $this->idGender = $idGender;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getIdNationality(): ?int
    {
        return $this->idNationality;
    }

    /**
     * @param int|null $idNationality
     * @return User
     */
    public function setIdNationality(?int $idNationality): User
    {
        $this->idNationality = $idNationality;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getIdCountry(): ?int
    {
        return $this->idCountry;
    }

    /**
     * @param int|null $idCountry
     * @return User
     */
    public function setIdCountry(?int $idCountry): User
    {
        $this->idCountry = $idCountry;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getIdLanguage(): ?int
    {
        return $this->idLanguage;
    }

    /**
     * @param int|null $idLanguage
     * @return User
     */
    public function setIdLanguage(?int $idLanguage): User
    {
        $this->idLanguage = $idLanguage;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPathPicture(): ?string
    {
        return $this->pathPicture;
    }

    /**
     * @param string|null $pathPicture
     * @return User
     */
    public function setPathPicture(?string $pathPicture): User
    {
        $this->pathPicture = $pathPicture;
        return $this;
    }

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
     * @return int|null
     */
    public function getLogAttempts(): ?int
    {
        return $this->logAttempts;
    }

    /**
     * @param int|null $logAttempts
     * @return User
     */
    public function setLogAttempts(?int $logAttempts): User
    {
        $this->logAttempts = $logAttempts;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getRating(): ?int
    {
        return $this->rating;
    }

    /**
     * @param int|null $rating
     * @return User
     */
    public function setRating(?int $rating): User
    {
        $this->rating = $rating;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDateValidated(): ?string
    {
        return $this->dateValidated;
    }

    /**
     * @param string|null $dateValidated
     * @return User
     */
    public function setDateValidated(?string $dateValidated): User
    {
        $this->dateValidated = $dateValidated;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsNotificable(): ?bool
    {
        return $this->isNotificable;
    }

    /**
     * @param bool|null $isNotificable
     * @return User
     */
    public function setIsNotificable(?bool $isNotificable): User
    {
        $this->isNotificable = $isNotificable;
        return $this;
    }
}

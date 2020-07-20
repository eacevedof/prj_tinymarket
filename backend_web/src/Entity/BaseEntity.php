<?php
namespace App\Entity;

use App\Traits\LogTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

class BaseEntity
{
    use LogTrait;
    /**
     * @var string|null
     * @Groups({"admin","system"})
     * @ORM\Column(name="processflag", type="string", length=5, nullable=true, options={"default"="NULL"})
     */
    protected $processflag = null;

    /**
     * @var string|null
     * @Groups({"admin","system"})
     * @ORM\Column(name="insert_platform", type="string", length=3, nullable=true, options={"default"="'1'"})
     */
    protected $insertPlatform = '1';

    /**
     * @var string|null
     * @Groups({"admin","system"})
     * @ORM\Column(name="insert_user", type="string", length=15, nullable=true, options={"default"="NULL"})
     */
    protected $insertUser = null;

    /**
     * @var \DateTime|null
     * @Groups({"all"})
     * @ORM\Column(name="insert_date", type="datetime", nullable=true, options={"default"="NULL"})
     */
    protected $insertDate = null;

    /**
     * @var string|null
     * @Groups({"admin","system"})
     * @ORM\Column(name="update_platform", type="string", length=3, nullable=true, options={"default"="NULL"})
     */
    protected $updatePlatform = null;

    /**
     * @var string|null
     * @Groups({"all"})
     * @ORM\Column(name="update_user", type="string", length=15, nullable=true, options={"default"="NULL"})
     */
    protected $updateUser = null;

    /**
     * @var \DateTime|null
     * @Groups({"all"})
     * @ORM\Column(name="update_date", type="datetime", nullable=true, options={"default"="NULL"})
     */
    protected $updateDate = null;

    /**
     * @var string|null
     * @Groups({"admin","system"})
     * @ORM\Column(name="delete_platform", type="string", length=3, nullable=true, options={"default"="NULL"})
     */
    protected $deletePlatform = null;

    /**
     * @var string|null
     * @Groups({"admin","system"})
     * @ORM\Column(name="delete_user", type="string", length=15, nullable=true, options={"default"="NULL"})
     */
    protected $deleteUser = null;

    /**
     * @var \DateTime|null
     * @Groups({"admin","system"})
     * @ORM\Column(name="delete_date", type="datetime", nullable=true, options={"default"="NULL"})
     */
    protected $deleteDate = null;

    /**
     * @var string|null
     * @Groups({"admin","system"})
     * @ORM\Column(name="cru_csvnote", type="string", length=500, nullable=true, options={"default"="NULL"})
     */
    protected $cruCsvnote = null;

    /**
     * @var string|null
     * @Groups({"admin","system"})
     * @ORM\Column(name="is_erpsent", type="string", length=3, nullable=true, options={"default"="'0'"})
     */
    protected $isErpsent = '0';

    /**
     * @var string|null
     * @Groups({"admin","system"})
     * @ORM\Column(name="is_enabled", type="string", length=3, nullable=true, options={"default"="'1'"})
     */
    protected $isEnabled = '1';

    /**
     * @var int|null
     * @Groups({"admin","system"})
     * @ORM\Column(name="i", type="integer", nullable=true, options={"default"="NULL"})
     */
    protected $i = null;

    /**
     * @var string|null
     * @Groups({"all"})
     * @ORM\Column(name="code_erp", type="string", length=25, nullable=true, options={"default"="NULL"})
     */
    protected $codeErp = null;

    /**
     * @var string|null
     * @Groups({"all"})
     * @ORM\Column(name="description", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    protected $description = null;

    /**
     * @var string|null
     * @Groups({"all"})
     * @ORM\Column(name="code_cache", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    protected $codeCache = null;

/**
 * ==========================================================================================================
 * ==========================================================================================================
 * ==========================================================================================================
 */

    /**
     * @return string|null
     */
    public function getProcessflag(): ?string
    {
        return $this->processflag;
    }

    /**
     * @param string|null $processflag
     * @return BaseEntity
     */
    public function setProcessflag(?string $processflag): BaseEntity
    {
        $this->processflag = $processflag;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getInsertPlatform(): ?string
    {
        return $this->insertPlatform;
    }

    /**
     * @param string|null $insertPlatform
     * @return BaseEntity
     */
    public function setInsertPlatform(?string $insertPlatform): BaseEntity
    {
        $this->insertPlatform = $insertPlatform;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getInsertUser(): ?string
    {
        return $this->insertUser;
    }

    /**
     * @param string|null $insertUser
     * @return BaseEntity
     */
    public function setInsertUser(?string $insertUser): BaseEntity
    {
        $this->insertUser = $insertUser;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getInsertDate(): ?\DateTime
    {
        return $this->insertDate;
    }

    /**
     * @param \DateTime|null $insertDate
     * @return BaseEntity
     */
    public function setInsertDate(?\DateTime $insertDate): BaseEntity
    {
        $this->insertDate = $insertDate;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUpdatePlatform(): ?string
    {
        return $this->updatePlatform;
    }

    /**
     * @param string|null $updatePlatform
     * @return BaseEntity
     */
    public function setUpdatePlatform(?string $updatePlatform): BaseEntity
    {
        $this->updatePlatform = $updatePlatform;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUpdateUser(): ?string
    {
        return $this->updateUser;
    }

    /**
     * @param string|null $updateUser
     * @return BaseEntity
     */
    public function setUpdateUser(?string $updateUser): BaseEntity
    {
        $this->updateUser = $updateUser;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getUpdateDate(): ?\DateTime
    {
        return $this->updateDate;
    }

    /**
     * @param \DateTime|null $updateDate
     * @return BaseEntity
     */
    public function setUpdateDate(?\DateTime $updateDate): BaseEntity
    {
        $this->updateDate = $updateDate;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDeletePlatform(): ?string
    {
        return $this->deletePlatform;
    }

    /**
     * @param string|null $deletePlatform
     * @return BaseEntity
     */
    public function setDeletePlatform(?string $deletePlatform): BaseEntity
    {
        $this->deletePlatform = $deletePlatform;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDeleteUser(): ?string
    {
        return $this->deleteUser;
    }

    /**
     * @param string|null $deleteUser
     * @return BaseEntity
     */
    public function setDeleteUser(?string $deleteUser): BaseEntity
    {
        $this->deleteUser = $deleteUser;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getDeleteDate(): ?\DateTime
    {
        return $this->deleteDate;
    }

    /**
     * @param \DateTime|null $deleteDate
     * @return BaseEntity
     */
    public function setDeleteDate(?\DateTime $deleteDate): BaseEntity
    {
        $this->deleteDate = $deleteDate;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCruCsvnote(): ?string
    {
        return $this->cruCsvnote;
    }

    /**
     * @param string|null $cruCsvnote
     * @return BaseEntity
     */
    public function setCruCsvnote(?string $cruCsvnote): BaseEntity
    {
        $this->cruCsvnote = $cruCsvnote;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCodeErp(): ?string
    {
        return $this->codeErp;
    }

    /**
     * @return string|null
     */
    public function getIsErpsent(): ?string
    {
        return $this->isErpsent;
    }

    /**
     * @param string|null $isErpsent
     * @return BaseEntity
     */
    public function setIsErpsent(?string $isErpsent): BaseEntity
    {
        $this->isErpsent = $isErpsent;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getIsEnabled(): ?string
    {
        return $this->isEnabled;
    }

    /**
     * @param string|null $isEnabled
     * @return BaseEntity
     */
    public function setIsEnabled(?string $isEnabled): BaseEntity
    {
        $this->isEnabled = $isEnabled;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getI(): ?int
    {
        return $this->i;
    }

    /**
     * @param int|null $i
     * @return BaseEntity
     */
    public function setI(?int $i): BaseEntity
    {
        $this->i = $i;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string|null
     */
    public function getCodeCache(): ?string
    {
        return $this->codeCache;
    }

    /**
     * @param string|null $codeCache
     */
    public function setCodeCache(?string $codeCache): void
    {
        $this->codeCache = $codeCache;
    }

}
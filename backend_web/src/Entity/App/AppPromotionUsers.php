<?php

namespace App\Entity\App;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\BaseEntity;
/**
 * AppPromotionUsers
 *
 * @ORM\Table(name="app_promotion_users")
 * @ORM\Entity
 */
class AppPromotionUsers //extends BaseEntity
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
     * @var string|null
     *
     * @ORM\Column(name="processflag", type="string", length=5, nullable=true, options={"default"="NULL"})
     */
    private $processflag = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="insert_platform", type="string", length=3, nullable=true, options={"default"="'1'"})
     */
    private $insertPlatform = '1';

    /**
     * @var string|null
     *
     * @ORM\Column(name="insert_user", type="string", length=15, nullable=true, options={"default"="NULL"})
     */
    private $insertUser = null;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="insert_date", type="datetime", nullable=false, options={"default"="current_timestamp()"})
     */
    private $insertDate = 'current_timestamp()';

    /**
     * @var string|null
     *
     * @ORM\Column(name="update_platform", type="string", length=3, nullable=true, options={"default"="NULL"})
     */
    private $updatePlatform = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="update_user", type="string", length=15, nullable=true, options={"default"="NULL"})
     */
    private $updateUser = null;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="update_date", type="datetime", nullable=true, options={"default"="current_timestamp()"})
     */
    private $updateDate = 'current_timestamp()';

    /**
     * @var string|null
     *
     * @ORM\Column(name="delete_platform", type="string", length=3, nullable=true, options={"default"="NULL"})
     */
    private $deletePlatform = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="delete_user", type="string", length=15, nullable=true, options={"default"="NULL"})
     */
    private $deleteUser = null;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="delete_date", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $deleteDate = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cru_csvnote", type="string", length=500, nullable=true, options={"default"="NULL"})
     */
    private $cruCsvnote = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="is_erpsent", type="string", length=3, nullable=true, options={"default"="'0'"})
     */
    private $isErpsent = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="is_enabled", type="string", length=3, nullable=true, options={"default"="'1'"})
     */
    private $isEnabled = '1';

    /**
     * @var int|null
     *
     * @ORM\Column(name="i", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $i = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $description = null;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_user", type="integer", nullable=true, options={"default"="NULL","comment"="el usuario que se ha apuntado"})
     */
    private $idUser = null;

}

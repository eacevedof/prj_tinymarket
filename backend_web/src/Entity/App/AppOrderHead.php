<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AppOrderHead
 *
 * @ORM\Table(name="app_order_head")
 * @ORM\Entity
 */
class AppOrderHead
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
    private $processflag = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="insert_platform", type="string", length=3, nullable=true, options={"default"="'1'"})
     */
    private $insertPlatform = '\'1\'';

    /**
     * @var string|null
     *
     * @ORM\Column(name="insert_user", type="string", length=15, nullable=true, options={"default"="NULL"})
     */
    private $insertUser = 'NULL';

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
    private $updatePlatform = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="update_user", type="string", length=15, nullable=true, options={"default"="NULL"})
     */
    private $updateUser = 'NULL';

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
    private $deletePlatform = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="delete_user", type="string", length=15, nullable=true, options={"default"="NULL"})
     */
    private $deleteUser = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="delete_date", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $deleteDate = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="cru_csvnote", type="string", length=500, nullable=true, options={"default"="NULL"})
     */
    private $cruCsvnote = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="is_erpsent", type="string", length=3, nullable=true, options={"default"="'0'"})
     */
    private $isErpsent = '\'0\'';

    /**
     * @var string|null
     *
     * @ORM\Column(name="is_enabled", type="string", length=3, nullable=true, options={"default"="'1'"})
     */
    private $isEnabled = '\'1\'';

    /**
     * @var int|null
     *
     * @ORM\Column(name="i", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $i = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="code_erp", type="string", length=25, nullable=true, options={"default"="NULL"})
     */
    private $codeErp = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $description = 'NULL';

    /**
     * @var int
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false, options={"comment"="el comprador"})
     */
    private $idUser;

    /**
     * @var string|null
     *
     * @ORM\Column(name="address", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $address = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="total", type="decimal", precision=10, scale=3, nullable=true, options={"default"="0.000"})
     */
    private $total = '0.000';

    /**
     * @var string|null
     *
     * @ORM\Column(name="total1", type="decimal", precision=10, scale=3, nullable=true, options={"default"="0.000","comment"="en otra divisa"})
     */
    private $total1 = '0.000';

    /**
     * @var string|null
     *
     * @ORM\Column(name="total2", type="decimal", precision=10, scale=3, nullable=true, options={"default"="0.000","comment"="en otra divisa"})
     */
    private $total2 = '0.000';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_purchase", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $datePurchase = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_delivery", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $dateDelivery = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=500, nullable=true, options={"default"="NULL"})
     */
    private $notes = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes_admin", type="string", length=500, nullable=true, options={"default"="NULL"})
     */
    private $notesAdmin = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="status", type="string", length=25, nullable=true, options={"default"="NULL"})
     */
    private $status = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="code_cache", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $codeCache = 'NULL';

/**
 * ==========================================================================================================
 * ==========================================================================================================
 * ==========================================================================================================
 */
}

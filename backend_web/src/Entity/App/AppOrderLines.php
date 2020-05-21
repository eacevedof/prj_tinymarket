<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AppOrderLines
 *
 * @ORM\Table(name="app_order_lines")
 * @ORM\Entity
 */
class AppOrderLines
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
     * @var int|null
     *
     * @ORM\Column(name="id_order_head", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $idOrderHead = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_product", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $idProduct = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="units", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $units = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="tax_percent", type="decimal", precision=10, scale=3, nullable=true, options={"default"="0.000"})
     */
    private $taxPercent = '0.000';

    /**
     * @var string|null
     *
     * @ORM\Column(name="price_taxed", type="decimal", precision=10, scale=3, nullable=true, options={"default"="0.000"})
     */
    private $priceTaxed = '0.000';

    /**
     * @var string|null
     *
     * @ORM\Column(name="price", type="decimal", precision=10, scale=3, nullable=true, options={"default"="0.000"})
     */
    private $price = '0.000';

    /**
     * @var string|null
     *
     * @ORM\Column(name="price1", type="decimal", precision=10, scale=3, nullable=true, options={"default"="0.000"})
     */
    private $price1 = '0.000';

    /**
     * @var string|null
     *
     * @ORM\Column(name="price2", type="decimal", precision=10, scale=3, nullable=true, options={"default"="0.000"})
     */
    private $price2 = '0.000';

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_user", type="integer", nullable=true, options={"default"="NULL","comment"="el vendedor"})
     */
    private $idUser = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes_admin", type="string", length=500, nullable=true, options={"default"="NULL"})
     */
    private $notesAdmin = 'NULL';

/**
 * ==========================================================================================================
 * ==========================================================================================================
 * ==========================================================================================================
 */
}

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
     * @var int|null
     *
     * @ORM\Column(name="id_order_head", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $idOrderHead = null;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_product", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $idProduct = null;

    /**
     * @var int|null
     *
     * @ORM\Column(name="linenum", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $linenum = null;

    /**
     * @var int|null
     *
     * @ORM\Column(name="units", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $units = null;

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
    private $idUser = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes_admin", type="string", length=500, nullable=true, options={"default"="NULL"})
     */
    private $notesAdmin = null;

/**
 * ==========================================================================================================
 * ==========================================================================================================
 * ==========================================================================================================
 */


}

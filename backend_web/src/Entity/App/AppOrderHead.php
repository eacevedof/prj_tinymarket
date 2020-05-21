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
     * @ORM\Column(name="description", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $description = null;

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
    private $address = null;

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
    private $datePurchase = null;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_delivery", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $dateDelivery = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=500, nullable=true, options={"default"="NULL"})
     */
    private $notes = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes_admin", type="string", length=500, nullable=true, options={"default"="NULL"})
     */
    private $notesAdmin = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="status", type="string", length=25, nullable=true, options={"default"="NULL"})
     */
    private $status = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="code_cache", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $codeCache = null;

/**
 * ==========================================================================================================
 * ==========================================================================================================
 * ==========================================================================================================
 */
}

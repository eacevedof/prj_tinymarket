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
 * ==========================================================================================================
 * ==========================================================================================================
 * ==========================================================================================================
 */

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return AppOrderHead
     */
    public function setId(int $id): AppOrderHead
    {
        $this->id = $id;
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
     * @return AppOrderHead
     */
    public function setDescription(?string $description): AppOrderHead
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return int
     */
    public function getIdUser(): int
    {
        return $this->idUser;
    }

    /**
     * @param int $idUser
     * @return AppOrderHead
     */
    public function setIdUser(int $idUser): AppOrderHead
    {
        $this->idUser = $idUser;
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
     * @return AppOrderHead
     */
    public function setAddress(?string $address): AppOrderHead
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTotal(): ?string
    {
        return $this->total;
    }

    /**
     * @param string|null $total
     * @return AppOrderHead
     */
    public function setTotal(?string $total): AppOrderHead
    {
        $this->total = $total;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTotal1(): ?string
    {
        return $this->total1;
    }

    /**
     * @param string|null $total1
     * @return AppOrderHead
     */
    public function setTotal1(?string $total1): AppOrderHead
    {
        $this->total1 = $total1;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTotal2(): ?string
    {
        return $this->total2;
    }

    /**
     * @param string|null $total2
     * @return AppOrderHead
     */
    public function setTotal2(?string $total2): AppOrderHead
    {
        $this->total2 = $total2;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getDatePurchase(): ?\DateTime
    {
        return $this->datePurchase;
    }

    /**
     * @param \DateTime|null $datePurchase
     * @return AppOrderHead
     */
    public function setDatePurchase(?\DateTime $datePurchase): AppOrderHead
    {
        $this->datePurchase = $datePurchase;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getDateDelivery(): ?\DateTime
    {
        return $this->dateDelivery;
    }

    /**
     * @param \DateTime|null $dateDelivery
     * @return AppOrderHead
     */
    public function setDateDelivery(?\DateTime $dateDelivery): AppOrderHead
    {
        $this->dateDelivery = $dateDelivery;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNotes(): ?string
    {
        return $this->notes;
    }

    /**
     * @param string|null $notes
     * @return AppOrderHead
     */
    public function setNotes(?string $notes): AppOrderHead
    {
        $this->notes = $notes;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNotesAdmin(): ?string
    {
        return $this->notesAdmin;
    }

    /**
     * @param string|null $notesAdmin
     * @return AppOrderHead
     */
    public function setNotesAdmin(?string $notesAdmin): AppOrderHead
    {
        $this->notesAdmin = $notesAdmin;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string|null $status
     * @return AppOrderHead
     */
    public function setStatus(?string $status): AppOrderHead
    {
        $this->status = $status;
        return $this;
    }

}

<?php

namespace App\Entity\App;

use App\Entity\BaseEntity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * AppOrderLines
 *
 * @ORM\Table(name="app_order_lines")
 * @ORM\Entity
 */
class AppOrderLines extends  BaseEntity
{
    /**
     * @var int
     * @Groups({"all"})
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int|null
     * @Groups({"all"})
     * @ORM\Column(name="id_order_head", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $idOrderHead = null;

    /**
     * @var int|null
     * @Groups({"all"})
     * @ORM\Column(name="id_product", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $idProduct = null;

    /**
     * @var int|null
     * @Groups({"all"})
     * @ORM\Column(name="linenum", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $linenum = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="product", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $product = null;

    /**
     * @var int|null
     * @Groups({"all"})
     * @ORM\Column(name="units", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $units = null;

    /**
     * @var string|null
     * @Groups({"all"})
     * @ORM\Column(name="tax_percent", type="decimal", precision=10, scale=3, nullable=true, options={"default"="0.000"})
     */
    private $taxPercent = 0;

    /**
     * @var string|null
     * @Groups({"all"})
     * @ORM\Column(name="price_taxed", type="decimal", precision=10, scale=3, nullable=true, options={"default"="0.000"})
     */
    private $priceTaxed = 0;

    /**
     * @var string|null
     * @Groups({"all"})
     * @ORM\Column(name="price", type="decimal", precision=10, scale=3, nullable=true, options={"default"="0.000"})
     */
    private $price = 0;

    /**
     * @var string|null
     * @Groups({"all"})
     * @ORM\Column(name="price1", type="decimal", precision=10, scale=3, nullable=true, options={"default"="0.000"})
     */
    private $price1 = 0;

    /**
     * @var string|null
     * @Groups({"asl"})
     * @ORM\Column(name="price2", type="decimal", precision=10, scale=3, nullable=true, options={"default"="0.000"})
     */
    private $price2 = 0;

    /**
     * @var string|null
     * @Groups({"all"})
     * @ORM\Column(name="total", type="decimal", precision=10, scale=3, nullable=true, options={"default"="0.000"})
     */
    private $total = 0;

    /**
     * @var string|null
     * @Groups({"all"})
     * @ORM\Column(name="total1", type="decimal", precision=10, scale=3, nullable=true, options={"default"="0.000"})
     */
    private $total1 = 0;

    /**
     * @var string|null
     * @Groups({"all"})
     * @ORM\Column(name="total2", type="decimal", precision=10, scale=3, nullable=true, options={"default"="0.000"})
     */
    private $total2 = 0;


    /**
     * @var int|null
     * @Groups({"all"})
     * @ORM\Column(name="id_user", type="integer", nullable=true, options={"default"="NULL","comment"="el vendedor"})
     */
    private $idUser = null;

    /**
     * @var string|null
     * @Groups({"all"})
     * @ORM\Column(name="notes_admin", type="string", length=500, nullable=true, options={"default"="NULL"})
     */
    private $notesAdmin = null;

    //no existe en bd, la rescribo para evitar error con los getters
    protected $codeCache = null;

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
     * @return AppOrderLines
     */
    public function setId(int $id): AppOrderLines
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getIdOrderHead(): ?int
    {
        return $this->idOrderHead;
    }

    /**
     * @param int|null $idOrderHead
     * @return AppOrderLines
     */
    public function setIdOrderHead(?int $idOrderHead): AppOrderLines
    {
        $this->idOrderHead = $idOrderHead;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getIdProduct(): ?int
    {
        return $this->idProduct;
    }

    /**
     * @param int|null $idProduct
     * @return AppOrderLines
     */
    public function setIdProduct(?int $idProduct): AppOrderLines
    {
        $this->idProduct = $idProduct;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getLinenum(): ?int
    {
        return $this->linenum;
    }

    /**
     * @param int|null $linenum
     * @return AppOrderLines
     */
    public function setLinenum(?int $linenum): AppOrderLines
    {
        $this->linenum = $linenum;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getProduct(): ?string
    {
        return $this->product;
    }

    /**
     * @param string|null $product
     * @return AppOrderLines
     */
    public function setProduct(?string $product): AppOrderLines
    {
        $this->product = $product;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getUnits(): ?int
    {
        return $this->units;
    }

    /**
     * @param int|null $units
     * @return AppOrderLines
     */
    public function setUnits(?int $units): AppOrderLines
    {
        $this->units = $units;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTaxPercent(): ?string
    {
        return $this->taxPercent;
    }

    /**
     * @param string|null $taxPercent
     * @return AppOrderLines
     */
    public function setTaxPercent(?string $taxPercent): AppOrderLines
    {
        $this->taxPercent = $taxPercent;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPriceTaxed(): ?string
    {
        return $this->priceTaxed;
    }

    /**
     * @param string|null $priceTaxed
     * @return AppOrderLines
     */
    public function setPriceTaxed(?string $priceTaxed): AppOrderLines
    {
        $this->priceTaxed = $priceTaxed;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPrice(): ?string
    {
        return $this->price;
    }

    /**
     * @param string|null $price
     * @return AppOrderLines
     */
    public function setPrice(?string $price): AppOrderLines
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPrice1(): ?string
    {
        return $this->price1;
    }

    /**
     * @param string|null $price1
     * @return AppOrderLines
     */
    public function setPrice1(?string $price1): AppOrderLines
    {
        $this->price1 = $price1;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPrice2(): ?string
    {
        return $this->price2;
    }

    /**
     * @param string|null $price2
     * @return AppOrderLines
     */
    public function setPrice2(?string $price2): AppOrderLines
    {
        $this->price2 = $price2;
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
     * @return AppOrderLines
     */
    public function setTotal(?string $total): AppOrderLines
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
     * @return AppOrderLines
     */
    public function setTotal1(?string $total1): AppOrderLines
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
     * @return AppOrderLines
     */
    public function setTotal2(?string $total2): AppOrderLines
    {
        $this->total2 = $total2;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    /**
     * @param int|null $idUser
     * @return AppOrderLines
     */
    public function setIdUser(?int $idUser): AppOrderLines
    {
        $this->idUser = $idUser;
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
     * @return AppOrderLines
     */
    public function setNotesAdmin(?string $notesAdmin): AppOrderLines
    {
        $this->notesAdmin = $notesAdmin;
        return $this;
    }

}

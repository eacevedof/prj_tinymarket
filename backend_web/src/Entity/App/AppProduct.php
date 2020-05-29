<?php
namespace App\Entity\App;

use App\Entity\BaseEntity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * AppProduct
 *
 * @ORM\Table(name="app_product")
 * @ORM\Entity
 */
class AppProduct extends BaseEntity
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
     * @var string|null
     * @Groups({"all"})
     * @ORM\Column(name="description_full", type="string", length=3000, nullable=true, options={"default"="NULL"})
     */
    private $descriptionFull = null;

    /**
     * @var string|null
     * @Groups({"all"})
     * @ORM\Column(name="slug", type="string", length=75, nullable=true, options={"default"="NULL"})
     */
    private $slug = null;

    /**
     * @var int
     * @Groups({"all"})
     * @ORM\Column(name="units_min", type="integer", nullable=false, options={"default"="1"})
     */
    private $unitsMin = 1;

    /**
     * @var int
     * @Groups({"all"})
     * @ORM\Column(name="units_max", type="integer", nullable=false, options={"default"="99999"})
     */
    private $unitsMax = 99999;

    /**
     * @var string|null
     * @Groups({"admin","system","enterprise","individual"})
     * @ORM\Column(name="price_gross", type="decimal", precision=10, scale=3, nullable=true, options={"default"="0"})
     */
    private $priceGross = 0;

    /**
     * @var string|null
     * @Groups({"all"})
     * @ORM\Column(name="tax_percent", type="decimal", precision=10, scale=3, nullable=true, options={"default"="0"})
     */
    private $taxPercent = 0;

    /**
     * @var string|null
     * @ORM\Column(name="price_taxed", type="decimal", precision=10, scale=3, nullable=true, options={"default"="0"})
     */
    private $priceTaxed = 0;

    /**
     * @var string
     * @Groups({"all"})
     * @ORM\Column(name="price_prev", type="decimal", precision=10, scale=3, nullable=false, options={"default"="0"})
     */
    private $pricePrev = 0;

    /**
     * @var string
     * @Groups({"all"})
     * @ORM\Column(name="price_sale", type="decimal", precision=10, scale=3, nullable=false, options={"default"="0"})
     */
    private $priceSale = 0;

    /**
     * @var string|null
     * @Groups({"all"})
     * @ORM\Column(name="price_sale1", type="decimal", precision=10, scale=3, nullable=true, options={"default"="0.000","comment"="precio en otra moneda"})
     */
    private $priceSale1 = 0;

    /**
     * @var string|null
     * @Groups({"all"})
     * @ORM\Column(name="price_sale2", type="decimal", precision=10, scale=3, nullable=true, options={"default"="0.000","comment"="percio en otra moneda"})
     */
    private $priceSale2 = 0;

    /**
     * @var int
     * @Groups({"all"})
     * @ORM\Column(name="id_user", type="integer", nullable=false, options={"comment"="empresa o usuario propietario"})
     */
    private $idUser;

    /**
     * @var int|null
     * @Groups({"all"})
     * @ORM\Column(name="order_by", type="integer", nullable=true, options={"default"="100"})
     */
    private $orderBy = 100;

    /**
     * @var bool|null
     * @Groups({"all"})
     * @ORM\Column(name="display", type="boolean", nullable=true, options={"default"="NULL"})
     */
    private $display = null;

    /**
     * @var string|null
     * @Groups({"all"})
     * @ORM\Column(name="stock_units", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $stockUnits = 0;

    /**
     * @var int|null
     * @Groups({"all"})
     * @ORM\Column(name="id_unit", type="integer", nullable=true, options={"default"="1","comment"="kg, cajas, unidades, etc"})
     */
    private $idUnit = 1;

    /**
     * @var string|null
     * @Groups({"all"})
     * @ORM\Column(name="url_image", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $urlImage = null;
/**
 * ==========================================================================================================
 * ==========================================================================================================
 * ==========================================================================================================
 */
    /**
     * @return string|null
     */
    public function getDescriptionFull(): ?string
    {
        return $this->descriptionFull;
    }

    /**
     * @param string|null $descriptionFull
     */
    public function setDescriptionFull(?string $descriptionFull): void
    {
        $this->descriptionFull = $descriptionFull;
    }

    /**
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * @param string|null $slug
     */
    public function setSlug(?string $slug): void
    {
        $this->slug = $slug;
    }

    /**
     * @return int
     */
    public function getUnitsMin(): int
    {
        return $this->unitsMin;
    }

    /**
     * @param int $unitsMin
     */
    public function setUnitsMin(int $unitsMin): void
    {
        $this->unitsMin = $unitsMin;
    }

    /**
     * @return int
     */
    public function getUnitsMax(): int
    {
        return $this->unitsMax;
    }

    /**
     * @param int $unitsMax
     */
    public function setUnitsMax(int $unitsMax): void
    {
        $this->unitsMax = $unitsMax;
    }

    /**
     * @return string|null
     */
    public function getPriceGross(): ?string
    {
        return $this->priceGross;
    }

    /**
     * @param string|null $priceGross
     */
    public function setPriceGross(?string $priceGross): void
    {
        $this->priceGross = $priceGross;
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
     */
    public function setTaxPercent(?string $taxPercent): void
    {
        $this->taxPercent = $taxPercent;
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
     */
    public function setPriceTaxed(?string $priceTaxed): void
    {
        $this->priceTaxed = $priceTaxed;
    }

    /**
     * @return string
     */
    public function getPricePrev(): string
    {
        return $this->pricePrev;
    }

    /**
     * @param string $pricePrev
     */
    public function setPricePrev(string $pricePrev): void
    {
        $this->pricePrev = $pricePrev;
    }

    /**
     * @return string
     */
    public function getPriceSale(): string
    {
        return $this->priceSale;
    }

    /**
     * @param string $priceSale
     */
    public function setPriceSale(string $priceSale): void
    {
        $this->priceSale = $priceSale;
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
     */
    public function setIdUser(int $idUser): void
    {
        $this->idUser = $idUser;
    }

    /**
     * @return int|null
     */
    public function getOrderBy(): ?int
    {
        return $this->orderBy;
    }

    /**
     * @param int|null $orderBy
     */
    public function setOrderBy(?int $orderBy): void
    {
        $this->orderBy = $orderBy;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getPriceSale1(): ?string
    {
        return $this->priceSale1;
    }

    /**
     * @param string|null $priceSale1
     */
    public function setPriceSale1(?string $priceSale1): void
    {
        $this->priceSale1 = $priceSale1;
    }

    /**
     * @return string|null
     */
    public function getPriceSale2(): ?string
    {
        return $this->priceSale2;
    }

    /**
     * @param string|null $priceSale2
     */
    public function setPriceSale2(?string $priceSale2): void
    {
        $this->priceSale2 = $priceSale2;
    }

    /**
     * @return bool|null
     */
    public function getDisplay(): ?bool
    {
        return $this->display;
    }

    /**
     * @param bool|null $display
     */
    public function setDisplay(?bool $display): void
    {
        $this->display = $display;
    }

    /**
     * @return string|null
     */
    public function getStockUnits(): ?string
    {
        return $this->stockUnits;
    }

    /**
     * @param string|null $stockUnits
     */
    public function setStockUnits(?string $stockUnits): void
    {
        $this->stockUnits = $stockUnits;
    }

    /**
     * @return int|null
     */
    public function getIdUnit(): ?int
    {
        return $this->idUnit;
    }

    /**
     * @param int|null $idUnit
     */
    public function setIdUnit(?int $idUnit): void
    {
        $this->idUnit = $idUnit;
    }

    /**
     * @return string|null
     */
    public function getUrlImage(): ?string
    {
        return $this->urlImage;
    }

    /**
     * @param string|null $urlImage
     */
    public function setUrlImage(?string $urlImage): void
    {
        $this->urlImage = $urlImage;
    }

}

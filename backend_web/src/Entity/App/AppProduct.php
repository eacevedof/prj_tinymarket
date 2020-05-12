<?php
namespace App\Entity\App;

use App\Entity\BaseEntity;
use Doctrine\ORM\Mapping as ORM;

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
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     * @ORM\Column(name="description_full", type="string", length=3000, nullable=true, options={"default"="NULL"})
     */
    private $descriptionFull = null;

    /**
     * @var string|null
     * @ORM\Column(name="slug", type="string", length=75, nullable=true, options={"default"="NULL"})
     */
    private $slug = null;

    /**
     * @var int
     * @ORM\Column(name="units_min", type="integer", nullable=false, options={"default"="1"})
     */
    private $unitsMin = '1';

    /**
     * @var int
     * @ORM\Column(name="units_max", type="integer", nullable=false, options={"default"="99999"})
     */
    private $unitsMax = '99999';

    /**
     * @var string|null
     *
     * @ORM\Column(name="price_gross", type="decimal", precision=10, scale=3, nullable=true, options={"default"="0"})
     */
    private $priceGross = 0;

    /**
     * @var string|null
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
     * @ORM\Column(name="price_sale", type="decimal", precision=10, scale=3, nullable=false, options={"default"="0"})
     */
    private $priceSale = 0;

    /**
     * @var int
     * @ORM\Column(name="user_id", type="integer", nullable=false, options={"comment"="empresa o usuario propietario"})
     */
    private $userId;

    /**
     * @var int|null
     * @ORM\Column(name="order_by", type="integer", nullable=true, options={"default"="100"})
     */
    private $orderBy = '100';

    /**
     * @var string|null
     * @ORM\Column(name="code_cache", type="string", length=500, nullable=true, options={"default"="NULL"})
     */
    private $codeCache = null;

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
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
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

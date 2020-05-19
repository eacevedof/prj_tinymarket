<?php
// src/Repository/ProductRepository.php
declare(strict_types=1);

namespace App\Repository;

use App\Entity\App\AppProduct;

class ProductRepository extends BaseRepository
{
    //en el construct se define objectRepository a partir del nombre de la clase de la entidad

    protected static function entityClass(): string
    {
        return AppProduct::class;
    }

    public function findOneById(string $id): ?AppProduct
    {
        /**
         * @var AppProduct $product
         */
        $product = $this->objectRepository->find($id);
        return $product;
    }


    public function findBy(array $criteria, ?array $orderBy = null, $limit = null, $offset = null)
    {
        /** @var AppProduct $product */
        $product = $this->objectRepository->findBy($criteria,  $orderBy, $limit, $offset);
        return $product;
    }

    public function findAll()
    {
        return $this->objectRepository->findAll();
    }

    public function findAllByPage($currentPage=1, $limit=3)
    {
        $qb = $this->getOrmQueryBuilder();
        $qb->select("p")
            ->from(self::entityClass(),"p")
            ->where($qb->expr()->isNull("p.deleteDate"))
            ->andWhere("p.isEnabled=:isEnabled")
            ->setParameter("isEnabled","1")
            ->orderBy("p.description","ASC");
        $query = $qb->getQuery();
        $this->logd($query->getDQL(),"prodrepo.findallbypage.query.dql");
        $paginator = $this->paginate($query, $currentPage, $limit);

        return $paginator;
    }

    public function save(AppProduct $product): void
    {
        $this->saveEntity($product);
    }
}

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

    public function findAllByPage($currentPage=1, $perpage=50, $criteria=[])
    {
        $qb = $this->getOrmQueryBuilder();
        $qb->select("p")
            ->from(self::entityClass(),"p")
            ->where($qb->expr()->isNull("p.deleteDate"))
            ->andWhere("p.isEnabled=:isEnabled")
            ->andWhere("p.display=:display")
            ->andWhere("p.priceSale>:priceSale")
            ->setParameter("isEnabled","1")
            ->setParameter("display",1)
            ->setParameter("priceSale",0)
            ->addOrderBy("p.orderBy","ASC")
            ->addOrderBy("p.description",  "ASC");
        if($criteria){
            $aror = [];
            foreach ( $criteria as $field=>$value)
            {
                //dump($criteria);die;
                $aror[] = "p.$field LIKE :$field";
                $qb->setParameter($field,"%$value%");
            }
            $qb->andWhere(implode(" OR ",$aror));
        }
        $query = $qb->getQuery();
        $this->log($query->getDQL(),"prodrepo.findallbypage.query.dql");
        $paginator = $this->paginate($query, $currentPage, $perpage);

        return [
            "result"  => $paginator,
            "maxsize" => ceil($paginator->count() / $perpage)
        ];
    }

    public function get_prices(array $arproducts): array
    {
        $qb = $this->getOrmQueryBuilder();
    }


    public function save(AppProduct $product): void
    {
        $this->saveEntity($product);
    }
}

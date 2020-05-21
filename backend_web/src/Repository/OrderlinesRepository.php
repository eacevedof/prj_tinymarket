<?php
// src/Repository/OrderlinesRepository.php
declare(strict_types=1);

namespace App\Repository;

use App\Entity\App\AppOrderLines;

class OrderlinesRepository extends BaseRepository
{
    protected static function entityClass(): string
    {
        return AppOrderLines::class;
    }

    public function findOneById(string $id): ?AppOrderLines
    {
        /**
         * @var AppOrderLines $orderlines
         */
        $orderlines = $this->objectRepository->find($id);
        return $orderlines;
    }


    public function findBy(array $criteria, ?array $orderBy = null, $limit = null, $offset = null)
    {
        /** @var AppOrderLines $orderlines */
        $orderlines = $this->objectRepository->findBy($criteria,  $orderBy, $limit, $offset);
        return $orderlines;
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
            ->setParameter("isEnabled","1")
            ->setParameter("display",1)
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
        $this->logd($query->getDQL(),"prodrepo.findallbypage.query.dql");
        $paginator = $this->paginate($query, $currentPage, $perpage);

        return [
            "result"  => $paginator,
            "maxsize" => ceil($paginator->count() / $perpage)
        ];
    }

    public function save(AppOrderLines $orderlines): void
    {
        $this->saveEntity($orderlines);
    }
}

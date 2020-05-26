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

    public function getMaxNumline(AppOrderLines $orderLine)
    {
        $idorderh = $orderLine->getIdOrderHead();
        $sql = "SELECT MAX(COALESCE(linenum,0)) maxline FROM app_order_lines WHERE id_order_head=:id_order_head";
        $result = $this->executeFetchQuery($sql,["id_order_head"=>$idorderh]);
        $result = $result[0]["maxline"] ?? 0;
        //$this->logd($result,"maxline for {$idorderh} and {$orderLine->getIdProduct()}");
        return $result;
    }

    public function getSumTotals(int $idorderhead)
    {
        $sql = "
        SELECT SUM(COALESCE(total,0)) total, SUM(COALESCE(total1,0)) total1, SUM(COALESCE(total2,0)) total2 
        FROM app_order_lines 
        WHERE id_order_head=:id_order_head
        ";
        $result = $this->executeFetchQuery($sql,["id_order_head"=>$idorderhead]);
        $result = $result[0] ?? [
            "total"=>0,"total1"=>0,"total2"=>0
            ];
        return $result;
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
        $this->log($query->getDQL(),"prodrepo.findallbypage.query.dql");
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

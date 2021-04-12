<?php

namespace App\Repository;

use App\Entity\Currency;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Currency|null find($id, $lockMode = null, $lockVersion = null)
 * @method Currency|null findOneBy(array $criteria, array $orderBy = null)
 * @method Currency[]    findAll()
 * @method Currency[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CurrencyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Currency::class);
    }

    public function findCurrencyInDDBB($from, $to, $amount, $date, $em) 
    {
        $qb = $em->getRepository('App:Currency')->createQueryBuilder('c');
        $qb ->select('c')
            ->where($qb->expr()->andX(
                $qb->expr()->eq('c.currencySend', ':from'),
                $qb->expr()->eq('c.currencyReceive', ':to'),
                $qb->expr()->eq('c.date', ':date'),
            ))
            ->andWhere('c.amount = :amount')
            ->setParameters(array(
                'from' => $from,
                'to' => $to,
                'amount' => $amount,
                'date' => $date,
            ));
          
        $currency = $qb->getQuery()->getResult();

        return $currency;
    }

    // /**
    //  * @return Currency[] Returns an array of Currency objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Currency
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

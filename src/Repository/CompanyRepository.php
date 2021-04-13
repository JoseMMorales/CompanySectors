<?php

namespace App\Repository;

use App\Entity\Company;
use App\Entity\Sector;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Company|null find($id, $lockMode = null, $lockVersion = null)
 * @method Company|null findOneBy(array $criteria, array $orderBy = null)
 * @method Company[]    findAll()
 * @method Company[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompanyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Company::class);
    }

    public function getFilteredData($em, $sectorName, $companyName) 
    {
        $sql_where = "";

        if($sectorName) {
            $sql_where .=  "AND sector.name = '$sectorName' ";
        }

        if($companyName) {
            $sql_where .= "AND company.name = '$companyName' ";
        }

        $sql_where_amended = substr($sql_where, 3);

        return $this->getEntityManager()
                    ->createQueryBuilder()
                    ->select(
                        'company.id as id', 
                        'company.name as name', 
                        'company.phone as phone',
                        'company.email as email',
                        'sector.name as sectorCompany')
                    ->from('App:Company', 'company')
                    ->join('company.sectorCompany','sector')
                    ->where("$sql_where_amended")
                    ->getQuery()->getResult(); 
    }

    // /**
    //  * @return Company[] Returns an array of Company objects
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
    public function findOneBySomeField($value): ?Company
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

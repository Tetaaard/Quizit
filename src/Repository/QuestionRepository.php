<?php

namespace App\Repository;

use App\Entity\Question;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Question|null find($id, $lockMode = null, $lockVersion = null)
 * @method Question|null findOneBy(array $criteria, array $orderBy = null)
 * @method Question[]    findAll()
 * @method Question[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuestionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Question::class);
    }
  
 
    // public function helloWorld($id, $idQuestion)
    // {
    //     return $this->createQueryBuilder('q')
    //     ->select('q','categorie','reponse')
    //     ->join('q.id_categorie','categorie')
    //     ->andWhere('q.id_categorie = :categorie')
    //     ->leftJoin('reponse.question','question')
    //     ->andWhere('reponse.question = :question')
    //     ->setParameter(':categorie' , $id)
    //     ->setParameter(':question' , $idQuestion)
    //     ->orderBy('q.id','ASC')
    //     ->getQuery()
    //     ->getResult()
    //     ;
    // }
    // public function findByIdCategorie($id,$idQuestion)
    // {
    //     return $this->createQueryBuilder('question')
    //     ->select(['question','categorie'])
    //     ->leftJoin('question.id_categorie','categorie')
    //     ->where('question.id_categorie = :categorie')
    //     ->leftJoin('question.reponses','reponse')
    //     ->andWhere('question.reponses = :reponse')
    //     ->setParameter(':categorie' , $id)
    //     ->setParameter(':reponse' , $idQuestion)
    //     ->orderBy('question.id','ASC')
    //     ->getQuery()
    //     ->getResult()
    //     ;
    // }
    // public function findByQuestion($idQuestion)
    // {
    //     return $this->createQueryBuilder('r')
    //     ->select(['question','reponse'])
    //     ->leftJoin('question.reponse','reponse')
    //     ->andWhere('question.reponse = :reponse')
    //     ->setParameter(':reponse' , $idQuestion)
    //     ->orderBy('question.id','ASC')
    //     ->getQuery()
    //     ->getResult()
    //     ;
    // }

    // /**
    //  * @return Question[] Returns an array of Question objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('q.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Question
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

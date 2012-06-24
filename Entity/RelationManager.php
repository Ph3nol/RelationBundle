<?php

namespace Sly\RelationBundle\Entity;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Sly\RelationBundle\Model\RelationInterface;
use Sly\RelationBundle\Model\RelationManagerInterface;

/**
 * RelationManager.
 *
 * @uses RelationManagerInterface
 * @author Cédric Dugat <ph3@slynett.com>
 */
class RelationManager implements RelationManagerInterface
{
    /**
     * @var ObjectManager
     */
    protected $em;

    /**
     * @param EntityManager $em         Entity manager service
     * @param string        $repository Repository name
     */
    public function __construct(EntityManager $em, $repository)
    {
        $this->em         = $em;
        $this->repository = $repository;
    }

    /**
     * {@inheritdoc}
     */
    public function addRelation(RelationInterface $relation)
    {
        $this->em->persist($relation);
        $this->em->flush();

        return $relation;
    }

    /**
     * {@inheritdoc}
     */
    public function getRelation($relationShip)
    {
        $q = $this->__getRepository()
            ->createQueryBuilder('r')
            ->where('r.name = :name')
            ->andWhere('r.object1Entity = :object1Entity')
            ->andWhere('r.object2Entity = :object2Entity')
            ->andWhere('r.object1Id = :object1Id')
            ->andWhere('r.object2Id = :object2Id')
            ->setParameters(array(
                'name'          => $relationShip->getName(),
                'object1Entity' => $relationShip->getObject1Entity(),
                'object2Entity' => $relationShip->getObject2Entity(),
                'object1Id'     => $relationShip->getObject1Id(),
                'object2Id'     => $relationShip->getObject2Id(),
            ));

        return $q->getQuery()->getOneOrNullResult();
    }

    /**
     * Get entity repository.
     * 
     * @return EntityRepository
     */
    private function __getRepository()
    {
        return $this->em->getRepository($this->repository);
    }
}
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
    public function getRelation(RelationInterface $relationShip)
    {
        $q = $this->__getRepository()
            ->createQueryBuilder('r')
            ->where('r.name = :name')
            ->andWhere('r.object1Entity = :object1Entity')
            ->andWhere('r.object2Entity = :object2Entity');

        if ($relationShip->isBidirectional()) {
            $q->andWhere('r.object1Id = :object1Id OR r.object2Id = :object1Id')
                ->andWhere('r.object2Id = :object2Id OR r.object1Id = :object2Id');
        } else {
            $q->andWhere('r.object1Id = :object1Id')
                ->andWhere('r.object2Id = :object2Id');
        }

        $q->setParameters(array(
                'name'          => $relationShip->getName(),
                'object1Entity' => get_class($relationShip->getObject1Entity()),
                'object2Entity' => get_class($relationShip->getObject2Entity()),
                'object1Id'     => $relationShip->getObject1Id(),
                'object2Id'     => $relationShip->getObject2Id(),
            ));

        return $q->getQuery()->getOneOrNullResult();
    }

    /**
     * Get relations.
     * Query Builder.
     *
     * @param RelationInterface $relationShip Relation
     *
     * @return \Doctrine\ORM\QueryBuilder
     */
    private function __getRelationsQB(RelationInterface $relationShip)
    {
        $q = $this->__getRepository()
            ->createQueryBuilder('r')
            ->where('r.name = :name')
            ->andWhere('r.object1Entity = :object1Entity')
            ->andWhere('r.object1Id = :object1Id OR r.object2Id = :object1Id')
            ->orderBy('r.createdAt', 'DESC')
            ->setParameters(array(
                'name'          => $relationShip->getName(),
                'object1Entity' => get_class($relationShip->getObject1Entity()),
                'object1Id'     => $relationShip->getObject1Id(),
            ));

        return $q;
    }

    /**
     * {@inheritdoc}
     */
    public function getRelationsQuery(RelationInterface $relationShip)
    {
        return $this->__getRelationsQB($relationShip)->getQuery();
    }

    /**
     * {@inheritdoc}
     */
    public function getRelations(RelationInterface $relationShip, $limit = null)
    {
        $q = $this->__getRelationsQB($relationShip);

        if ($limit) {
            $q->setMaxResults($limit);
        }

        return $q->getQuery()->getResult();
    }

    /**
     * {@inheritdoc}
     */
    public function buildObject($className, $id)
    {
        return $this->em->getRepository($className)->findOneById($id);
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

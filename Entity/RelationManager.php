<?php

namespace Sly\RelationBundle\Entity;

use Doctrine\ORM\EntityManager;
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
    public function getRelation($objects)
    {
        list($object1, $object2) = $objects;

        $q = $this->__getRepository()
            ->createQueryBuilder('r')
            ->where('r.object1Entity = :object1Entity')
            ->andWhere('r.object2Entity = :object2Entity')
            ->andWhere('r.object1Id = :object1Id')
            ->andWhere('r.object2Id = :object2Id')
            ->setParameters(array(
                'object1Entity' => get_class($object1),
                'object2Entity' => get_class($object2),
                'object1Id'     => $object1->getId(),
                'object2Id'     => $object2->getId(),
            ));

        return $q->getQuery()->getOneOrNullResult();
    }

    private function __getRepository()
    {
        return $this->em->getRepository($this->repository);
    }
}
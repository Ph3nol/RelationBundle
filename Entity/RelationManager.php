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
}
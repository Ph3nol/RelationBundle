<?php

namespace Sly\RelationBundle\Manager;

use Sly\RelationBundle\Config\ConfigManager;
use Sly\RelationBundle\Entity\Relation;
use Sly\RelationBundle\Model\RelationManagerInterface;
use Sly\RelationBundle\Model\RelationCollection;

/**
 * Manager.
 *
 * @author Cédric Dugat <ph3@slynett.com>
 */
class Manager
{
    protected $relationManager;
    protected $config;
    protected $relationShip;

    /**
     * Constructor.
     *
     * @param RelationManagerInterface $relationManager RelationManager service
     * @param ConfigManager            $config          ConfigManager service
     */
    public function __construct(RelationManagerInterface $relationManager, ConfigManager $config)
    {
        $this->relationManager = $relationManager;
        $this->config          = $config;
    }

    /**
     * Set relationship.
     * 
     * @param string      $name    Name/Key
     * @param object      $object1 Object1
     * @param object|null $object2 Object2
     */
    public function relationShip($name, $object1, $object2 = null)
    {
        $this->relationShip = $this->config->getRelations()->get($name);

        if (null === $this->relationShip) {
            throw new \InvalidArgumentException(sprintf('There is no "%s" relation in your configuration', $name));
        }

        $this->relationShip->setObject1Entity($object1);
        $this->relationShip->setObject1Id($object1->getId());

        if ($object2 && is_object($object2)) {
            $this->relationShip->setObject2Entity($object2);
            $this->relationShip->setObject2Id($object2->getId());
        }
    }

    /**
     * Returns if relation exists or not.
     * 
     * @return boolean
     */
    public function exists()
    {
        if (!$this->relationShip->getObject1Id() || !$this->relationShip->getObject2Id()) {
            throw new \InvalidArgumentException('A relationship has to got 2 defined entities (IDs)');
        }

        return (bool) $this->relationManager->getRelation($this->relationShip);
    }

    /**
     * Create relation.
     * 
     * @return RelationInterface|null
     */
    public function create()
    {
        if ($this->exists()) {
            return ;
        }

        return $this->relationManager->addRelation($this->relationShip);
    }

    /**
     * Get object relations.
     * 
     * @param integer|null $limit Limit
     * 
     * @return array
     */
    public function relations($limit = null)
    {
        $relationsResults = $this->relationManager->getRelations($this->relationShip, $limit);
        $mainObject       = $this->relationShip->getObject1Entity();
        $relatedObjects   = array();

        foreach ($relationsResults as $relation) {
            if ($relation->getObject1Id() == $mainObject->getId()) {
                $relatedObject = $this->relationManager->buildObject($relation->getObject2Entity(), $relation->getObject2Id());
            } else {
                $relatedObject = $this->relationManager->buildObject($relation->getObject1Entity(), $relation->getObject1Id());
            }

            $relatedObjects[$relatedObject->getId()] = $relatedObject;
        }

        return $relatedObjects;
    }

    /**
     * Get object relations.
     * Query only (for paginators and others).
     * 
     * @return \Doctrine\ORM\Query
     */
    public function relationsQuery()
    {
        return $this->relationManager->getRelationsQuery($this->relationShip);
    }
}

<?php

namespace Sly\RelationBundle\Model;

use Sly\RelationBundle\Model\RelationInterface;

/**
 * RelationManager interface.
 *
 * @author Cédric Dugat <ph3@slynett.com>
 */
interface RelationManagerInterface
{
    /**
     * Get specific relation between 2 objects.
     * 
     * @param array $relationShip Relationship (name, object1, object2)
     * 
     * @return RelationInterface|null
     */
    public function getRelation($relationShip);

    /**
     * Add a new relation.
     * 
     * @param RelationInterface $relation Relation
     * 
     * @return RelationInterface
     */
    public function addRelation(RelationInterface $relation);
}
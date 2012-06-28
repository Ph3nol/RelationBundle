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
     * @param RelationInterface $relationShip Relationship
     *
     * @return RelationInterface|null
     */
    public function getRelation(RelationInterface $relationShip);

    /**
     * Add a new relation.
     *
     * @param RelationInterface $relation Relation
     *
     * @return RelationInterface
     */
    public function addRelation(RelationInterface $relation);

    /**
     * Get entity relations query.
     *
     * @param RelationInterface $relationShip Relationship
     *
     * @return \Doctrine\ORM\Query
     */
    public function getRelationsQuery(RelationInterface $relationShip);

    /**
     * Get entity relations.
     *
     * @param RelationInterface $relationShip Relationship
     * @param integer|null      $limit        Limit
     *
     * @return array
     */
    public function getRelations(RelationInterface $relationShip, $limit = null);
}

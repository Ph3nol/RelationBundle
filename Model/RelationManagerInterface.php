<?php

namespace Sly\RelationBundle\Model;

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
     * @param array $objects The 2 objects
     * 
     * @return RelationInterface|null
     */
    public function getRelation($objects);
}
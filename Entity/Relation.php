<?php

namespace Sly\RelationBundle\Entity;

use Sly\RelationBundle\Model\Relation as BaseRelation;

/**
 * Relation Doctrine entity.
 *
 * @uses BaseRelation
 * @author Cédric Dugat <ph3@slynett.com>
 */
class Relation extends BaseRelation
{
    /**
     * __toString.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getId();
    }
}

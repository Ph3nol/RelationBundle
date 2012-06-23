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
     * Constructor.
     * 
     * @param string $name Relation name/key
     */
    public function __construct($name = null)
    {
        $this->createdAt = new \DateTime();

        if ($name) {
            $this->name = $name;
        }
    }
    
    /**
     * __toString.
     *
     * @return string
     */
    public function __toString()
    {
        return sprintf('%s %d', ucfirst($this->getName()), $this->getId());
    }
}

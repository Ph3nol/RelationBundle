<?php

namespace Sly\RelationBundle\Model;

use Sly\RelationBundle\Model\RelationInterface;

/**
 * Relation collection.
 *
 * @author Cédric Dugat <ph3@slynett.com>
 */
class RelationCollection implements \IteratorAggregate
{
    protected $coll;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->coll = new \ArrayIterator();
    }

    /**
     * @return array
     */
    public function getIterator()
    {
        return $this->coll;
    }

    /**
     * Set method.
     *
     * @param string            $name     Name
     * @param RelationInterface $relation Relation
     */
    public function set($name, RelationInterface $relation)
    {
        $this->coll[$name] = $relation;
    }

    /**
     * Get method.
     *
     * @param string $name Relation name
     *
     * @return RelationInterface
     */
    public function get($name)
    {
        return isset($this->coll[$name]) ? $this->coll[$name] : null;
    }

    /**
     * Has relation or not.
     *
     * @param string $name Relation name
     *
     * @return boolean
     */
    public function has($name)
    {
        return $this->coll->offsetExists($name);
    }

    /**
     * Get relations.
     *
     * @return \ArrayIterator
     */
    public function getRelations()
    {
        return $this->coll;
    }
}

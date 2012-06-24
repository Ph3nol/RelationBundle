<?php

namespace Sly\RelationBundle\Model;

use Sly\RelationBundle\Model\RelationInterface;

/**
 * Relation model.
 *
 * @author Cédric Dugat <ph3@slynett.com>
 */
class Relation implements RelationInterface
{
    protected $id;
    protected $name;
    protected $object1Entity;
    protected $object1Id;
    protected $object2Entity;
    protected $object2Id;
    protected $bidirectional;
    protected $createdAt;

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function setName($name)
    {
        $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setObject1Entity($entity)
    {
        $this->object1Entity = $entity;
    }

    /**
     * {@inheritdoc}
     */
    public function getObject1Entity()
    {
        return $this->object1Entity;
    }

    /**
     * {@inheritdoc}
     */
    public function setObject1Id($id)
    {
        $this->object1Id = $id;
    }

    /**
     * {@inheritdoc}
     */
    public function getObject1Id()
    {
        return $this->object1Id;
    }

    /**
     * {@inheritdoc}
     */
    public function setObject2Entity($entity)
    {
        $this->object2Entity = $entity;
    }

    /**
     * {@inheritdoc}
     */
    public function getObject2Entity()
    {
        return $this->object2Entity;
    }

    /**
     * {@inheritdoc}
     */
    public function setObject2Id($id)
    {
        $this->object2Id = $id;
    }

    /**
     * {@inheritdoc}
     */
    public function getObject2Id()
    {
        return $this->object2Id;
    }

    /**
     * {@inheritdoc}
     */
    public function setBidirectional($bidirectional)
    {
        $this->bidirectional = $bidirectional;
    }

    /**
     * {@inheritdoc}
     */
    public function isBidirectional()
    {
        return (bool) $this->bidirectional;
    }

    /**
     * {@inheritdoc}
	 */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * {@inheritdoc}
	 */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
}

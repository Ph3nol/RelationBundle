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
    protected $entity1;
    protected $entity2;
    protected $bidirectional;

    /**
     * {@inheritdoc}
     */
    public function setEntity1($entity)
    {
        $this->entity1 = $entity;
    }

    /**
     * {@inheritdoc}
     */
    public function getEntity1()
    {
        return $this->entity1;
    }

    /**
     * {@inheritdoc}
     */
    public function setEntity2($entity)
    {
        $this->entity2 = $entity;
    }

    /**
     * {@inheritdoc}
     */
    public function getEntity2()
    {
        return $this->entity2();
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
    public function setData(array $data)
    {
        $this->setEntity1($data['entity1']);
        $this->setEntity2($data['entity2']);
        $this->setBidirectional(isset($data['bidirectional']) ? (bool) $data['bidirectional'] : false);
    }
}

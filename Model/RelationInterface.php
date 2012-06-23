<?php

namespace Sly\RelationBundle\Model;

/**
 * Relation inteface.
 *
 * @author Cédric Dugat <ph3@slynett.com>
 */
interface RelationInterface
{
    /**
     * Set entity1 value.
     *
     * @param string $entity Set entity value
     */
    public function setEntity1($entity);

    /**
     * Get entity1 value.
     *
     * @return string
     */
    public function getEntity1();

    /**
     * Set entity2 value.
     *
     * @param string $entity Set entity value
     */
    public function setEntity2($entity);

    /**
     * Get entity2 value.
     *
     * @return string
     */
    public function getEntity2();

    /**
     * Set if relation is bidirectional or not.
     *
     * @param bool $bidirectional Is bidirectional
     */
    public function setBidirectional($bidirectional);

    /**
     * Is bidirectional or not.
     *
     * @return bool
     */
    public function isBidirectional();

    /**
     * Set data from configuration one.
     *
     * @param array $data Configurtion data
     */
    public function setData(array $data);
}

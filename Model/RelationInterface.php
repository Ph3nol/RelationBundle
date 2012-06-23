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
     * Get ID.
     *
     * @return integer
     */
    public function getId();

    /**
     * Set name value.
     *
     * @param string $name Name
     */
    public function setName($name);

    /**
     * Get name value.
     *
     * @return string
     */
    public function getName();

    /**
     * Set entity object1 value.
     *
     * @param string $entity Object value
     */
    public function setObject1Entity($entity);

    /**
     * Get entity object1 value.
     *
     * @return string
     */
    public function getObject1Entity();

    /**
     * Set entity object1 ID.
     *
     * @param integer $id Object ID
     */
    public function setObject1Id($id);

    /**
     * Get entity object1 ID.
     *
     * @return integer
     */
    public function getObject1Id();

    /**
     * Set entity object2 value.
     *
     * @param string $entity Object value
     */
    public function setObject2Entity($entity);

    /**
     * Get entity object2 value.
     *
     * @return string
     */
    public function getObject2Entity();

    /**
     * Set entity object2 ID.
     *
     * @param integer $id Object ID
     */
    public function setObject2Id($id);

    /**
     * Get entity object2 ID.
     *
     * @return integer
     */
    public function getObject2Id();

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
	 * Set createdAt value.
	 *
     * @param \DateTime $createdAt CreatedAt value
	 */
    public function setCreatedAt(\DateTime $createdAt);

    /**
	 * Get createdAt value.
	 *
	 * @return \DateTime
	 *
	 */
    public function getCreatedAt();
}

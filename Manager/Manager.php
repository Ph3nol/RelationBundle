<?php

namespace Sly\RelationBundle\Manager;

use Sly\RelationBundle\Config\ConfigManager;
use Sly\RelationBundle\Model\RelationManagerInterface;

/**
 * Manager.
 *
 * @author Cédric Dugat <ph3@slynett.com>
 */
class Manager
{
    protected $relationManager;
    protected $config;
    protected $objects;

    /**
     * Constructor.
     *
     * @param RelationManagerInterface $relationManager RelationManager service
     * @param ConfigManager            $config          ConfigManager service
     */
    public function __construct(RelationManagerInterface $relationManager, ConfigManager $config)
    {
        $this->relationManager = $relationManager;
        $this->config          = $config;
    }

    /**
     * Set objects.
     * 
     * @param object $object1 Object1
     * @param object $object2 Object2
     */
    public function setEntities($object1, $object2)
    {
        $this->objects = array($object1, $object2);
    }

    /**
     * Returns if relation exists or not.
     * 
     * @return boolean
     */
    public function exists()
    {
        return (bool) $this->relationManager->getRelation($this->objects);
    }
}

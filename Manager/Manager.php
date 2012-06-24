<?php

namespace Sly\RelationBundle\Manager;

use Sly\RelationBundle\Config\ConfigManager;
use Sly\RelationBundle\Entity\Relation;
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
    protected $relationShip;

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
     * Set relationship.
     * 
     * @param string $name    Name/Key
     * @param object $object1 Object1
     * @param object $object2 Object2
     */
    public function relationShip($name, $object1, $object2)
    {
        $this->relationShip = $this->config->getRelations()->get($name);

        if (null === $this->relationShip) {
            throw new \InvalidArgumentException(sprintf('There is no "%s" relation in your configuration', $name));
        }

        $this->relationShip->setObject1Id($object1->getId());
        $this->relationShip->setObject2Id($object2->getId());
    }

    /**
     * Returns if relation exists or not.
     * 
     * @return boolean
     */
    public function exists()
    {
        return (bool) $this->relationManager->getRelation($this->relationShip);
    }

    /**
     * Create relation.
     * 
     * @return RelationInterface|null
     */
    public function create()
    {
        if ($this->exists()) {
            return ;
        }

        return $this->relationManager->addRelation($this->relationShip);
    }
}

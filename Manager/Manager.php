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
        $this->relationShip = array(
            $name,
            $object1,
            $object2,
        );
    }

    /**
     * Returns if relation exists or not.
     * 
     * @return boolean
     */
    public function exists()
    {
        if (null === $this->config->getRelations()->get($this->relationShip[0])) {
            throw new \InvalidArgumentException(sprintf('There is no \'%s\' relation in your configuration', $this->relationShip[0]));
        }

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

        $relation = $this->config->getRelations()->get($this->relationShip[0]);
        $relation->setObject1Id($this->relationShip[1]->getId());
        $relation->setObject2Id($this->relationShip[2]->getId());

        return $this->relationManager->addRelation($relation);
    }
}

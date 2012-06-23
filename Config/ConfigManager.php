<?php

namespace Sly\RelationBundle\Config;

use Sly\RelationBundle\Entity\Relation;
use Sly\RelationBundle\Model\RelationCollection;

/**
 * ConfigManager.
 *
 * @author Cédric Dugat <ph3@slynett.com>
 */
class ConfigManager
{
    protected $config;
    protected $relations;

    /**
     * Constructor.
     *
     * @param array $config Configuration
     */
    public function __construct(array $config)
    {
        $this->config    = $config;
        $this->relations = $this->__initAndGetRelations();
    }

    /**
     * Get RelationCollection.
     *
     * @return RelationCollection
     */
    public function getRelations()
    {
        return $this->relations;
    }

    /**
     * Get RelationCollection from configuration.
     *
     * @return RelationCollection
     */
    private function __initAndGetRelations()
    {
        $relations = new RelationCollection();

        foreach ($this->config['relations'] as $name => $data) {
            $relation = new Relation($name);
            $relation->setObject1Entity($data['entity1']);
            $relation->setObject2Entity($data['entity2']);
            $relation->setBidirectional(isset($data['bidirectional']) ? (bool) $data['bidirectional'] : false);

            $relations->set($name, $relation);
        }

        return $relations;
    }
}

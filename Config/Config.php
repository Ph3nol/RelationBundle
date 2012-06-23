<?php

namespace Sly\RelationBundle\Config;

use Sly\RelationBundle\Model\Relation;
use Sly\RelationBundle\Model\RelationCollection;

/**
 * Config.
 *
 * @author Cédric Dugat <ph3@slynett.com>
 */
class Config
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
    protected function __initAndGetRelations()
    {
        $relations = new RelationCollection();

        foreach ($this->config['relations'] as $name => $data) {
            $relation = new Relation();
            $relation->setData($data);

            $relations->set($name, $relation);
        }

        return $relations;
    }
}

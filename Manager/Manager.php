<?php

namespace Sly\RelationBundle\Manager;

use Sly\RelationBundle\Config\ConfigManager;

/**
 * Manager.
 *
 * @author Cédric Dugat <ph3@slynett.com>
 */
class Manager
{
    protected $config;

    /**
     * Constructor.
     *
     * @param ConfigManager $config ConfigManager service
     */
    public function __construct(ConfigManager $config)
    {
        $this->config = $config;
    }
}

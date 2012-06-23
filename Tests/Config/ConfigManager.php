<?php

use Sly\RelationBundle\Config\ConfigManager;

/**
 * ConfigManager tests.
 *
 * @author Cédric Dugat <ph3@slynett.com>
 */
class ConfigManagerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test ConfigManager.
     */
    public function testConfigManager()
    {
        $config = $this->__getTestConfig();

        $this->markTestIncomplete('Todo: write some tests!');
    }

    /**
	 * Get test configuration.
	 *
	 * @return array
	 */
    private function __getTestConfig()
    {
        return array(
            'relations' => array(
                'entity1'       => 'Acme\DemoBundle\Entity\User',
                'entity2'       => 'Acme\DemoBundle\Entity\User',
                'bidirectional' => false,
            )
        );
    }
}

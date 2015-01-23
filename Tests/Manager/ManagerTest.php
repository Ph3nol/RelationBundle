<?php


/**
 * Manager tests.
 *
 * @author Cédric Dugat <ph3@slynett.com>
 */
class ManagerTest extends PHPUnit_Framework_TestCase {

    /**
     * @var AppKernel
     */
    public $kernel;

    public function setUp(){
        $this->kernel = new AppKernel('dev', true);
        $this->kernel->boot();
    }

    public function testRelationExistMustReturnBool() {

        $relation = $this->kernel->getContainer()->get('sly_relation');
        $relation->relationShip(
            'friendship',
            $this->kernel->getContainer()->get('doctrine')->getRepository('AcmeDemoBundle:User')->find(3),
            $this->kernel->getContainer()->get('doctrine')->getRepository('AcmeDemoBundle:User')->find(3)
        );

        $this->assertTrue(is_bool($relation->exists()));
    }
}

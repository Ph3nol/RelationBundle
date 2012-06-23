<?php

namespace Sly\RelationBundle\Twig\Extension;

use Sly\RelationBundle\Manager\Manager;

/**
 * Relation Twig extension.
 *
 * @author Cédric Dugat <ph3@slynett.com>
 */
class RelationExtension extends \Twig_Extension
{
    /**
     * @var \Twig_Environment
     */
    protected $twig;

    /**
     * @var ManagerInterface
     */
    protected $manager;

    /**
     * Constructor.
     *
     * @param \Twig_Environment $twig    Twig service
     * @param Manager           $manager Manager service
     */
    public function __construct(\Twig_Environment $twig, Manager $manager)
    {
        $this->twig    = $twig;
        $this->manager = $manager;
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return array(
            'relation_exists' => new \Twig_Function_Method($this, 'relationExists'),
        );
    }

    /**
     * Returns if relation exists or not.
     *
     * @param object $object1      Object1
     * @param object $object2      Object2
     * @param string $relationName Relation name/key
     *
     * @return boolean
     */
    public function relationExists($object1, $object2, $relationName)
    {
        $this->manager->relationShip($relationName, $object1, $object2);

        return (bool) $this->manager->exists();
    }

    /**
     * Returns extension name.
     *
     * @return string
     */
    public function getName()
    {
        return 'sly_relation_extension';
    }
}
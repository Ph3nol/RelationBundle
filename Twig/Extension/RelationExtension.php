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
    public function getFilters()
    {
        return array(
            'relation_exists' => new \Twig_Filter_Method($this, 'relationExists'),
            'relations'       => new \Twig_Filter_Method($this, 'getRelations'),
        );
    }

    /**
     * Returns if relation exists or not.
     *
     * @param object $object1      Object1
     * @param string $relationName Relation name/key
     * @param object $object2      Object2
     *
     * @return boolean
     */
    public function relationExists($object1, $relationName, $object2)
    {
        $this->manager->relationShip($relationName, $object1, $object2);

        return (bool) $this->manager->exists();
    }

    /**
     * Get relations.
     * 
     * @param object       $object1      Object1
     * @param string       $relationName Relation name/key
     * @param integer|null $limit        Count limit
     * @param string|null  $order        Order name
     * 
     * @return array
     */
    public function getRelations($object1, $relationName, $limit = null, $order = null)
    {
        $this->manager->relationShip($relationName, $object1);

        return $this->manager->relations($limit, $order);
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
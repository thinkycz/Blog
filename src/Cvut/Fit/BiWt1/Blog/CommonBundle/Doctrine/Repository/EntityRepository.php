<?php
/**
 * Created by PhpStorm.
 * User: kadleto2
 * Date: 19.11.14
 * Time: 9:29
 */

namespace Cvut\Fit\BiWt1\Blog\CommonBundle\Doctrine\Repository;
//use Cvut\Fit\Ict\SecurityBundle\Security\SecurityContextAwareInterface;
use Symfony\Component\Security\Core\SecurityContextInterface;

/**
 * Abstraktni predek spolecne pro operace v repozitari
 *
 * Class EntityRepository
 * @package Cvut\Fit\BiWt1\Blog\CommonBundle\Doctrine\Repository
 */
abstract class EntityRepository extends \Doctrine\ORM\EntityRepository
    {

    /**
     * @param $object
     * @param bool $flush
     * @return mixed
     */
    public function create($object, $flush = true)
    {
        $this->getEntityManager()->persist($object);
        $this->flush($object, $flush);
        return $object;
    }

    /**
     * @param $object
     * @param bool $flush
     * @return mixed
     */
    public function update($object, $flush = true)
    {
        return $this->create($object, $flush);
    }

    /**
     * @param $object
     * @param bool $flush
     */
    public function remove($object, $flush = true)
    {
        $this->getEntityManager()->remove($object);
        $this->flush($object, $flush);

    }

    /**
     * @param $object
     * @return object
     */
    public function merge($object)
    {
        return $this->getEntityManager()->merge($object);
    }

    /**
     * @param $object
     */
    public function refresh($object)
    {
        return $this->getEntityManager()->refresh($object);
    }

    /**
     * @param $object
     * @param $flush
     */
    protected function flush($object, $flush)
    {
        if ($flush)
            $this->getEntityManager()->flush($object);
    }

    /**
     * @var SecurityContextInterface
     */
    protected $securityContext;

    /**
     * Sets security context, if it is available
     *
     * @param SecurityContextInterface $securityContext
     * @return mixed
     */
    public function setSecurityContext(SecurityContextInterface $securityContext)
    {
        $this->securityContext = $securityContext;
    }
}
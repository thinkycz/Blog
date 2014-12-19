<?php
/**
 * Created by PhpStorm.
 * User: thinky
 * Date: 19.12.14
 * Time: 17:23
 */

namespace Cvut\Fit\BiWt1\Blog\ApplicationBundle\Service;

use Cvut\Fit\BiWt1\Blog\CommonBundle\Service\UserInterface;
use Doctrine\Common\Collections\Collection;

class UserService implements UserInterface{

    /**
     * Vytvori noveho uzivatele, pokud neexistuje
     *
     * @param \Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\UserInterface $user
     * @return \Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\UserInterface
     */
    public function create(\Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\UserInterface $user)
    {
        // TODO: Implement create() method.
    }

    /**
     * Aktualizuje uzivatele a vrati
     *
     * @param \Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\UserInterface $user
     * @return \Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\UserInterface
     */
    public function update(\Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\UserInterface $user)
    {
        // TODO: Implement update() method.
    }

    /**
     * Odstrani uzivatele a vrati jej
     *
     * @param \Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\UserInterface $user
     * @return \Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\UserInterface
     */
    public function delete(\Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\UserInterface $user)
    {
        // TODO: Implement delete() method.
    }

    /**
     * Najde uzivatele podle ID
     *
     * @param $id
     * @return \Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\UserInterface
     */
    public function find($id)
    {
        // TODO: Implement find() method.
    }

    /**
     * Najde a vrati vsechny uzivatele
     *
     * @return Collection<\Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\UserInterface>
     */
    public function findAll()
    {
        // TODO: Implement findAll() method.
    }

    /**
     * Najde uzivatele podle kriterii
     *
     * @param mixed $criteria - cast QueryBuilderu, ktera se pouzije v QueryBuilder::andWhere
     * @return Collection<\Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\UserInterface>
     */
    public function findBy($criteria)
    {
        // TODO: Implement findBy() method.
    }
}
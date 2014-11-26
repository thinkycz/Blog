<?php
/**
 * Created by PhpStorm.
 * User: kadleto2
 * Date: 24.9.14
 * Time: 14:46
 */

namespace Cvut\Fit\BiWt1\Blog\CommonBundle\Service;

use Doctrine\Common\Collections\Collection;

/**
 * Rozhrani pro CRUD operace s uzivateli
 *
 * Interface UserInterface
 * @package Cvut\Fit\BiWt1\Blog\CommonBundle\Service
 */
interface UserInterface {

    /**
     * Vytvori noveho uzivatele, pokud neexistuje
     *
     * @param \Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\UserInterface $user
     * @return \Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\UserInterface
     */
    public function create(\Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\UserInterface $user);

    /**
     * Aktualizuje uzivatele a vrati
     *
     * @param \Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\UserInterface $user
     * @return \Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\UserInterface
     */
    public function update(\Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\UserInterface $user);

    /**
     * Odstrani uzivatele a vrati jej
     *
     * @param \Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\UserInterface $user
     * @return \Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\UserInterface
     */
    public function delete(\Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\UserInterface $user);

    /**
     * Najde uzivatele podle ID
     *
     * @param $id
     * @return \Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\UserInterface
     */
    public function find($id);

    /**
     * Najde a vrati vsechny uzivatele
     *
     * @return Collection<\Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\UserInterface>
     */
    public function findAll();

    /**
     * Najde uzivatele podle kriterii
     *
     * @param mixed $criteria - cast QueryBuilderu, ktera se pouzije v QueryBuilder::andWhere
     * @return Collection<\Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\UserInterface>
     */
    public function findBy($criteria);

}
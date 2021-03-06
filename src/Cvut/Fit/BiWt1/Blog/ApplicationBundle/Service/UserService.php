<?php
/**
 * Created by PhpStorm.
 * User: thinky
 * Date: 19.12.14
 * Time: 17:23
 */

namespace Cvut\Fit\BiWt1\Blog\ApplicationBundle\Service;

use Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\UserRepository;
use Cvut\Fit\BiWt1\Blog\CommonBundle\Service\UserInterface;
use Doctrine\Common\Collections\Collection;

class UserService implements UserInterface {

    protected $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Vytvori noveho uzivatele, pokud neexistuje
     *
     * @param \Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\UserInterface $user
     * @return \Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\UserInterface
     */
    public function create(\Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\UserInterface $user)
    {
        $this->userRepository->create($user);
        return $user;
    }

    /**
     * Aktualizuje uzivatele a vrati
     *
     * @param \Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\UserInterface $user
     * @return \Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\UserInterface
     */
    public function update(\Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\UserInterface $user)
    {
        $this->userRepository->update($user);
        return $user;
    }

    /**
     * Odstrani uzivatele a vrati jej
     *
     * @param \Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\UserInterface $user
     * @return \Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\UserInterface
     */
    public function delete(\Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\UserInterface $user)
    {
        $this->userRepository->remove($user);
        return $user;
    }

    /**
     * Najde uzivatele podle ID
     *
     * @param $id
     * @return \Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\UserInterface
     */
    public function find($id)
    {
        return $this->userRepository->find($id);
    }

    /**
     * Najde a vrati vsechny uzivatele
     *
     * @return Collection<\Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\UserInterface>
     */
    public function findAll()
    {
        return $this->userRepository->findAll();
    }

    /**
     * Najde uzivatele podle kriterii
     *
     * @param mixed $criteria - cast QueryBuilderu, ktera se pouzije v QueryBuilder::andWhere
     * @return Collection<\Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\UserInterface>
     */
    public function findBy($criteria)
    {
        return $this->userRepository->matching($criteria);
    }
}
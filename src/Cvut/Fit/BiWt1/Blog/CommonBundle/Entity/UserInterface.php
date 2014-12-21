<?php
/**
 * Created by PhpStorm.
 * User: kadleto2
 * Date: 24.9.14
 * Time: 14:57
 */
namespace Cvut\Fit\BiWt1\Blog\CommonBundle\Entity;


/**
 * Rozhrani entity uzivatele
 *
 * Interface UserInterface
 * @package Cvut\Fit\BiWt1\Blog\CommonBundle\Entity
 */
interface UserInterface
{
    /**
     * Vrati unikatni ID uzivatele
     * @return number
     */
    public function getId();

    /**
     * Nastavi unikatni ID uzivatele
     * @param number $id
     */
    public function setId($id);

    /**
     * Vrati jmeno uzivatele
     * @return string
     */
    public function getName();

    /**
     * Nastavi jmeno uzivatele
     * @param string $name
     */
    public function setName($name);

    /**
     * Prida zapisek uzivatele
     * @param PostInterface $post
     */
    public function addPost(PostInterface $post);

    /**
     * Odstrani zapisek uzivatele
     * @param PostInterface $post
     */
    public function removePost(PostInterface $post);

    /**
     * Vrati zapisky uzivatele
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPosts();

    public function getPassword();

    public function setPassword($password);
}
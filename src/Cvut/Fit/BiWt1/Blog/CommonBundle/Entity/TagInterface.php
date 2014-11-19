<?php
/**
 * Created by PhpStorm.
 * User: kadleto2
 * Date: 24.9.14
 * Time: 15:02
 */
namespace Cvut\Fit\BiWt1\Blog\CommonBundle\Entity;
use Doctrine\Common\Collections\Collection;

/**
 * Rozhrani entity Tag
 *
 * Interface TagInterface
 * @package Cvut\Fit\BiWt1\Blog\CommonBundle\Entity
 */
interface TagInterface
{
    /**
     * Vrati ID tagu
     * @return number
     */
    public function getId();

    /**
     * Nastavi ID tagu
     * @param number $id
     */
    public function setId($id);

    /**
     * Vrati nazev tagu
     * @return string
     */
    public function getTitle();

    /**
     * Nastavi nazev tagu
     * @param string $title
     */
    public function setTitle($title);

    /**
     * Prida zapisek ke znacce
     *
     * @param PostInterface $post
     */
    public function addPost(PostInterface $post);

    /**
     * Vrati zapisky prirazene ke znacce
     *
     * @return Collection<PostInterface>
     */
    public function getPosts();

    /**
     *
     * Odstrani zapisek od znacky
     *
     * @param PostInterface $post
     */
    public function removePost(PostInterface $post);
}
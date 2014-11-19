<?php
/**
 * Created by PhpStorm.
 * User: kadleto2
 * Date: 24.9.14
 * Time: 16:42
 */
namespace Cvut\Fit\BiWt1\Blog\CommonBundle\Entity;


/**
 * Rozhrani entity pro ulozeni souboru
 *
 * Interface FileInterface
 * @package Cvut\Fit\BiWt1\Blog\CommonBundle\Entity
 */
interface FileInterface
{
    /**
     * Vrati unikatni identifikator souboru
     *
     * @return number
     */
    public function getId();

    /**
     * Nastavi unikatni identifikator souboru
     *
     * @param number $id
     */
    public function setId($id);

    /**
     * Vrati jmeno souboru
     *
     * @return string
     */
    public function getName();

    /**
     * Nastavi jmeno souboru
     *
     * @param string $name
     */
    public function setName($name);

    /**
     * Vrati zapisek, k nemuz soubor prislusi
     *
     * @return \Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\PostInterface
     */
    public function getPost();

    /**
     * Nastavi zapisek, k nemuz soubor prislusi
     *
     * @param \Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\PostInterface $post
     */
    public function setPost($post);

    /**
     * Vrati datum a cas vytvoreni souboru
     *
     * @return \DateTime
     */
    public function getCreated();

    /**
     * Nastavi datum a cas vytvoreni souboru
     *
     * @param \DateTime $created
     */
    public function setCreated($created);

    /**
     * Vrati Internet Media Type souboru (drive MIME type)
     *
     * @return string
     */
    public function getInternetMediaType();

    /**
     * Nastavi Internet Media Type souboru (drive MIME type)
     *
     * @param string $internetMediaType
     */
    public function setInternetMediaType($internetMediaType);

    /**
     * Vrati obsah souboru
     *
     * @return mixed
     */
    public function getData();

    /**
     * Nastavi obsah souboru
     *
     * @param mixed $data
     */
    public function setData($data);

    /**
     * Vrati, k jakemu komentari soubor prislusi
     *
     * @return CommentInterface
     */
    public function getComment();


    /**
     * Nastavi, k jakemu komentari soubor prislusi
     *
     * @param CommentInterface $comment
     */
    public function setComment($comment);
}
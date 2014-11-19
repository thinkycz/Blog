<?php
/**
 * Created by PhpStorm.
 * User: kadleto2
 * Date: 24.9.14
 * Time: 18:04
 */
namespace Cvut\Fit\BiWt1\Blog\CommonBundle\Entity;


/**
 * Rozhrani entity komentar k zapisku
 *
 * Interface CommentInterface
 * @package Cvut\Fit\BiWt1\Blog\CommonBundle\Entity
 */
interface CommentInterface
{
    /**
     * Vrati ID komentare
     *
     * @return mixed
     */
    public function getId();

    /**
     * Nastavi ID komentare
     *
     * @param mixed $id
     */
    public function setId($id);

    /**
     * Vratui autora
     *
     * @return UserInterface
     */
    public function getAuthor();

    /**
     * Nastavi autora
     *
     * @param UserInterface $author
     */
    public function setAuthor(UserInterface $author);

    /**
     * Vrati prispevek, ke kteremu komentar prislusi
     *
     * @return PostInterface
     */
    public function getPost();

    /**
     * Nastavi prispevek, ke kteremu komentar prislusi
     *
     * @param PostInterface $post
     */
    public function setPost(PostInterface $post);

    /**
     * Vrati text komentare
     *
     * @return string
     */
    public function getText();

    /**
     * Nastavi text komentare
     *
     * @param string $text
     */
    public function setText($text);

    /**
     * Vrati datum vytvoreni
     *
     * @return \DateTime
     */
    public function getCreated();

    /**
     * Nastavi datum vytvoreni
     *
     * @param \DateTime $created
     */
    public function setCreated(\DateTime $created);

    /**
     * @return \DateTime
     */
    public function getModified();

    /**
     * @param \DateTime $modified
     */
    public function setModified($modified);

    /**
     * Vrati rodicovsky komentar, pokud existuje
     *
     * @return CommentInterface|null
     */
    public function getParent();

    /**
     * Nastavi rodicovsky komentar. Museji byt ke stejnemu zapisku.
     *
     * @param CommentInterface $parent
     */
    public function setParent($parent);

    /**
     * Prida soubor k tomuto komentari
     *
     * @param FileInterface $file
     */
    public function addFile(FileInterface $file);

    /**
     * Vrati kolekci souboru prislusejicich tomuto komentari
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFiles();

    /**
     * Odebere soubor od tohoto komentare
     *
     * @param FileInterface $file
     */
    public function removeFile(FileInterface $file);

    /**
     * Vrati priznak, zda se jedna o spam
     *
     * @return true|false
     */
    public function getSpam();

    /**
     * Nastavi priznak, zda se jedna o spam
     *
     * @param boolean $spam
     */
    public function setSpam($spam);
}
<?php
/**
 * Created by PhpStorm.
 * User: kadleto2
 * Date: 24.9.14
 * Time: 14:31
 */
namespace Cvut\Fit\BiWt1\Blog\CommonBundle\Entity;
use Doctrine\Common\Collections\Collection;

/**
 * Rozhrani entity pro zapisek
 *
 * Interface PostInterface
 * @package Cvut\Fit\BiWt1\Blog\CommonBundle\Entity
 */
interface PostInterface
{
    /**
     * Vrati id zapisku
     *
     * @return number
     */
    public function getId();

    /**
     * Nastavi unikatni ID
     *
     * @param number $id
     */
    public function setId($id);

    /**
     * Vrati titulek zapisku
     *
     * @return string
     */
    public function getTitle();

    /**
     * Nastavi nazev zapisku
     *
     * @param string $title
     */
    public function setTitle($title);

    /**
     * Vrati text zapisku
     *
     * @return string
     */
    public function getText();

    /**
     * Nastavi text zapisku
     *
     * @param string $text
     */
    public function setText($text);

    /**
     * Vrati autora zapisku
     *
     * @return UserInterface
     */
    public function getAuthor();

    /**
     * Nastavi autora zapisku
     *
     * @param UserInterface $author
     */
    public function setAuthor(UserInterface $author);

    /**
     * Vrati datum vytvoreni
     *
     * @return \DateTime
     */
    public function getCreated();

    /**
     * Nastavi daum vytvoreni zapisku
     *
     * @param \DateTime $created
     */
    public function setCreated(\DateTime $created);

    /**
     * Vrati datum posledni modifikace
     *
     * @return \DateTime
     */
    public function getModified();

    /**
     * Nastavi datum posledni modifikace
     *
     * @param \DateTime $modified
     */
    public function setModified(\DateTime $modified);

    /**
     * Vrati datum, od kdy ma byt prispevek publikovan
     *
     * @return \DateTime
     */
    public function getPublishFrom();

    /**
     * Nastavi datum od kdy publikovat
     *
     * @param \DateTime $publishFrom
     */
    public function setPublishFrom(\DateTime $publishFrom);

    /**
     * Vrati datum, do kdy ma byt zapisek publikovan
     *
     * @return \DateTime
     */
    public function getPublishTo();

    /**
     * Nastavi datum, do kdy se ma zapisek publikovat
     *
     * @param \DateTime $publishTo
     */
    public function setPublishTo(\DateTime $publishTo);

    /**
     * Vrati priznak, zda je zapisek verejny ci nikoliv
     *
     * @return true|false
     */
    public function getPrivate();

    /**
     * Nastavi priznak, zda je zapisek
     *
     * @param mixed $private
     */
    public function setPrivate($private);

    /**
     * Prida soubor k zapisku
     *
     * @param FileInterface $file
     * @return PostInterface
     */
    public function addFile(FileInterface $file);

    /**
     * Odebere soubor od zapisku
     *
     * @param FileInterface $file
     * @return PostInterface
     */
    public function removeFile(FileInterface $file);

    /**
     * Vrati kolekci souboru prislusejicich k zapisku
     *
     * @return Collection<File>
     */
    public function getFiles();

    /**
     * Prida komentar k zapisku
     *
     * @param CommentInterface $comment
     * @return PostInterface
     */
    public function addComment(CommentInterface $comment);

    /**
     * Odebere komentar od zapisku
     *
     * @param CommentInterface $comment
     * @return PostInterface
     */
    public function removeComment(CommentInterface $comment);

    /**
     * Vrati kolekci komentaru prislusejicich k zapisku
     *
     * @return Collection<CommentInterface>
     */
    public function getComments();

    /**
     * Prida znacku k zapisku
     *
     * @param TagInterface $tag
     * @return PostInterface
     */
    public function addTag(TagInterface $tag);

    /**
     * Odebere znacku od zapisku
     *
     * @param TagInterface $tag
     * @return PostInterface
     */
    public function removeTag(TagInterface $tag);

    /**
     * Vrati kolekci znacek prislusejicih k zapisku
     *
     * @return Collection<TagInterface>
     */
    public function getTags();
}
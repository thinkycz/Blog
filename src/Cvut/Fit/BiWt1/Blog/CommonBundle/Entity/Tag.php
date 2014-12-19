<?php
/**
 * Created by PhpStorm.
 * User: kadleto2
 * Date: 24.9.14
 * Time: 15:00
 */

namespace Cvut\Fit\BiWt1\Blog\CommonBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * Class Tag
 * @package Cvut\Fit\BiWt1\Blog\CommonBundle\Entity
 * @ORM\Entity(repositoryClass="TagRepository")
 * @ORM\Table(name="blog_tag")
 */
class Tag implements TagInterface
{

    /**
     * ID tagu
     * @var number
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="bigint")
     */
    protected $id;

    /**
     * Nazev tagu
     * @var string
     * @ORM\Column(type="string")
     */
    protected $title;

	/**
	 * @ORM\ManyToMany(targetEntity="Post", mappedBy="tags")
	 */
	protected $posts;

	/**
	 * konstruktor - inicializuje kolekce
	 */
	public function __construct() {
		$this->posts = new ArrayCollection;
	}

	/**
     * Vrati ID tagu
     * @return number
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Nastavi ID tagu
     * @param number $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Vrati nazev tagu
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Nastavi nazev tagu
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

	/**
	 * vrati otagovane prispevky
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getPosts() {
		return $this->posts;
	}

	/**
	 * prida prispevek do kolekce s timto tagem
	 * @param PostInterface $post
	 * @return mixed
	 */
	public function addPost(PostInterface $post)
	{
		$this->posts->add($post);
	}

	/**
	 * odebere prispevek z kolekce s timto tagem
	 * @param CommentInterface $comment
	 * @return mixed
	 */
	public function removePost(PostInterface $post)
	{
		$this->posts->removeElement($post);
	}

    public function  __toString()
    {
        return $this->title;
    }
}

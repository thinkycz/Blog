<?php
/**
 * Created by PhpStorm.
 * User: kadleto2
 * Date: 24.9.14
 * Time: 14:54
 */

namespace Cvut\Fit\BiWt1\Blog\CommonBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class User
 * @package Cvut\Fit\BiWt1\Blog\CommonBundle\Entity
 * @ORM\Entity(repositoryClass="UserRepository")
 * @ORM\Table(name="blog_user")
 */
class User implements UserInterface
{

    /**
     * Identifikator uzivatele
     *
     * @var number
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="bigint")
     */
    protected $id;

    /**
     * Jmeno uzivatele
     *
     * @var string
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @var Collection<PostInterface>
     * @ORM\OneToMany(targetEntity="Post", mappedBy="author")
     */
    protected $posts;

	/**
	 * konstruktor - inicializuje kolekce
	 */
	public function __construct() {
		$this->posts = new ArrayCollection;
	}

    /**
     * @param number $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return number
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param PostInterface $post
     */
    public function addPost(PostInterface $post) {
		$this->posts->add($post);
    }

    /**
     * @param PostInterface $post
     */
    public function removePost(PostInterface $post) {
		$this->posts->removeElement($post);
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPosts()
    {
        return $this->posts;
    }
}

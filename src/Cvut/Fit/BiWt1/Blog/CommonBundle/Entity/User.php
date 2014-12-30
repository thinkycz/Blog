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
use Symfony\Component\Security\Core\Role\Role;
use Symfony\Component\Security\Core\User\UserInterface as CoreUserInterface;

/**
 * Class User
 * @package Cvut\Fit\BiWt1\Blog\CommonBundle\Entity
 * @ORM\Entity(repositoryClass="UserRepository")
 * @ORM\Table(name="blog_user")
 */
class User implements UserInterface, CoreUserInterface
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
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $posts;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $password;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $role;

	/**
	 * konstruktor - inicializuje kolekce
	 */
	public function __construct() {
		$this->posts = new ArrayCollection;
	}

    /**
     * @param string $role
     */
    public function setRole($role)
    {
        $this->role = $role;
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
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
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

    /**
     * Returns the roles granted to the user.
     *
     * <code>
     * public function getRoles()
     * {
     *     return array('ROLE_USER');
     * }
     * </code>
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return Role[] The user roles
     */
    public function getRoles()
    {
        return array($this->role);
    }

    public function getRole()
    {
        return $this->role;
    }

    /**
     * Returns the password used to authenticate the user.
     *
     * This should be the encoded password. On authentication, a plain-text
     * password will be salted, encoded, and then compared to this value.
     *
     * @return string The password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        return $this->name;
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {

    }

    public function __toString()
    {
        return $this->name;
    }
}

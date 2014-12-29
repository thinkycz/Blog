<?php
/**
 * Created by PhpStorm.
 * User: kadleto2
 * Date: 24.9.14
 * Time: 14:04
 */

namespace Cvut\Fit\BiWt1\Blog\CommonBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Entita prispevek
 *
 * Class Post
 * @package Cvut\Fit\BiWt1\Blog\CommonBundle\Entity
 * @ORM\Entity(repositoryClass="PostRepository")
 * @ORM\Table(name="blog_post")
 */
class Post implements PostInterface
{

	/**
	 * Unikatni ID
	 * @var number
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @ORM\Column(type="bigint")
	 */
    protected $id;

	/**
	 * Titulek prispevku
	 * @var string
	 * @ORM\Column(type="string")
	 */
    protected $title;

	/**
	 * Text (obsah) prispevku
	 * @var string
	 * @ORM\Column(type="string", length=1000000)
	 */
    protected $text;

    /**
     * Autor
     * @var UserInterface
     * @ORM\ManyToOne(targetEntity="User", inversedBy="posts")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $author;

	/**
	 * Zda je prispevek neverejny
	 * @var boolean
	 * @ORM\Column(type="boolean")
	 */
    protected $private = FALSE;

	/**
	 * Datum vytvoreni
	 * @var \DateTime
	 * @ORM\Column(type="datetime")
	 */
	protected $created;

	/**
	 * Datum posledni zmeny
	 * @var \DateTime
	 * @ORM\Column(type="datetime")
	 */
	protected $modified;

    /**
     * Odkdy je prispevek viditelny (publikovany)
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
	protected $publishFrom;

    /**
     * Dokdy je prispevek viditelny (publikovany)
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
	protected $publishTo;

    /**
     * Kolekce komentaru vztahujici se k prispevku
     * @var Collection
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="post")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
	protected $comments;

    /**
     * Kolekce souboru vztahujici se k prispevku
     * @var Collection
     * @ORM\OneToMany(targetEntity="File", mappedBy="post")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $files;

	/**
	 * Kolekce tagu vztahujici se k prispevku
	 * @var Collection
	 * @ORM\ManyToMany(targetEntity="Tag", inversedBy="posts", cascade={"persist"})
     * @ORM\JoinColumn(onDelete="CASCADE")
     * @ORM\JoinTable(name="blog_post_tag")
	 */
	protected $tags;

	/**
	 * konstruktor - inicializuje kolekce
	 */
	public function __construct() {
		$this->comments = new ArrayCollection;
		$this->files = new ArrayCollection;
		$this->tags = new ArrayCollection;
	}

    /**
     * @param UserInterface $author
     */
    public function setAuthor(UserInterface $author)
    {
        $this->author = $author;
    }

    /**
     * @return UserInterface
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param \DateTime $created
     */
    public function setCreated(\DateTime $created)
    {
        $this->created = $created;
    }

    /**
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param \DateTime $modified
     */
    public function setModified(\DateTime $modified)
    {
        $this->modified = $modified;
    }

    /**
     * @return \DateTime
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * @param mixed $private
     */
    public function setPrivate($private)
    {
        $this->private = $private;
    }

    /**
     * @return mixed
     */
    public function getPrivate()
    {
        return $this->private;
    }

    /**
     * @param \DateTime $publishFrom
     */
    public function setPublishFrom(\DateTime $publishFrom)
    {
        $this->publishFrom = $publishFrom;
    }

    /**
     * @return \DateTime
     */
    public function getPublishFrom()
    {
        return $this->publishFrom;
    }

    /**
     * @param \DateTime $publishTo
     */
    public function setPublishTo(\DateTime $publishTo)
    {
        $this->publishTo = $publishTo;
    }

    /**
     * @return \DateTime
     */
    public function getPublishTo()
    {
        return $this->publishTo;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

	/**
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getTags() {
		return $this->tags;
	}

    /**
     * @param FileInterface $file
     * @return mixed
     */
    public function addFile(FileInterface $file)
    {
        $this->files->add($file);
    }

    /**
     * @param FileInterface $file
     * @return mixed
     */
    public function removeFile(FileInterface $file)
    {
        $this->files->removeElement($file);
    }

    /**
     * @param CommentInterface $comment
     * @return mixed
     */
    public function addComment(CommentInterface $comment)
    {
        $this->comments->add($comment);
    }

    /**
     * @param CommentInterface $comment
     * @return mixed
     */
    public function removeComment(CommentInterface $comment)
    {
        $this->comments->removeElement($comment);
    }

	/**
	 * @param TagInterface $tag
	 * @return mixed
	 */
	public function addTag(TagInterface $tag)
	{
		$this->tags->add($tag);
	}

	/**
	 * @param TagInterface $tag
	 * @return mixed
	 */
	public function removeTag(TagInterface $tag)
	{
		$this->tags->removeElement($tag);
	}
}

<?php
/**
 * Created by PhpStorm.
 * User: kadleto2
 * Date: 24.9.14
 * Time: 17:52
 */

namespace Cvut\Fit\BiWt1\Blog\CommonBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Entita komentar k zapisku
 *
 * Class Comment
 * @package Cvut\Fit\BiWt1\Blog\CommonBundle\Entity
 * @ORM\Entity(repositoryClass="CommentRepository")
 * @ORM\Table(name="blog_comment")
 */
class Comment implements CommentInterface
{

    /**
     * Unikatni ID komentare
     * @var
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="bigint")
     */
    protected $id;

    /**
     * Autor, ktery komentar napsal
     * @var UserInterface
     * @ORM\ManyToOne(targetEntity="User")
     */
    protected $author;

    /**
     * Zapisek k nemuz komentar prislusi
     * @var PostInterface
     * @ORM\ManyToOne(targetEntity="Post", inversedBy="comments")
     */
    protected $post;

    /**
     * Rodicovsky komentar. Nepovinny.
     * @var CommentInterface
     * @ORM\ManyToOne(targetEntity="Comment")
     */
    protected $parent;

    /**
     * Text komentare
     * @var string
     * @ORM\Column(type="text")
     */
    protected $text;

    /**
     * Datum vytvoreni komentare
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    protected $created;

    /**
     * Datum posledni zmeny komentare
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    protected $modified;

    /**
     * Kolekce souboru vztahujici se ke komentari
     * @var Collection<FileInterface>
     * @ORM\OneToMany(targetEntity="File", mappedBy="comment")
     */
    protected $files;

    /**
     * Priznak, zda je komentar spam
     * @var boolean
     * @ORM\Column(type="boolean")
     */
    protected $spam;

	/**
	 * konstruktor - inicializuje kolekce
	 */
	public function __construct() {
		$this->files = new ArrayCollection;
	}

	/**
     * Vrati ID komentare
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Nastavi ID komentare
     *
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Vratui autora
     *
     * @return UserInterface
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Nastavi autora
     *
     * @param UserInterface $author
     */
    public function setAuthor(UserInterface $author)
    {
        $this->author = $author;
    }

    /**
     * Vrati prispevek, ke kteremu komentar prislusi
     *
     * @return PostInterface
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * Nastavi prispevek, ke kteremu komentar prislusi
     *
     * @param PostInterface $post
     */
    public function setPost(PostInterface $post)
    {
        $this->post = $post;
    }

    /**
     * Vrati text komentare
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Nastavi text komentare
     *
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * Vrati datum vytvoreni
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Nastavi datum vytvoreni
     *
     * @param \DateTime $created
     */
    public function setCreated(\DateTime $created)
    {
        $this->created = $created;
    }

    /**
     * @return \DateTime
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * @param \DateTime $modified
     */
    public function setModified($modified)
    {
        $this->modified = $modified;
    }

    /**
     * Vrati kolekci souboru prislusejicich tomuto komentari
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * Prida soubor k tomuto komentari
     *
     * @param File $file
     */
    public function addFile(FileInterface $file) {
		$this->files->add($file);
    }

    /**
     * Odebere soubor od tohoto komentare
     *
     * @param File $file
     */
	public function removeFile(FileInterface $file)
	{
		$this->files->removeElement($file);
	}

    /**
     * Vrati rodicovsky komentar, pokud existuje
     *
     * @return CommentInterface|null
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Nastavi rodicovsky komentar. Museji byt ke stejnemu zapisku.
     *
     * @param CommentInterface $parent
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    /**
     * Vrati priznak, zda se jedna o spam
     *
     * @return true|false
     */
    public function getSpam()
    {
        return $this->spam;
    }

    /**
     * Nastavi priznak, zda se jedna o spam
     *
     * @param boolean $spam
     */
    public function setSpam($spam)
    {
        $this->spam = $spam;
    }

}

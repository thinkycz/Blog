<?php
/**
 * Created by PhpStorm.
 * User: kadleto2
 * Date: 24.9.14
 * Time: 15:49
 */

namespace Cvut\Fit\BiWt1\Blog\CommonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entita pro ulozeni souboru
 *
 * Class File
 * @package Cvut\Fit\BiWt1\Blog\CommonBundle\Entity
 * @ORM\Entity(repositoryClass="FileRepository")
 * @ORM\Table(name="blog_file")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({"file" = "File", "image" = "Image"})
 */
class File implements FileInterface
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
     * Nazev souboru
     * @var string
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * Zapisek, ke kteremu je soubor pripojen. Povinne!
     * @var PostInterface
     * @ORM\ManyToOne(targetEntity="Post", inversedBy="files")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    protected $post;

    /**
     * Komentar, ke kteremu je soubor pripojen. Nepovinne!
     * @var CommentInterface
     * @ORM\ManyToOne(targetEntity="Comment", inversedBy="files")
     * @ORM\JoinColumn(nullable=true, onDelete="SET NULL")
     */
    protected $comment;

    /**
     * Datum vytvoreni
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    protected $created;

    /**
     * Typ souboru
     * @var string
     * @ORM\Column(type="string")
     */
    protected $internetMediaType;

    /**
     * Obsah souboru
     * @var blob
	 * @ORM\Column(type="blob")
     */
    protected $data;

    /**
     * Vrati unikatni identifikator souboru
     *
     * @return number
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Nastavi unikatni identifikator souboru
     *
     * @param number $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Vrati jmeno souboru
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Nastavi jmeno souboru
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Vrati zapisek, k nemuz soubor prislusi
     *
     * @return \Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\PostInterface
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * Nastavi zapisek, k nemuz soubor prislusi
     *
     * @param \Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\PostInterface $post
     */
    public function setPost($post)
    {
        $this->post = $post;
    }

    /**
     * Vrati datum a cas vytvoreni souboru
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Nastavi datum a cas vytvoreni souboru
     *
     * @param \DateTime $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * Vrati obsah souboru
     *
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Nastavi obsah souboru
     *
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * Vrati Internet Media Type souboru (drive MIME type)
     *
     * @return string
     */
    public function getInternetMediaType()
    {
        return $this->internetMediaType;
    }

    /**
     * Nastavi Internet Media Type souboru (drive MIME type)
     *
     * @param string $internetMediaType
     */
    public function setInternetMediaType($internetMediaType)
    {
        $this->internetMediaType = $internetMediaType;
    }

    /**
     * Vrati, k jakemu komentari soubor prislusi
     *
     * @return CommentInterface
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Nastavi, k jakemu komentari soubor prislusi
     *
     * @param CommentInterface $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

}

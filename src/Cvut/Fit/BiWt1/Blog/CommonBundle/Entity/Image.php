<?php
/**
 * Created by PhpStorm.
 * User: kadleto2
 * Date: 24.9.14
 * Time: 16:43
 */

namespace Cvut\Fit\BiWt1\Blog\CommonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entita obrazek
 *
 * Class Image
 * @package Cvut\Fit\BiWt1\Blog\CommonBundle\Entity
 * @ORM\Entity(repositoryClass="ImageRepository")
 * @ORM\Table(name="blog_image")
 */
class Image extends File implements ImageInterface
{

    /**
     * Rozliseni X
     * @var number
	 * @ORM\Column(type="integer")
     */
    protected $dimensionX;

    /**
     * Rozliseni Y
     * @var number
     * @ORM\Column(type="integer")
     */
    protected $dimensionY;

    /**
     * Data nahledu
     * @var blob
     * @ORM\Column(type="blob")
     */
    protected $preview;

    /**
     * Vrati rozliseni v ose X
     *
     * @return number
     */
    public function getDimensionX()
    {
        return $this->dimensionX;
    }

    /**
     * Nastavi rozliseni v ose X
     * @param number $dimensionX
     */
    public function setDimensionX($dimensionX)
    {
        $this->dimensionX = $dimensionX;
    }

    /**
     * Vrati rozliseni v ose Y
     *
     * @return number
     */
    public function getDimensionY()
    {
        return $this->dimensionY;
    }

    /**
     * Nastavi rozliseni v ose Y
     * @param number $dimensionY
     */
    public function setDimensionY($dimensionY)
    {
        $this->dimensionY = $dimensionY;
    }

    /**
     * Vrati data pro preview
     *
     * @return blob
     */
    public function getPreview()
    {
        return $this->preview;
    }

    /**
     * Nastavi data pro preview
     *
     * @param blob
     */
    public function setPreview($preview)
    {
        $this->preview = $preview;
    }
}

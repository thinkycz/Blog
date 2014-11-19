<?php
/**
 * Created by PhpStorm.
 * User: kadleto2
 * Date: 24.9.14
 * Time: 17:28
 */
namespace Cvut\Fit\BiWt1\Blog\CommonBundle\Entity;

/**
 * Rozhrani entity Image
 *
 * Interface ImageInterface
 * @package Cvut\Fit\BiWt1\Blog\CommonBundle\Entity
 */
interface ImageInterface extends FileInterface
{
    /**
     * Vrati rozliseni v ose X
     *
     * @return number
     */
    public function getDimensionX();

    /**
     * Nastavi rozliseni v ose X
     * @param number $dimensionX
     */
    public function setDimensionX($dimensionX);

    /**
     * Vrati rozliseni v ose Y
     *
     * @return number
     */
    public function getDimensionY();

    /**
     * Nastavi rozliseni v ose Y
     * @param number $dimensionY
     */
    public function setDimensionY($dimensionY);

    /**
     * Vrati data pro preview
     *
     * @return blob
     */
    public function getPreview();

    /**
     * Nastavi data pro preview
     *
     * @param blob
     */
    public function setPreview($preview);
}
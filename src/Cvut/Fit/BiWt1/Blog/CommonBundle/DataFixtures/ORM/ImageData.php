<?php
namespace Cvut\Fit\BiWt1\Blog\CommonBundle\DataFixtures\ORM;

use Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\Image;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ImageData extends AbstractFixture implements DependentFixtureInterface {
	/**
	 * Load data fixtures with the passed EntityManager
	 *
	 * @param Doctrine\Common\Persistence\ObjectManager $manager
	 */
	function load(ObjectManager $manager)
	{
		for($i = 20; $i < 30; $i++) {
			$image = new Image;
			$now = new \DateTime;

			$image->setName('Image ' . $i);
			$image->setPost($this->getReference('post-' . (intval($i/3))));
			$image->setComment($this->getReference('comment-' . $i));
			$image->setCreated($now);
			$image->setData('Image data ' . $i);
			$image->setInternetMediaType('application/octet-stream');
			$image->setDimensionX(320);
			$image->setDimensionY(240);
			$image->setPreview('Image preview ' . $i);

			$this->setReference('image-' . $i, $image);
			$manager->persist($image);
		}

		$manager->flush();
	}


	/**
	 * This method must return an array of fixtures classes
	 * on which the implementing class depends on
	 *
	 * @return array
	 */
	function getDependencies()
	{
		return [
			'Cvut\Fit\BiWt1\Blog\CommonBundle\DataFixtures\ORM\PostData',
			'Cvut\Fit\BiWt1\Blog\CommonBundle\DataFixtures\ORM\CommentData'
		];
	}
}
<?php
namespace Cvut\Fit\BiWt1\Blog\CommonBundle\DataFixtures\ORM;

use Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\File;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class FileData extends AbstractFixture implements DependentFixtureInterface {
	/**
	 * Load data fixtures with the passed EntityManager
	 *
	 * @param Doctrine\Common\Persistence\ObjectManager $manager
	 */
	function load(ObjectManager $manager)
	{
		for($i = 0; $i < 20; $i++) {
			$file = new File;
			$now = new \DateTime;

			$file->setName('File ' . $i);
			$file->setPost($this->getReference('post-' . (intval($i/3))));
			$file->setComment($this->getReference('comment-' . $i));
			$file->setCreated($now);
			$file->setData('File data ' . $i);
			$file->setInternetMediaType('application/octet-stream');

			$this->setReference('file-' . $i, $file);
			$manager->persist($file);
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
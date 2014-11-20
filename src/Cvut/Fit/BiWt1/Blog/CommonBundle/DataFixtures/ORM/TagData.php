<?php
namespace Cvut\Fit\BiWt1\Blog\CommonBundle\DataFixtures\ORM;

use Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\Tag;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;

class TagData extends AbstractFixture {
	/**
	 * Load data fixtures with the passed EntityManager
	 *
	 * @param Doctrine\Common\Persistence\ObjectManager $manager
	 */
	function load(ObjectManager $manager)
	{
		for($i = 0; $i < 7; $i++) {
			$tag = new Tag;

			$tag->setTitle('Tag ' . $i);
			$this->setReference('tag-' . $i, $tag);
			$manager->persist($tag);
		}

		$manager->flush();
	}
}
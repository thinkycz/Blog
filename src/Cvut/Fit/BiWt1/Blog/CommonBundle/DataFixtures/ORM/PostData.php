<?php
namespace Cvut\Fit\BiWt1\Blog\CommonBundle\DataFixtures\ORM;

use Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\Post;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class PostData extends AbstractFixture implements DependentFixtureInterface {
	/**
	 * Load data fixtures with the passed EntityManager
	 *
	 * @param Doctrine\Common\Persistence\ObjectManager $manager
	 */
	function load(ObjectManager $manager)
	{
		for($i = 0; $i < 20; $i++) {
			$post = new Post;
			$now = new \DateTime;

			$post->setTitle('Title ' . $i);
			$post->setText(str_repeat('Text ' . $i . ' ', 20));
			$post->setAuthor($this->getReference('user-' . ($i % 3)));
			$post->setCreated($now);
			$post->setModified($now);
			$post->setPublishFrom($now);
			$post->setPublishTo(new \DateTime('2020-12-31'));
			$post->addTag($this->getReference('tag-' . (($i + 1) % 7)));
			$post->addTag($this->getReference('tag-' . (($i + 2) % 7)));

			$this->setReference('post-' . $i, $post);
			$manager->persist($post);
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
			'Cvut\Fit\BiWt1\Blog\CommonBundle\DataFixtures\ORM\UserData',
			'Cvut\Fit\BiWt1\Blog\CommonBundle\DataFixtures\ORM\TagData'
		];
	}
}
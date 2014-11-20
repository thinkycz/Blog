<?php
namespace Cvut\Fit\BiWt1\Blog\CommonBundle\DataFixtures\ORM;

use Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\Comment;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class CommentData extends AbstractFixture implements DependentFixtureInterface {
	/**
	 * Load data fixtures with the passed EntityManager
	 *
	 * @param Doctrine\Common\Persistence\ObjectManager $manager
	 */
	function load(ObjectManager $manager)
	{
		for($i = 0; $i < 50; $i++) {
			$comment = new Comment;
			$now = new \DateTime;

			$comment->setText('Comment ' . $i);
			$comment->setAuthor($this->getReference('user-' . (($i + 1) % 3)));
			$comment->setCreated($now);
			$comment->setModified($now);
			$comment->setPost($this->getReference('post-' . (intval($i/3))));
			$comment->setSpam($i % 5 == 0);
			if($i > 25) {
				$comment->setParent($this->getReference('comment-' . ($i - 25)));
			} else {
				$comment->setParent(NULL);
			}

			$this->setReference('comment-' . $i, $comment);
			$manager->persist($comment);
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
			'Cvut\Fit\BiWt1\Blog\CommonBundle\DataFixtures\ORM\PostData'
		];
	}
}
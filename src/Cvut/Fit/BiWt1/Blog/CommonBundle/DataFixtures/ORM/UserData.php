<?php
namespace Cvut\Fit\BiWt1\Blog\CommonBundle\DataFixtures\ORM;

use Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserData extends AbstractFixture {
	/**
	 * Load data fixtures with the passed EntityManager
	 *
	 * @param Doctrine\Common\Persistence\ObjectManager $manager
	 */
	function load(ObjectManager $manager)
	{
		for($i = 0; $i < 3; $i++) {
			$user = new User;
			$user->setName('User ' . $i);
            $user->setPassword('Pass '. $i);
			$this->setReference('user-' . $i, $user);
			$manager->persist($user);
		}

		$manager->flush();
	}

}
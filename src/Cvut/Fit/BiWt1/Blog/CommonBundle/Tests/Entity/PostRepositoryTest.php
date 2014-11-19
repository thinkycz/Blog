<?php
namespace Cvut\Fit\BiWt1\Blog\CommonBundle\Tests\Entity;

use Cvut\Fit\BiWt1\Blog\CommonBundle\TestCase\ApplicationTestCase;
use Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\Post;
use Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\User;

class PostRepositoryTest extends ApplicationTestCase
{
	protected function _getRepo() {
		return $this->container->get('cvut_fit_biwt1_blog_common.repository.post');
	}

	protected function _createUser() {
		$repo = $this->container->get('cvut_fit_biwt1_blog_common.repository.user');
		$object = new User;
		$object->setName('User 1');
		$repo->create($object);

		return $object;
	}

	protected function _create() {
		$repo = $this->_getRepo();
		$now = new \DateTime;

		$object = new Post;
		$object->setTitle('Title 1');
		$object->setText('Text 1');
		$object->setAuthor($this->_createUser());
		$object->setCreated($now);
		$object->setModified($now);
		$object->setPublishFrom($now);
		$object->setPublishTo(new \DateTime('2020-12-31'));

		$repo->create($object);

		return $object;
	}

	protected function _update($object) {
		$repo = $this->_getRepo();
		$object2 = $repo->find($object->getId());
		$object2->setTitle('Title 2');
		$repo->update($object2);

		return $object2;
	}

	protected function _getAttribute($object) {
		return $object->getTitle();
	}

	public function testCreate()
	{
		$repo = $this->_getRepo();
		$object = $this->_create();

		$object2 = $repo->find($object->getId());
		$this->assertSame($object, $object2);
	}

	public function testUpdate()
	{
		$repo = $this->_getRepo();
		$object = $this->_create();

		$object2 = $this->_update($object);

		$object3 = $repo->find($object2->getId());
		$this->assertSame($object2, $object3);
	}

	public function testRemove()
	{
		$repo = $this->_getRepo();
		$object = $this->_create();

		$id = $object->getId();
		$repo->remove($object);

		$object2 = $repo->find($id);

		$this->assertNull($object2);
	}

	public function testMerge()
	{
		$repo = $this->_getRepo();
		$object = $this->_create();
		$id = $object->getId();
		$attrib = $this->_getAttribute($object);
		$this->em->detach($object);

		$object2 = $repo->find($id);

		$object3 = $this->_update($object2);

		$object4 = $repo->merge($object);

		$this->assertTrue($this->_getAttribute($object4) == $attrib);
	}

	public function testRefresh()
	{
		$repo = $this->_getRepo();
		$object = $this->_create();
		$id = $object->getId();
		$attrib = $this->_getAttribute($object);

		$object2 = new Post;
		$object2->setId($id);
		$object2->setTitle('Title 3');
		$object3 = $repo->merge($object2);

		$repo->refresh($object3);

		$this->assertTrue($this->_getAttribute($object3) == $attrib);
	}
}

<?php
/**
 * Created by PhpStorm.
 * User: kadleto2
 * Date: 12.6.14
 * Time: 7:31
 */

namespace Cvut\Fit\BiWt1\Blog\CommonBundle\TestCase;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Security\Core\Authentication\Token\AnonymousToken;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\SecurityContextInterface;

class ApplicationTestCase extends WebTestCase {

    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * @var SecurityContextInterface
     */
    protected $securityContext;

    /**
     * V potomkovi lze implementovat podle potreby tak, aby se vracel
     * smysluplny uzivatel a slo testovat security
     *
     * @return
     */
    protected function getUser()
    {
        return null;
    }

    /**
     * Inicializace security contextu s nastavenym uzivatelem
     */
    protected function initSecurityContext()
    {
        $user = $this->getUser();
        if (empty($user))
            $token = new AnonymousToken(uniqid("key-"), $user);
        else
            $token = new UsernamePasswordToken(
                $user, null, 'main', $user->getRoles()
            );
        $this->securityContext->setToken($token);
    }

    public function setUp() {
        static::$kernel = static::createKernel();
        static::$kernel->boot();
        $container = static::$kernel->getContainer();
        $this->container = $container;

        $this->em = $container->get('doctrine')->getManager();
        $this->securityContext = $container->get('security.context');
    }

    public function tearDown() {
        parent::tearDown();
//        static::$kernel->shutdown();
    }

} 
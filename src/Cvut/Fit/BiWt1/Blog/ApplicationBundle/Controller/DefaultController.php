<?php

namespace Cvut\Fit\BiWt1\Blog\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="index")
     * @Template()
     */
    public function indexAction()
    {
        $blogService = $this->get("cvut_fit_biwt1_blog");
        $entities = $blogService->findAllPosts();

        return array(
            'entities' => $entities
        );
    }

    /**
     * Finds and displays a Post entity.
     *
     * @Route("/post/{id}", name="post_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $blogService = $this->get("cvut_fit_biwt1_blog");

        $entity = $blogService->findPost($id);

        return array(
            'entity'      => $entity
        );
    }
}

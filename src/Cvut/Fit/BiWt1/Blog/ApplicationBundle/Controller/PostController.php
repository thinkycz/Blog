<?php

namespace Cvut\Fit\BiWt1\Blog\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class PostController extends Controller
{
    /**
     * @Route("/index")
     * @Template()
     */
    public function indexAction()
    {
        $posts = $this->get('cvut_fit_biwt1_blog')->getPosts();
        return array(
            'posts' => $posts
        );
    }
}

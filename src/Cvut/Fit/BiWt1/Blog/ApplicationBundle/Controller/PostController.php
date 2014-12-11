<?php

namespace Cvut\Fit\BiWt1\Blog\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class PostController extends Controller
{
    /**
     * @Route("")
     * @Template()
     */
    public function indexAction()
    {
        $posts = $this->get('cvut_fit_biwt1_blog')->findAllPosts();
        return array(
            'posts' => $posts
        );
    }

    /**
     * @Route("post/{id}", name="detailAction")
     * @Template()
     */
    public function detailAction($id)
    {
        $post = $this->get('cvut_fit_biwt1_blog')->findPost($id);
        return array(
            'post' => $post
        );
    }
}

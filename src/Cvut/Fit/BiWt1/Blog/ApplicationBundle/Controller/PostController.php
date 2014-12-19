<?php

namespace Cvut\Fit\BiWt1\Blog\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Cvut\Fit\BiWt1\Blog\CommonBundle\Form\FileType;

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

        $form = $this->createForm(
            new FileType,
            NULL,
            array('action' => $this->generateUrl('post_upload_file', array('id' => $post->getId())))
        );

        return array(
            'post' => $post,
            'form' => $form->createView()
        );
    }

    /**
     * @param $id
     * @Route("post/{id}/upload", name="post_upload_file")
     */
    public function uploadAction($id)
    {

    }
}

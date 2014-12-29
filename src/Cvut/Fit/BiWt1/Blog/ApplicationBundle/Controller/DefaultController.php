<?php

namespace Cvut\Fit\BiWt1\Blog\ApplicationBundle\Controller;

use Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\Comment;
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
            'entity'      => $entity,
        );
    }

    /**
     * Creates a new comment.
     *
     * @Route("/post/{id}/comment", name="post_comment")
     * @Method("POST")
     *
     */
    public function commentAction(Request $request, $id)
    {
        $blogService = $this->get("cvut_fit_biwt1_blog");

        $entity = $blogService->findPost($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Post entity.');
        }

        $newComment = new Comment();
        $newComment->setCreated(new \DateTime());
        $newComment->setModified(new \DateTime());
        $newComment->setAuthor($this->getUser());
        $newComment->setText($request->get('text'));
        $newComment->setSpam(false);

        $parentComment = $blogService->findComment($request->get("parent"));

        $blogService->addComment($entity, $newComment, $parentComment);

        return $this->redirect($this->generateUrl('post_show', array('id' => $id)));
    }
}

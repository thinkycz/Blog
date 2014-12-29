<?php

namespace Cvut\Fit\BiWt1\Blog\ApplicationBundle\Controller;

use Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\Tag;
use Doctrine\Common\Collections\Criteria;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\Post;

/**
 * Post controller.
 *
 * @Route("/admin/post")
 */
class PostController extends Controller
{

    /**
     * Lists all Post entities.
     *
     * @Route("/", name="admin_post")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $blogService = $this->get("cvut_fit_biwt1_blog");

        $entities = $blogService->findAllPosts();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Post entity.
     *
     * @Route("/", name="admin_post_create")
     * @Method("POST")
     * @Template("BlogCommonBundle:Post:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $blogService = $this->get("cvut_fit_biwt1_blog");

        $entity = new Post();

        $entity->setAuthor($this->getUser());
        $entity->setCreated(new \DateTime());
        $entity->setModified(new \DateTime());
        $entity->setPublishFrom(new \DateTime());
        $entity->setPublishTo(new \DateTime());
        $entity->setTitle($request->get('title'));
        $entity->setText($request->get('text'));

        $tags = explode("|", $request->get('tags'));

        foreach($tags as $tagStr)
        {
            if($blogService->findTagByString(Criteria::create()->where(Criteria::expr()->eq('title', $tagStr))))
                $tag = $blogService->findTagByString(Criteria::create()->where(Criteria::expr()->eq('title', $tagStr)));
            else
                $tag = new Tag();

            $tag->addPost($entity);
            $tag->setTitle($tagStr);
            $entity->addTag($tag);
        }

        if($request->get('private'))
            $entity->setPrivate(true);
        else
            $entity->setPrivate(false);


        $blogService->createPost($entity);

        return $this->redirect($this->generateUrl('admin_post_show', array('id' => $entity->getId())));

    }

    /**
     * Displays a form to create a new Post entity.
     *
     * @Route("/new", name="admin_post_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        return array();
    }

    /**
     * Finds and displays a Post entity.
     *
     * @Route("/{id}", name="admin_post_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $blogService = $this->get("cvut_fit_biwt1_blog");

        $entity = $blogService->findPost($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Post entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }

    /**
     * Displays a form to edit an existing Post entity.
     *
     * @Route("/{id}/edit", name="admin_post_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $blogService = $this->get("cvut_fit_biwt1_blog");

        $entity = $blogService->findPost($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Post entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }

    /**
     * Edits an existing Post entity.
     *
     * @Route("/{id}", name="admin_post_update")
     * @Method("POST")
     * @Template("BlogCommonBundle:Post:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $blogService = $this->get("cvut_fit_biwt1_blog");

        $entity = $blogService->findPost($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Post entity.');
        }

        $entity->setAuthor($this->getUser());
        $entity->setModified(new \DateTime());
        $entity->setPublishFrom(new \DateTime($request->get('publishfrom')));
        $entity->setPublishTo(new \DateTime($request->get('publishto')));
        $entity->setTitle($request->get('title'));
        $entity->setText($request->get('text'));

        foreach($entity->getTags() as $tag)
        {
            $entity->removeTag($tag);
            $tag->removePost($entity);
        }


        $tags = explode("|", $request->get('tags'));

        foreach($tags as $tagStr)
        {
            if($blogService->findTagByString(Criteria::create()->where(Criteria::expr()->eq('title', $tagStr))))
                $tag = $blogService->findTagByString(Criteria::create()->where(Criteria::expr()->eq('title', $tagStr)));
            else
                $tag = new Tag();

            $tag->addPost($entity);
            $tag->setTitle($tagStr);
            $entity->addTag($tag);
        }

        if($request->get('private'))
            $entity->setPrivate(true);
        else
            $entity->setPrivate(false);

        $blogService->updatePost($entity);
        return $this->redirect($this->generateUrl('admin_post'));
    }

    /**
     * Deletes a Post entity.
     *
     * @Route("/{id}/delete", name="admin_post_delete")
     * @Method("GET")
     */
    public function deleteAction($id)
    {
        $blogService = $this->get("cvut_fit_biwt1_blog");
        $post = $blogService->findPost($id);
        $blogService->deletePost($post);

        return $this->redirect($this->generateUrl('admin_post'));
    }

    /**
     * Deletes a comment
     *
     * @Route("/{idPost}/delete/{idComment}", name="admin_comment_delete")
     * @Method("GET")
     * @param $idPost, $idComment
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function commentDeleteAction($idPost, $idComment)
    {
        $blogService = $this->get("cvut_fit_biwt1_blog");
        $comment = $blogService->findComment($idComment);
        $blogService->deleteComment($comment);

        return $this->redirect($this->generateUrl('admin_post_show', array('id' => $idPost)));
    }

    /**
     * Edits a comment
     *
     * @Route("/{idPost}/edit/{idComment}", name="admin_comment_edit")
     * @param Request $request
     * @param $idPost, $idComment
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function commentEditAction(Request $request, $idPost, $idComment)
    {
        $blogService = $this->get("cvut_fit_biwt1_blog");
        $comment = $blogService->findComment($idComment);
        $comment->setText($request->get('text'));
        $blogService->updateComment($comment);

        return $this->redirect($this->generateUrl('admin_post_show', array('id' => $idPost)));
    }
}

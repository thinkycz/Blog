<?php

namespace Cvut\Fit\BiWt1\Blog\ApplicationBundle\Controller;

use Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\Comment;
use Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\PostInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\File;

class DefaultController extends Controller
{

    /**
     * Displays page to filter
     *
     * @Route("/filter/main", name="filter_main")
     * @return array
     * @Template()
     */
    public function filterMainAction()
    {
        return array();
    }

    /**
     * Displays posts according to the set filter
     *
     * @Route("/filter/{byData}/{theData}", name="filter")
     * @return array;
     * @Template("BlogApplicationBundle:Default:index.html.twig")
     */
    public function filterAction()
    {
        return array();
    }

    /**
     * Displays page number
     *
     * @Route("/page/{page}", name="page", defaults={"page" = 1})
     * @Template("BlogApplicationBundle:Default:index.html.twig")
     * @param number $page
     * @return array
     */
    public function pageAction($page)
    {
        $blogService = $this->get("cvut_fit_biwt1_blog");
        $entities = $blogService->findAllPosts();
        $total = ceil(sizeof($entities)/5);

        return array(
            'entities' => $entities,
            'totalpages' => $total,
            'currentpage' => $page,
        );
    }

    /**
     * Displays main page
     *
     * @Route("/", name="index", defaults={"page" = 1})
     * @Template()
     * @param number $page
     * @return array
     */
    public function indexAction($page)
    {
        $blogService = $this->get("cvut_fit_biwt1_blog");
        $entities = $blogService->findAllPosts();
        $total = ceil(sizeof($entities)/5);

        return array(
            'entities' => $entities,
            'totalpages' => $total,
            'currentpage' => $page,
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

        if(!(!$entity->getPrivate() || $this->get('security.context')->isGranted('ROLE_READER')))
            throw new AccessDeniedException;

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

        foreach($request->files->get('files') as $tmp)
        {
            if($tmp)
            {
                $file = new File();
                $file->setData($tmp);
                $file->setCreated(new \DateTime());
                $blogService->addPostFile($file, $entity, $newComment);
            }
        }

        $parentComment = $blogService->findComment($request->get("parent"));

        $blogService->addComment($entity, $newComment, $parentComment);

        return $this->redirect($this->generateUrl('post_show', array('id' => $id)));
    }


    /**
     * Download action
     * @Route("/post/{idPost}/download/{fileName}", name="download_file")
     * @param $idPost
     * @param $fileName
     * @return BinaryFileResponse
     */
    public function downloadAction($idPost, $fileName)
    {
        $path = $this->get('kernel')->getRootDir(). "/data/";
        $file = $path.$idPost.'/'.$fileName; // Path to the file on the server
        $response = new BinaryFileResponse($file);

        // Give the file a name:
        $response->setContentDisposition(ResponseHeaderBag::DISPOSITION_ATTACHMENT,$fileName);

        return $response;
    }
}

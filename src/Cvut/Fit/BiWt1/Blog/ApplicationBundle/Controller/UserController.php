<?php

namespace Cvut\Fit\BiWt1\Blog\ApplicationBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\User;
use Cvut\Fit\BiWt1\Blog\CommonBundle\Form\UserType;

/**
 * User controller.
 *
 * @Route("/admin/user")
 */
class UserController extends Controller
{

    /**
     * Lists all User entities.
     *
     * @Route("/", name="admin_user")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $userService = $this->get("cvut_fit_biwt1_user");

        $entities = $userService->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new User entity.
     *
     * @Route("/", name="admin_user_create")
     * @Method("POST")
     * @Template("BlogCommonBundle:User:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $userService = $this->get("cvut_fit_biwt1_user");

        $entity = new User();
        $entity->setName($request->get('username'));
        $entity->setPassword($request->get('password'));
        $entity->setRole($request->get('role'));

        $userService->create($entity);
        return $this->redirect($this->generateUrl('admin_user_show', array('id' => $entity->getId())));
    }

    /**
     * Displays a form to create a new User entity.
     *
     * @Route("/new", name="admin_user_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        return array();
    }

    /**
     * Finds and displays a User entity.
     *
     * @Route("/{id}", name="admin_user_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $userService = $this->get("cvut_fit_biwt1_user");

        $entity = $userService->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }

    /**
     * Displays a form to edit an existing User entity.
     *
     * @Route("/{id}/edit", name="admin_user_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $userService = $this->get("cvut_fit_biwt1_user");

        $entity = $userService->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }

    /**
     * Edits an existing User entity.
     *
     * @Route("/{id}/edit", name="admin_user_update")
     * @Template("BlogCommonBundle:User:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $userService = $this->get("cvut_fit_biwt1_user");

        $entity = $userService->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $entity->setName($request->get('username'));
        $entity->setPassword($request->get('password'));
        $entity->setRole($request->get('role'));
        $userService->update($entity);
        return $this->redirect($this->generateUrl('admin_user'));
    }

    /**
     * Deletes a User entity.
     *
     * @Route("/{id}/delete", name="admin_user_delete")
     */
    public function deleteAction($id)
    {
        $userService = $this->get("cvut_fit_biwt1_user");
        $entity = $userService->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $userService->delete($entity);

        return $this->redirect($this->generateUrl('admin_user'));
    }
}

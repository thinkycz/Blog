<?php
/**
 * Created by PhpStorm.
 * User: thinky
 * Date: 19.12.14
 * Time: 17:22
 */

namespace Cvut\Fit\BiWt1\Blog\ApplicationBundle\Service;

use Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\CommentInterface;
use Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\FileInterface;
use Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\PostInterface;
use Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\TagInterface;
use Cvut\Fit\BiWt1\Blog\CommonBundle\Service\BlogInterface;
use Doctrine\Common\Collections\Collection;

class BlogService implements BlogInterface {

    /**
     * Vytvori novy tag, pokud neexistuje
     *
     * @param TagInterface $tag
     * @return TagInterface
     */
    public function createTag(TagInterface $tag)
    {
        // TODO: Implement createTag() method.
    }

    /**
     * Upravi stavajici tag
     *
     * @param TagInterface $tag
     * @return TagInterface
     */
    public function updateTag(TagInterface $tag)
    {
        // TODO: Implement updateTag() method.
    }

    /**
     * Smaze tag
     *
     * @param TagInterface $tag
     * @return TagInterface
     */
    public function deleteTag(TagInterface $tag)
    {
        // TODO: Implement deleteTag() method.
    }

    /**
     * Nalezne tag podle ID a vrati
     *
     * @param $id
     * @return TagInterface
     */
    public function findTag($id)
    {
        // TODO: Implement findTag() method.
    }

    /**
     * Najde a vrati tagy podle kriterii
     *
     * @param mixed $criteria - cast QueryBuilderu, ktera se pouzije v QueryBuilder::andWhere
     * @return Collection<TagInterface>
     */
    public function findTagBy($criteria)
    {
        // TODO: Implement findTagBy() method.
    }

    /**
     * Vytvori novy zapisek
     *
     * @param PostInterface $post
     * @return PostInterface
     */
    public function createPost(PostInterface $post)
    {
        // TODO: Implement createPost() method.
    }

    /**
     * Aktualizuje zapisek
     *
     * @param PostInterface $post
     * @return PostInterface
     */
    public function updatePost(PostInterface $post)
    {
        // TODO: Implement updatePost() method.
    }

    /**
     * Smaze zapisek
     *
     * @param PostInterface $post
     * @return PostInterface
     */
    public function deletePost(PostInterface $post)
    {
        // TODO: Implement deletePost() method.
    }

    /**
     * Najde zapisek podle ID a vrati
     *
     * @param $id
     * @return PostInterface
     */
    public function findPost($id)
    {
        // TODO: Implement findPost() method.
    }

    /**
     * Najde zapisky podle kriterii a vrati
     *
     * @param mixed $criteria - cast QueryBuilderu, ktera se pouzije v QueryBuilder::andWhere
     * @return Collection<PostInterface>
     */
    public function findPostBy($criteria)
    {
        // TODO: Implement findPostBy() method.
    }

    /**
     * Prida k zapisku komentar
     *
     * @param PostInterface $post
     * @param CommentInterface $comment
     * @param CommentInterface $parentComment
     * @return PostInterface
     */
    public function addComment(PostInterface $post, CommentInterface $comment,
                               CommentInterface $parentComment = null)
    {
        // TODO: Implement addComment() method.
    }

    /**
     * Odebere od zapisku komentar
     *
     * @param CommentInterface $comment
     * @return PostInterface
     */
    public function deleteComment(CommentInterface $comment)
    {
        // TODO: Implement deleteComment() method.
    }

    /**
     * Prida k zapisku a pripadne komentari soubor
     *
     * @param $file
     * @param $post
     * @param $comment
     * @return PostInterface
     */
    public function addPostFile(FileInterface $file, PostInterface $post,
                                CommentInterface $comment = null)
    {
        // TODO: Implement addPostFile() method.
    }

    /**
     * Odebere od zapisku soubor
     *
     * @param $file
     * @return PostInterface
     */
    public function deleteFile($file)
    {
        // TODO: Implement deleteFile() method.
    }
}
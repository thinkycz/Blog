<?php
namespace Cvut\Fit\BiWt1\Blog\CommonBundle\Service;

use Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\CommentInterface;
use Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\FileInterface;
use Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\PostInterface;
use Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\TagInterface;
use Doctrine\Common\Collections\Collection;

/**
 * Rozhrani sluzby pro obsluhu blogu
 *
 * Interface BlogInterface
 * @package Cvut\Fit\BiWt1\Blog\CommonBundle\Service
 */
interface BlogInterface {

    /* ### Tag ### */

    /**
     * Vytvori novy tag, pokud neexistuje
     *
     * @param TagInterface $tag
     * @return TagInterface
     */
    public function createTag(TagInterface $tag);

    /**
     * Upravi stavajici tag
     *
     * @param TagInterface $tag
     * @return TagInterface
     */
    public function updateTag(TagInterface $tag);

    /**
     * Smaze tag
     *
     * @param TagInterface $tag
     * @return TagInterface
     */
    public function deleteTag(TagInterface $tag);

    /**
     * Nalezne tag podle ID a vrati
     *
     * @param $id
     * @return TagInterface
     */
    public function findTag($id);

    /**
     * Najde a vrati tagy podle kriterii
     *
     * @param mixed $criteria - cast QueryBuilderu, ktera se pouzije v QueryBuilder::andWhere
     * @return Collection<TagInterface>
     */
    public function findTagBy($criteria);

    /* ### Post ### */

    /**
     * Vytvori novy zapisek
     *
     * @param PostInterface $post
     * @return PostInterface
     */
    public function createPost(PostInterface $post);

    /**
     * Aktualizuje zapisek
     *
     * @param PostInterface $post
     * @return PostInterface
     */
    public function updatePost(PostInterface $post);

    /**
     * Smaze zapisek
     *
     * @param PostInterface $post
     * @return PostInterface
     */
    public function deletePost(PostInterface $post);

    /**
     * Najde zapisek podle ID a vrati
     *
     * @param $id
     * @return PostInterface
     */
    public function findPost($id);

    /**
     * Najde zapisky podle kriterii a vrati
     *
     * @param mixed $criteria - cast QueryBuilderu, ktera se pouzije v QueryBuilder::andWhere
     * @return Collection<PostInterface>
     */
    public function findPostBy($criteria);

    /* ### Comment ### */

    /**
     * Prida k zapisku komentar
     *
     * @param PostInterface $post
     * @param CommentInterface $comment
     * @param CommentInterface $parentComment
     * @return PostInterface
     */
    public function addComment(PostInterface $post, CommentInterface $comment,
                               CommentInterface $parentComment = null);

    /**
     * Odebere od zapisku komentar
     *
     * @param CommentInterface $comment
     * @return PostInterface
     */
    public function deleteComment(CommentInterface $comment);

    /* ### File ### */

    /**
     * Prida k zapisku a pripadne komentari soubor
     *
     * @param $file
     * @param $post
     * @param $comment
     * @return PostInterface
     */
    public function addPostFile(FileInterface $file, PostInterface $post,
                                CommentInterface $comment = null);

    /**
     * Odebere od zapisku soubor
     *
     * @param FileInterface $file
     * @return PostInterface
     */
    public function deleteFile(FileInterface $file);

}
<?php
/**
 * Created by PhpStorm.
 * User: thinky
 * Date: 19.12.14
 * Time: 17:22
 */

namespace Cvut\Fit\BiWt1\Blog\ApplicationBundle\Service;

use Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\PostRepository;
use Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\TagRepository;

use Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\CommentInterface;
use Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\FileInterface;
use Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\PostInterface;
use Cvut\Fit\BiWt1\Blog\CommonBundle\Entity\TagInterface;
use Cvut\Fit\BiWt1\Blog\CommonBundle\Service\BlogInterface;
use Doctrine\Common\Collections\Collection;

class BlogService implements BlogInterface {

    protected $postRepository;
    protected $tagRepository;

    public function __construct(PostRepository $postRepository, TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
        $this->postRepository = $postRepository;
    }

    /**
     * Vytvori novy tag, pokud neexistuje
     *
     * @param TagInterface $tag
     * @return TagInterface
     */
    public function createTag(TagInterface $tag)
    {
        $this->tagRepository->create($tag);
        return $tag;
    }

    /**
     * Upravi stavajici tag
     *
     * @param TagInterface $tag
     * @return TagInterface
     */
    public function updateTag(TagInterface $tag)
    {
        $this->tagRepository->update($tag);
        return $tag;
    }

    /**
     * Smaze tag
     *
     * @param TagInterface $tag
     * @return TagInterface
     */
    public function deleteTag(TagInterface $tag)
    {
        $this->tagRepository->remove($tag);
        return $tag;
    }

    /**
     * Nalezne tag podle ID a vrati
     *
     * @param $id
     * @return TagInterface
     */
    public function findTag($id)
    {
        return $this->tagRepository->find($id);
    }

    /**
     * Najde a vrati tagy podle kriterii
     *
     * @param mixed $criteria - cast QueryBuilderu, ktera se pouzije v QueryBuilder::andWhere
     * @return Collection<TagInterface>
     */
    public function findTagBy($criteria)
    {
        return $this->tagRepository->findBy($criteria);
    }

    /**
     * Vytvori novy zapisek
     *
     * @param PostInterface $post
     * @return PostInterface
     */
    public function createPost(PostInterface $post)
    {
        $this->postRepository->create($post);
        return $post;
    }

    /**
     * Aktualizuje zapisek
     *
     * @param PostInterface $post
     * @return PostInterface
     */
    public function updatePost(PostInterface $post)
    {
        $this->postRepository->update($post);
        return $post;
    }

    /**
     * Smaze zapisek
     *
     * @param PostInterface $post
     * @return PostInterface
     */
    public function deletePost(PostInterface $post)
    {
        $this->postRepository->remove($post);
        return $post;
    }

    /**
     * Najde zapisek podle ID a vrati
     *
     * @param $id
     * @return PostInterface
     */
    public function findPost($id)
    {
        return $this->postRepository->find($id);
    }

    /**
     * Najde zapisky podle kriterii a vrati
     *
     * @param mixed $criteria - cast QueryBuilderu, ktera se pouzije v QueryBuilder::andWhere
     * @return Collection<PostInterface>
     */
    public function findPostBy($criteria)
    {
        return $this->postRepository->findBy($criteria);
    }

    public function findAllPosts()
    {
        return $this->postRepository->findAll();
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
        $comment->setParent($parentComment);
        $comment->setPost($post);
        $post->addComment($comment);
        $this->postRepository->update($post);
        return $post;
    }

    /**
     * Odebere od zapisku komentar
     *
     * @param CommentInterface $comment
     * @return PostInterface
     */
    public function deleteComment(CommentInterface $comment)
    {
        $post = $comment->getPost();
        $post->removeComment($comment);
        $this->postRepository->update($post);
        return $post;
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
        $file->setPost($post);
        $file->setComment($comment);
        $post->addFile($file);
        $this->postRepository->update($post);
        return $post;
    }

    /**
     * Odebere od zapisku soubor
     *
     * @param FileInterface $file
     * @return PostInterface
     */
    public function deleteFile(FileInterface $file)
    {
        $post = $file->getPost();
        $post->removeFile($file);
        $this->postRepository->update($post);
        return $post;
    }
}
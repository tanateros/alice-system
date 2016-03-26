<?php

namespace Module\Comment\Model;

use Module\Comment\Validate\Validate as Validate;
use Module\Comment\Entity\comments as CommentTable;
use Core\Manager as EntityManager;
use Core\Application as Application;

/**
 * Class Comment
 * @package Module\Comment\Model
 */
class Comment
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $db;
    /**
     * @var string
     */
    public $entity;

    function __construct()
    {
        $dbConnect = Application::$config['db'];
        $this->db = (new EntityManager($dbConnect))->getManager();
        $this->entity = 'Module\Comment\Entity\Comments';
    }

    /**
     * @return array
     */
    function showAll()
    {
        return $this->db->getRepository($this->entity)->findAll();
    }

    /**
     * @param int $id
     * @return array
     */
    function getId($id)
    {
        return $this->db->getRepository($this->entity)->findBy(array('id' => $id));
    }

    /**
     * @param int $id
     * @param array $post
     * @return $this
     */
    /*
    function edit($id, $post)
    {
        $qry = $this->db->prepare('UPDATE comments SET name=?, email=?, text=? WHERE id=' . $id);
        $qry->execute(array($post['name'], $post['email'], $post['text']));
        return $this;
    }
    */

    /**
     * @return $this
     */
    function add()
    {
        $commentData = Validate::filterAddCommentPost();
        $comment = new CommentTable();
        $comment
            ->setName($commentData['name'])
            ->setEmail($commentData['email'])
            ->setText($commentData['text']);

        $this->db->persist($comment);
        $this->db->flush();
        return $this;
    }
}
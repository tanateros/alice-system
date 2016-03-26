<?php

namespace Module\Comment\Controller;

use Core\Request as Request;
use Core\Response as Response;
use Module\Comment\Model\Comment as CommentModel;
use Core\ViewTemplate as ViewTemplate;

/**
 * Class Comment
 * @package Module\Comment\Controller
 */
class Comment
{
    /**
     * @return Response
     */
    function index()
    {
        // $res = $em->getRepository('Module\Comment\Entity\comments')->findBy(array('id' => 1));
        $commentModel = new CommentModel();
        $data = $commentModel->showAll();
        $view = new ViewTemplate('..\Module\Comment\View\new-comment');
        return new Response($view, $data);
    }

    /**
     * @return Response::text()
     */
    function add()
    {
        header('Refresh: 1; url=/');
        $commentModel = new CommentModel();
        $commentModel->add();

        return Response::text('Вы успешно добавили запись. Через 1 секунду будете перенаправлены обратно на страницу.');
    }
}
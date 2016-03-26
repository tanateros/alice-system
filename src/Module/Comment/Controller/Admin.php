<?php

namespace Module\Comment\Controller;

use Core\Request as Request;
use Core\Response as Response;
use Core\Session as Session;
use Module\Comment\Model\Comment as CommentModel;
use Core\ViewTemplate as ViewTemplate;

/**
 * Class Admin
 * @package Controller
 */
class Admin
{
    /**
     * @return Response | "redirected"
     */
    function login()
    {
        $request = new Request();
        $session = new Session();
        if ($request->post('login') == 'admin' && $request->post('password') == '123') {
            $session->set('isAdmin', true);
            header("Location: /comment/admin");
        } else {
            $view = new ViewTemplate('..\Module\Comment\View\login');
            return new Response($view);
        }
    }

    function admin()
    {
        if ($_SESSION['isAdmin']) {
            $commentModel = new CommentModel();
            $data['comments'] = $commentModel->showAll();
            $view = new ViewTemplate('..\Module\Comment\View\admin-comments');
            return new Response($view, $data);
        } else {
            header("Location: /comment/login");
        }
    }

    function adminCommentEdit()
    {
        if ($_SESSION['isAdmin']) {
            $modelComment = new CommentModel();
            $id = (int) $_GET['id'];
            if (!empty($_POST)) {
                $modelComment->edit($id, $_POST);
            }
            $data['editComment'] = $modelComment->getId($id);
            // echo View::show('..\Module\Comment\View\new-comment', $data);
            $view = new ViewTemplate('..\Module\Comment\View\new-comment');
            return new Response($view, $data);
        } else {
            header("Location: /comment/login");
        }
    }
    function logout()
    {
        Session::destroy();
        header("Location: /comment/login");
    }
}
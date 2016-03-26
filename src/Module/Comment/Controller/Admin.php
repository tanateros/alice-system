<?php

namespace Module\Comment\Controller;

// use Module\Comment\Model\Comment as CommentModel;
use Core\Request as Request;
use Core\Response as Response;
use Core\Session as Session;

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
            header("Location: /admin");
        } else {
            return new Response('..\Module\Comment\View\login');
        }
    }
/*
    function admin()
    {
        if ($_SESSION['isAdmin']) {
            $modelComment = new CommentModel();
            $data = $modelComment->showAll(!isset($_GET['order']) ?: $_GET['order']);
            echo View::show('..\Module\Comment\View\admin-comments', $data);
        } else {
            header("Location: /login");
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
            $data = $modelComment->getId($id);
            echo View::show('..\Module\Comment\View\new-comment', $data);
        } else {
            header("Location: /login");
        }
    }
*/

    function logout()
    {
        Session::destroy();
        header("Location: /login");
    }
}
<?php

namespace Module\Dashboard\Controller;

use Module\Dashboard\Controller\Template as ViewTemplate;
use Core\Request;
use Core\Response;
use Core\Session;
use Core\Manager as EntityManager;
use Core\Application as Application;
use Module\Dashboard\Entity\Pages as PagesEntity;

/**
 * Class Admin
 * @package Dashboard
 */
class Admin
{
    /**
     * @var Request
     */
    private $request;
    /**
     * @var Response
     */
    private $response;
    /**
     * @var Session
     */
    private $session;
    /**
     * @var ViewTemplate
     */
    private $template;
    /**
     * @var array
     */
    private $data;

    function __construct()
    {
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->template = new ViewTemplate();

        if ($this->session->get('isAdmin') == 'admin') {
            $this->data['adminMenu'] = Menu::getStringMenu();
        } else {
            header("Location: /login");
        }
    }

    /**
     * @return string
     */
    function index()
    {
        if ($this->session->get('isAdmin') == 'admin' || $this->request->post('login') == 'admin' && $this->request->post('password') == '123') {
            $this->session->set('isAdmin', 'admin');
            $this->data['adminMenu'] = Menu::getStringMenu();
            return $this->response->setView('admin-page')->setData($this->data)->response($this->template);
        } else {
            return $this->response->setView('login')->setData($this->data)->response($this->template);
        }
    }

    /**
     * @return $this
     */
    function logout()
    {
        Session::destroy();
        return $this->response->setView('login')->setData($this->data)->response($this->template);
    }


    public function page()
    {
        if ($this->session->get('isAdmin') == 'admin') {
            $table = ucfirst(explode('/', substr($_SERVER['QUERY_STRING'], 6))[2]);

            $dbConnect = Application::$config['db'];
            $this->db = (new EntityManager($dbConnect))->getManager();
            $this->entity = 'Module\\Dashboard\\Entity\\'.$table;

            $fields = $this->db->getClassMetadata($this->entity)->getFieldNames(); // $data['arr_c']
            foreach($fields as $field) {
                $this->data['fields'][$field] = $this->db->getClassMetadata($this->entity)->getTypeOfField($field);
            }
            $this->data['rows'] = $this->db->getRepository($this->entity)->findAll(); // $data['arr_r']
            $this->data['table'] = strtolower($table);
            $this->data['title'] = $table;
            $this->data['arrTitleMenu'] = Application::$config['adminMenuTitle'];

            $this->response->setView('admin-page-list');
        } else {
            $this->response->setView('login');
        }
        return $this->response->setData($this->data)->response($this->template);
    }


    public function edit($table = '', $id = '')
    {
        if ($this->session->userdata('userId') == 'admin') {
            if ($table == 'menus') {
                $q_m_i = $this->db->query('select * from menu_icons');
                $data['menu_icons'] = $q_m_i->result_array();
            }

            $data['table'] = $table;

            $query = $this->db->query('show columns from `' . $table . '`');
            $data['arr_c'] = $query->result_array();

            $query = $this->db->where('id', (int)$id)->get($table);
            $data['arr_r'] = $query->result_array();

            $this->load->library('adminlayout');
            $this->adminlayout->content('admin_page_item', $data);

            if (isset($_POST['edit_item'])) {
                $update_mass = array();
                foreach ($_POST as $c => $k) {
                    if ($c != 'edit_item')
                        $update_mass[$c] = $k;
                }

                $this->db->where('id', $id)->update($table, $update_mass);
                redirect(base_url() . 'index.php/adminka/edit/' . $table . '/' . $id);
            }
        } else redirect(base_url() . 'index.php/adminka');
    }

    public function newitem($table = '')
    {
        if ($this->session->userdata('userId') == 'admin') {
            if ($table == 'menus') {
                $q_m_i = $this->db->query('select * from menu_icons');
                $data['menu_icons'] = $q_m_i->result_array();
            }

            $data['table'] = $table;

            $query = $this->db->query('show columns from `' . $table . '`');
            $data['arr_c'] = $query->result_array();

            $this->load->library('adminlayout');
            $this->adminlayout->content('admin_new_item', $data);

            if (isset($_POST['new_item'])) {
                $update_mass = array();
                foreach ($_POST as $c => $k) {
                    if ($c != 'new_item' && $c != 'id')
                        $update_mass[$c] = $k;
                }

                $this->db->insert($table, $update_mass);
                redirect(base_url() . 'index.php/adminka/page/' . $table);
            }
        } else redirect(base_url() . 'index.php/adminka');
    }
}
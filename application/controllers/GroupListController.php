<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GroupListController extends CI_Controller {

    /**
     * @var Groups_model
     */
    public $Model;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Groups_model','Model');
    }

    public function index()
    {
        $this->load->view('grouplist', $this->viewData);
    }

    public function get()
    {
        $res = [];

        $post = $this->input->post();

        $limit = ( isset($post['length']) ) ? $post['length'] : 10;
        $offset = ( isset($post['start']) ) ? $post['start'] : 0;

        $data = $this->Model->getDatatablesList($limit, $offset);

        $res['data'] = $data['data'];
        $res['recordsTotal'] = $data['foundRows'];
        $res['recordsFiltered'] = $data['foundRows'];

        echo json_encode($res);
    }
}
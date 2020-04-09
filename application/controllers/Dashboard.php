<?php
/**
 * Created by PhpStorm.
 * User: administrator
 * Date: 01/04/2020
 * Time: 11:20
 */

class Dashboard extends CI_Controller
{
    private $data;

    public function __construct()
    {
        parent::__construct();
    }


    function index()
    {
        $this->data['title'] = '';

        //table fields
        $this->data['fields'] = $this->form_model->find_table_columns('tb_form_12');

        //table data
        $this->model->set_table('tb_form_12');
        $this->data['entries'] = $this->model->order_by('submitted_at', 'DESC')->get_all();

        //render view
        $this->load->view('admin/header', $this->data);
        $this->load->view('admin/index');
        $this->load->view('admin/footer');
    }
}
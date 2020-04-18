<?php
/**
 * Created by PhpStorm.
 * User: administrator
 * Date: 31/03/2020
 * Time: 08:19
 */

class Home extends CI_Controller
{
    private $data;

    public function __construct()
    {
        parent::__construct();
        $this->load->library(['json_schema', 'db_exp']);
    }

    //render form
    function index()
    {
        $this->data['title'] = 'Form Rendering';

        //attachment
        $attachment_path = './assets/uploads/forms/definition/Traveller_Form.json'; //uploaded file

        $data = file_get_contents($attachment_path);
        $form = json_decode($data, true);

        $this->data['form'] = $form;


        //if post data
//        if (isset($_POST) && $_POST) {
//            $data['instance_id'] = ''; // todo: create automatically
//            $data = [];
//            foreach ($_POST as $key => $value) {
//                if (is_array($value)) {
//                    $arr = [];
//                    foreach ($value as $k => $v) {
//                        array_push($arr, $v);
//                    }
//                    $data[$key] = implode(',', $arr);
//                } else {
//                    $data[$key] = $value;
//                }
//            }
//
//            //insert data
//            $this->model->set_table('tb_' . $json_schema['meta']['form_id']);
//            if ($this->model->insert($data)) {
//                $this->session->set_flashdata(display_message('Your information registered'));
//            } else {
//                $this->session->set_flashdata(display_message('Failed to register information', 'danger'));
//            }
//            redirect(uri_string(), 'refresh');
//        }

        //render view
        $this->load->view('header', $this->data);
        $this->load->view('rendering');
        $this->load->view('footer');
    }
}
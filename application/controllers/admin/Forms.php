<?php
/**
 * Created by PhpStorm.
 * User: administrator
 * Date: 01/04/2020
 * Time: 14:07
 */

class Forms extends CI_Controller
{
    private $data;

    public function __construct()
    {
        parent::__construct();
        $this->load->library(['json_schema', 'db_exp']);
    }

    //form builder
    function builder()
    {
        $this->data['title'] = 'Form Builder';

        //render view
        $this->load->view('admin/header', $this->data);
        $this->load->view('admin/forms/builder');
    }

    //lists
    function lists()
    {
        $this->data['title'] = 'Forms';

        //render view
        $this->load->view('admin/header', $this->data);
        $this->load->view('admin/forms/lists');
        $this->load->view('admin/footer');
    }

    //upload
    function upload()
    {
        $this->data['title'] = 'Upload Form';

        //render view
        $this->load->view('admin/header', $this->data);
        $this->load->view('admin/forms/upload');
        $this->load->view('admin/footer');
    }


    //todo: call this once =>create
    function create()
    {
        $post_data = $this->load_json_schema();

        if (isset($post_data['meta']) && $post_data['meta']) {
            $data = [
                'name' => $post_data['meta']['name'],
                'form_id' => $post_data['meta']['form_id'],
                'description' => $post_data['meta']['description'],
                'version' => $post_data['meta']['version'],
                'created_by' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ];

            if ($id = $this->form_model->insert($data)) {
                //create a table here
                $create_statement = $this->db_exp->create_table_sql_query($post_data['meta']['form_id'], $post_data['data']);
                $this->form_model->create_table($create_statement);
            }
        }
    }

    //load json schema
    function load_json_schema()
    {
        $form = array(
            'meta' => array(),
            'data' => array(),
            'bind' => array(),
            'translations' => array(),
        );

        $trs = array();
        $meta = array(
            'name' => 'Sample Name',
            'form_id' => 'form_12',
            'description' => 'Description of the form',
            'version' => '1.1',
            'language' => 'en',

        );
        $form['meta'] = $meta;


        $tmp = array(
            'id' => 0,
            'type' => 'Group',
            'data_name' => 'general',
            'label' => 'General',
            'child' => array()
        );
        $tmp_child = array(
            'id' => 1,
            'order' => 0,
            'type' => 'number',
            'data_name' => 'age',
            'label' => 'Age',
            'hint' => 'Please write your age'
        );
        $tmp['child'][1] = $tmp_child;
        $trs['sw'][1]['label'] = 'Umri';
        $trs['sw'][1]['hint'] = 'Tafadhali andika umri wako';

        $tmp_child = array(
            'id' => 7,
            'order' => 0,
            'type' => 'location',
            'data_name' => 'location',
            'label' => 'GPS Location',
            'hint' => 'Please click to get location'
        );
        $tmp['child'][7] = $tmp_child;
        $trs['sw'][7]['label'] = 'GPS';
        $trs['sw'][7]['hint'] = 'Bonyeza kupata GPS';

        $tmp_child = array(
            'id' => 2,
            'order' => 0,
            'type' => 'text',
            'data_name' => 'Name',
            'label' => 'Full Name',
            'hint' => 'Some Kind of Hint for full name'
        );
        $tmp['child'][2] = $tmp_child;
        $trs['sw'][2]['label'] = 'Jina Kamili';
        $trs['sw'][2]['hint'] = 'Tafadhali andika Jina Kamili';
        $form['data'][0] = $tmp;

        $tmp = array(
            'id' => 3,
            'type' => 'Group',
            'data_name' => 'details',
            'label' => 'Details',
            'child' => array()
        );
        $tmp_child = array(
            'id' => 4,
            'order' => 0,
            'type' => 'select1',
            'data_name' => 'sex',
            'label' => 'Sex',
            'options' => array(
                'M' => 'Male',
                'F' => 'Female'
            ),
            'hint' => 'Some Kind of Hint'
        );
        $tmp['child'][4] = $tmp_child;
        $trs['sw'][4]['label'] = 'Jinsia';
        $trs['sw'][4]['hint'] = 'Tafadhali chagua jinsia';
        $trs['sw'][4]['options']['M'] = 'Mwanaume';
        $trs['sw'][4]['options']['F'] = 'Mwanamke';

        $tmp_child = array(
            'id' => 6,
            'order' => 0,
            'type' => 'textarea',
            'data_name' => 'address',
            'label' => 'Address',
            'hint' => 'Some Kind of Hint'
        );
        $tmp['child'][6] = $tmp_child;
        $trs['sw'][6]['label'] = 'Anuani';
        $trs['sw'][6]['hint'] = 'Tafadhali andika anuani';

        $tmp_child = array(
            'id' => 5,
            'order' => 0,
            'type' => 'select',
            'data_name' => 'symptoms',
            'label' => 'Symptoms',
            'options' => array(
                'fever' => 'Feaver',
                'vomitting' => 'Vomitting',
                'skin_rash' => 'Skin Rash',
                'dead' => 'Dead',
            ),
            'hint' => 'Please select all symptoms that apply'
        );
        $tmp['child'][5] = $tmp_child;
        $trs['sw'][5]['label'] = 'Dalili';
        $trs['sw'][5]['hint'] = 'Naomba chagua Dalili zote unazyoziona';
        $trs['sw'][5]['options']['fever'] = 'Homa';
        $trs['sw'][5]['options']['vomitting'] = 'Kutapika';
        $trs['sw'][5]['options']['skin_rash'] = 'Vipele';
        $trs['sw'][5]['options']['dead'] = 'kufariki';
        $form['data'][3] = $tmp;

        $form['translations'] = $trs;

        return $form;
    }
}
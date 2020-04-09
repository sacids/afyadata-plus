<?php
/**
 * Created by PhpStorm.
 * User: administrator
 * Date: 01/04/2020
 * Time: 11:43
 */

class Entries extends CI_Controller
{
    private $data;

    public function __construct()
    {
        parent::__construct();
        $this->load->library(['json_schema', 'db_exp']);
    }

    //lists
    function lists()
    {
        //title
        $this->data['title'] = 'PoE Entries';

        //table data
        $this->model->set_table('poe_entries');
        $this->data['entries'] = $this->model->order_by('created_at', 'DESC')->get_all();

        //render view
        $this->load->view('admin/header', $this->data);
        $this->load->view('admin/entries/lists');
        $this->load->view('admin/footer');
    }

    //edit temperature
    function edit_temp($id)
    {
        //title
        $this->data['title'] = 'Information';

        $this->model->set_table('poe_entries');
        $entry = $this->model->get($id);

        if (!$entry)
            show_error('Entry not found');

        $this->data['entry'] = $entry;

        if ($entry->symptoms) {
            $symptoms = [];
            $arr = explode(',', $entry->symptoms);
            foreach ($arr as $symptom) {
                $val = $this->symptom_model->get($symptom);
                array_push($symptoms, $val->name);
            }
            $this->data['symptoms'] = join(', ', $symptoms);
        } else {
            $this->data['symptoms'] = '';
        }

        //form validation
        //$this->form_validation->set_rules('temperature', 'Temperature', 'required');

        if ($this->form_validation->run() === TRUE) {
            $data = ['temperature' => $this->input->post('temperature')];

            $this->model->set_table('poe_entries');
            if ($this->model->update($id, $data)) {
                $this->session->set_flashdata('message', display_message('Temperature recorded'));
            } else {
                $this->session->set_flashdata('message', display_message('Failed to record temperature', 'danger'));
            }
            redirect(uri_string(), 'refresh');
        }

        //populate data
        $this->data['temperature'] = array(
            'name' => 'temperature',
            'id' => 'temperature',
            'type' => 'hidden',
            'value' => $this->form_validation->set_value('temperature'),
            'class' => 'form-control',
            'placeholder' => 'Record temperature...'
        );

        //render view
        $this->load->view('admin/header', $this->data);
        $this->load->view('admin/entries/edit_temp');
        $this->load->view('admin/footer');
    }
}
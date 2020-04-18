<?php
/**
 * Created by PhpStorm.
 * User: administrator
 * Date: 01/04/2020
 * Time: 11:43
 */

class Entries extends MX_Controller
{
    private $data;

    public function __construct()
    {
        parent::__construct();
        $this->load->library(['json_schema', 'db_exp']);
    }

    //default page
    function index()
    {
        $this->data['title'] = 'Point of Entry Registration';

        //form validation
        $this->form_validation->set_rules('name', 'Full name', 'required');
        $this->form_validation->set_rules('age', 'Age', 'required');
        $this->form_validation->set_rules('sex', 'Sex', 'required');
        $this->form_validation->set_rules('nationality', 'Nationality', 'required');
        $this->form_validation->set_rules('passport_number', 'Passport No', 'required');
        $this->form_validation->set_rules('flight', 'Vessel/Flight/Vehicle Name/No', 'required');
        $this->form_validation->set_rules('arrival_date', 'Arrival Date', 'required');
        $this->form_validation->set_rules('point_of_entry', 'Point of Entry', 'required');
        $this->form_validation->set_rules('seat_no', 'Seat No', 'required');
        $this->form_validation->set_rules('visiting_purpose', 'Purpose of visit', 'required');
        $this->form_validation->set_rules('duration_stay', 'Duration of Stay', 'required');
        $this->form_validation->set_rules('employment', 'Employment/Work', 'required');

        //success form validation
        if ($this->form_validation->run($this) === TRUE) {
            //symptoms
            $symptoms = [];
            if ($_POST['symptoms']) {
                foreach ($_POST['symptoms'] as $symptom) {
                    array_push($symptoms, $symptom);
                }
            }

            //data
            $data = array(
                'name' => $this->input->post('name'),
                'age' => $this->input->post('age'),
                'sex' => $this->input->post('sex'),
                'nationality' => $this->input->post('nationality'),
                'passport_number' => $this->input->post('passport_number'),
                'flight' => $this->input->post('flight'),
                'arrival_date' => $this->input->post('arrival_date'),
                'point_of_entry' => $this->input->post('point_of_entry'),
                'seat_no' => $this->input->post('seat_no'),
                'visiting_purpose' => $this->input->post('visiting_purpose'),
                'duration_stay' => $this->input->post('duration_stay'),
                'employment' => $this->input->post('employment'),
                'address' => $this->input->post('address'),
                'hotel' => $this->input->post('hotel'),
                'street' => $this->input->post('street'),
                'mobile' => $this->input->post('mobile'),
                'email' => $this->input->post('email'),
                'country_origin' => $this->input->post('country_origin'),
                'visited_area' => $this->input->post('visited_area'),
                'taken_care_sick_person' => $this->input->post('taken_care_sick_person'),
                'participated_in_burial' => $this->input->post('participated_in_burial'),
                'symptoms' => join(',', $symptoms),
                'other_symptoms' => $this->input->post('other_symptoms'),
                'created_at' => date('Y-m-d H:i:s')
            );

            if ($id = $this->poe_entry_model->insert($data)) {
                //todo: countries visited within 24 hours


                $this->session->set_flashdata('message', display_message('Your information registered'));
            } else {
                $this->session->set_flashdata('message', display_message('Failed to register information', 'danger'));
            }
            redirect(uri_string());
        }

        //populate data
        //step 1
        $this->data['name'] = array(
            'name' => 'name',
            'id' => 'name',
            'type' => 'text',
            'value' => $this->form_validation->set_value('name'),
            'class' => 'form-control',
            'placeholder' => 'Write full name...'
        );

        $this->data['age'] = array(
            'name' => 'age',
            'id' => 'age',
            'type' => 'number',
            'value' => $this->form_validation->set_value('age'),
            'class' => 'form-control',
            'placeholder' => 'Write age...'
        );

        $this->data['nationality'] = array(
            'name' => 'nationality',
            'id' => 'text',
            'type' => 'nationality',
            'value' => $this->form_validation->set_value('nationality'),
            'class' => 'form-control',
            'placeholder' => 'Write nationality...'
        );

        $this->data['passport_number'] = array(
            'name' => 'passport_number',
            'id' => 'text',
            'type' => 'passport_number',
            'value' => $this->form_validation->set_value('age'),
            'class' => 'form-control',
            'placeholder' => 'Write passport number...'
        );

        $this->data['flight'] = array(
            'name' => 'flight',
            'id' => 'text',
            'type' => 'vessel',
            'value' => $this->form_validation->set_value('flight'),
            'class' => 'form-control',
            'placeholder' => 'Write vessel/flight/vehicle Name/No...'
        );

        $this->data['arrival_date'] = array(
            'name' => 'arrival_date',
            'id' => 'arrival_date',
            'type' => 'date',
            'value' => $this->form_validation->set_value('arrival_date'),
            'class' => 'form-control',
            'placeholder' => 'Write arrival date...'
        );

        $this->data['point_of_entry'] = array(
            'name' => 'point_of_entry',
            'id' => 'point_of_entry',
            'type' => 'text',
            'value' => $this->form_validation->set_value('point_of_entry'),
            'class' => 'form-control',
            'placeholder' => 'Write point of entry...'
        );

        $this->data['seat_no'] = array(
            'name' => 'seat_no',
            'id' => 'seat_no',
            'type' => 'text',
            'value' => $this->form_validation->set_value('point_of_entry'),
            'class' => 'form-control',
            'placeholder' => 'Write seat No...'
        );

        //step 2
        $this->data['visiting_purpose'] = array(
            'name' => 'visiting_purpose',
            'id' => 'visiting_purpose',
            'type' => 'text',
            'value' => $this->form_validation->set_value('visiting_purpose'),
            'class' => 'form-control',
            'placeholder' => 'Write purpose of visit...'
        );

        $this->data['duration_stay'] = array(
            'name' => 'duration_stay',
            'id' => 'duration_stay',
            'type' => 'number',
            'value' => $this->form_validation->set_value('duration_stay'),
            'class' => 'form-control',
            'placeholder' => 'Write duration of stay...'
        );

        $this->data['employment'] = array(
            'name' => 'employment',
            'id' => 'employment',
            'type' => 'text',
            'value' => $this->form_validation->set_value('employment'),
            'class' => 'form-control',
            'placeholder' => 'Write employment...'
        );

        $this->data['address'] = array(
            'name' => 'address',
            'id' => 'address',
            'type' => 'text',
            'value' => $this->form_validation->set_value('address'),
            'class' => 'form-control',
            'placeholder' => 'Write physical address...'
        );

        $this->data['hotel'] = array(
            'name' => 'hotel',
            'id' => 'hotel',
            'type' => 'text',
            'value' => $this->form_validation->set_value('hotel'),
            'class' => 'form-control',
            'placeholder' => 'Write hotel name...'
        );

        //step 4
        $this->data['street'] = array(
            'name' => 'street',
            'id' => 'street',
            'type' => 'text',
            'value' => $this->form_validation->set_value('street'),
            'class' => 'form-control',
            'placeholder' => 'Write street/ward/district...'
        );

        $this->data['mobile'] = array(
            'name' => 'mobile',
            'id' => 'mobile',
            'type' => 'text',
            'value' => $this->form_validation->set_value('mobile'),
            'class' => 'form-control',
            'placeholder' => 'Write mobile number...'
        );

        $this->data['email'] = array(
            'name' => 'email',
            'id' => 'email',
            'type' => 'text',
            'value' => $this->form_validation->set_value('email'),
            'class' => 'form-control',
            'placeholder' => 'Write email...'
        );

        $this->data['country_origin'] = array(
            'name' => 'country_origin',
            'id' => 'country_origin',
            'type' => 'text',
            'value' => $this->form_validation->set_value('country_origin'),
            'class' => 'form-control',
            'placeholder' => 'Write country journey started...'
        );

        $this->data['symptoms'] = $this->symptom_model->get_all();

        //render view
        $this->load->view('header', $this->data);
        $this->load->view('index');
        $this->load->view('footer');
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
        $this->load->view('entries/lists');
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
        $this->load->view('entries/edit_temp');
        $this->load->view('admin/footer');
    }

    //record temp
    function record_temp()
    {
        $id = $_POST['entry_id'];
        $temp = $_POST['temp'];

        if (!empty($temp)) {
            $data = ['temperature' => $temp];

            //update temp
            $this->poe_entry_model->update($id, $data);

            $array = ['status' => 'success', 'message' => 'Temperature recorded'];
        } else {
            $array = ['status' => 'failed', 'message' => 'Failed to record temperature'];
        }
        echo json_encode($array);
    }
}
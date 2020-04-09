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

    //default page
    function index()
    {
        $this->data['title'] = 'Point of Entry Registration';

        //form validation

        //success form validation
        if (isset($_POST) && $_POST) {
            unset($_POST['submit']);
            $data = [];
            foreach ($_POST as $key => $value) {
                if (is_array($value)) {
                    $arr = [];
                    foreach ($value as $k => $v) {
                        array_push($arr, $v);
                    }
                    $data[$key] = implode(',', $arr);
                } else {
                    $data[$key] = $value;
                }
            }
            $data['created_at'] = date('Y-m-d H:i:s');

            echo "<pre>";
            print_r($data);

            //insert data
//            $this->model->set_table('poe_entries');
//            if ($this->model->insert($data)) {
//                $this->session->set_flashdata('message', display_message('Your information registered'));
//            } else {
//                $this->session->set_flashdata('message', display_message('Failed to register information', 'danger'));
//            }
//            redirect('');
        }

        //populate data
        //step 1
        $this->data['surname'] = array(
            'name' => 'surname',
            'id' => 'surname',
            'type' => 'text',
            'value' => $this->form_validation->set_value('surname'),
            'class' => 'form-control',
            'placeholder' => 'Write surname...'
        );

        $this->data['other_names'] = array(
            'name' => 'other_names',
            'id' => 'other_names',
            'type' => 'text',
            'value' => $this->form_validation->set_value('other_names'),
            'class' => 'form-control',
            'placeholder' => 'Write other names...'
        );

        $this->data['age'] = array(
            'name' => 'age',
            'id' => 'age',
            'type' => 'number',
            'value' => $this->form_validation->set_value('age'),
            'class' => 'form-control',
            'placeholder' => 'Write age...'
        );

        $this->data['passport_number'] = array(
            'name' => 'passport_number',
            'id' => 'text',
            'type' => 'passport_number',
            'value' => $this->form_validation->set_value('age'),
            'class' => 'form-control',
            'placeholder' => 'Write passport number...'
        );

        $this->data['passport_country'] = array(
            'name' => 'passport_country',
            'id' => 'text',
            'type' => 'passport_country',
            'value' => $this->form_validation->set_value('passport_country'),
            'class' => 'form-control',
            'placeholder' => 'Write passport country...'
        );

        $this->data['emergency_contact'] = array(
            'name' => 'emergency_contact',
            'id' => 'emergency_contact',
            'type' => 'text',
            'value' => $this->form_validation->set_value('emergency_contact'),
            'class' => 'form-control',
            'placeholder' => 'Write emergency contact...'
        );

        //step 2
        $this->data['village'] = array(
            'name' => 'village',
            'id' => 'village',
            'type' => 'text',
            'value' => $this->form_validation->set_value('village'),
            'class' => 'form-control',
            'placeholder' => 'Write village...'
        );

        $this->data['district'] = array(
            'name' => 'district',
            'id' => 'district',
            'type' => 'text',
            'value' => $this->form_validation->set_value('district'),
            'class' => 'form-control',
            'placeholder' => 'Write district...'
        );

        $this->data['region'] = array(
            'name' => 'region',
            'id' => 'region',
            'type' => 'text',
            'value' => $this->form_validation->set_value('region'),
            'class' => 'form-control',
            'placeholder' => 'Write province or region...'
        );

        $this->data['from_date'] = array(
            'name' => 'from_date',
            'id' => 'from_date',
            'type' => 'date',
            'value' => $this->form_validation->set_value('from_date'),
            'class' => 'form-control',
            'placeholder' => 'Write start date of ill...'
        );

        $this->data['to_date'] = array(
            'name' => 'to_date',
            'id' => 'to_date',
            'type' => 'date',
            'value' => $this->form_validation->set_value('to_date'),
            'class' => 'form-control',
            'placeholder' => 'Write to date of ill...'
        );

        //step 4
        $this->data['hospital_name'] = array(
            'name' => 'hospital_name',
            'id' => 'hospital_name',
            'type' => 'text',
            'value' => $this->form_validation->set_value('hospital_name'),
            'class' => 'form-control',
            'placeholder' => 'Please provide name of hospital or clinic...'
        );

        $this->data['hospitalization_reason'] = array(
            'name' => 'hospitalization_reason',
            'id' => 'hospitalization_reason',
            'type' => 'text area',
            'rows' => 3,
            'value' => $this->form_validation->set_value('hospitalization_reason'),
            'class' => 'form-control',
            'placeholder' => 'Please provide reason for hospitalization or visit...'
        );

        $this->data['exposure_date'] = array(
            'name' => 'exposure_date',
            'id' => 'exposure_date',
            'type' => 'date',
            'value' => $this->form_validation->set_value('exposure_date'),
            'class' => 'form-control',
            'placeholder' => 'Write exposure date...'
        );

        $this->data['unexplained_bleeding'] = array(
            'name' => 'unexplained_bleeding',
            'id' => 'unexplained_bleeding',
            'type' => 'text',
            'value' => $this->form_validation->set_value('unexplained_bleeding'),
            'class' => 'form-control',
            'placeholder' => 'Write here...'
        );

        $this->data['unexplained_bleeding'] = array(
            'name' => 'unexplained_bleeding',
            'id' => 'unexplained_bleeding',
            'type' => 'text',
            'value' => $this->form_validation->set_value('unexplained_bleeding'),
            'class' => 'form-control',
            'placeholder' => 'Write here...'
        );

        $this->data['hemorrhagic_symptoms'] = array(
            'name' => 'hemorrhagic_symptoms',
            'id' => 'hemorrhagic_symptoms',
            'type' => 'text',
            'value' => $this->form_validation->set_value('hemorrhagic_symptoms'),
            'class' => 'form-control',
            'placeholder' => 'Write here...'
        );

        $this->data['non_hemorrhagic_symptoms'] = array(
            'name' => 'non_hemorrhagic_symptoms',
            'id' => 'non_hemorrhagic_symptoms',
            'type' => 'text',
            'value' => $this->form_validation->set_value('non_hemorrhagic_symptoms'),
            'class' => 'form-control',
            'placeholder' => 'Write here...'
        );

        $this->data['symptoms'] = $this->symptom_model->get_all();

        //render view
        $this->load->view('header', $this->data);
        $this->load->view('index');
        $this->load->view('footer');
    }

    //render form
    function rendering()
    {
        $this->data['title'] = 'COVID-19';

        //form attributes
        $json_schema = $this->load_json_schema();
        $this->data['form'] = $json_schema;

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

    //load json schema
    function load_json_schema()
    {
        $json = '{
    "meta": {
        "form_id": "Form_id",
        "name": "Form_Name",
        "version": "1.1",
        "language": "en"
    },
    "data": {
        "1": {
            "type": "page",
            "data_name": "Traveller_info",
            "label": "Traveller Information",
            "hint": "",
            "repeat": "0",
            "relevance": "",
            "constraints": "",
            "id": "1",
            "child": {
                "2": {
                    "type": "text",
                    "data_name": "name",
                    "label": "Name",
                    "hint": "Three names",
                    "required": "0",
                    "relevance": "",
                    "constraints": "",
                    "id": "2"
                },
                "3": {
                    "type": "number",
                    "data_name": "age",
                    "label": "Age",
                    "hint": "",
                    "required": "0",
                    "relevance": "",
                    "constraints": "",
                    "id": "3"
                },
                "4": {
                    "type": "select1",
                    "data_name": "sex",
                    "label": "Sex",
                    "hint": "",
                    "required": "0",
                    "relevance": "",
                    "constraints": "",
                    "options": [
                        {
                            "key": "Male",
                            "val": "m"
                        },
                        {
                            "key": "Female",
                            "val": "F"
                        }
                    ],
                    "id": "4"
                },
                "5": {
                    "type": "select1",
                    "data_name": "nationality",
                    "label": "Nationality",
                    "hint": "",
                    "required": "0",
                    "relevance": "",
                    "constraints": "",
                    "options": [
                        {
                            "key": "Tanzania",
                            "val": "tanzania"
                        },
                        {
                            "key": "Kenya",
                            "val": "kenya"
                        }
                    ],
                    "id": "5"
                },
                "6": {
                    "type": "text",
                    "data_name": "passport_no",
                    "label": "Passport Number",
                    "hint": "",
                    "required": "0",
                    "relevance": "",
                    "constraints": "",
                    "id": "6"
                },
                "7": {
                    "type": "text",
                    "data_name": "flight_no",
                    "label": "Vessel/Flight/Vehicle Name/No",
                    "hint": "",
                    "required": "0",
                    "relevance": "",
                    "constraints": "",
                    "id": "7"
                }
            }
        },
        "12": {
            "type": "page",
            "data_name": "element_12",
            "label": "New Page",
            "hint": "",
            "repeat": "",
            "relevance": "",
            "constraints": "",
            "options": "",
            "id": "12",
            "child": {
                "13": {
                    "type": "date",
                    "data_name": "arrival_date",
                    "label": "Arrival Date",
                    "hint": "",
                    "required": "0",
                    "relevance": "",
                    "constraints": "",
                    "id": "13"
                },
                "14": {
                    "type": "text",
                    "data_name": "work",
                    "label": "Employment/work",
                    "hint": "",
                    "required": "0",
                    "relevance": "",
                    "constraints": "",
                    "id": "14"
                }
            }
        },
        "15": {
            "type": "page",
            "data_name": "contact_tz",
            "label": "Contact While in Tanzania",
            "hint": "",
            "repeat": "0",
            "relevance": "",
            "constraints": "",
            "id": "15",
            "child": {
                "16": {
                    "type": "email",
                    "data_name": "email",
                    "label": "Email",
                    "hint": "",
                    "required": "0",
                    "relevance": "",
                    "constraints": "",
                    "id": "16"
                },
                "17": {
                    "type": "number",
                    "data_name": "Phone_no",
                    "label": "Phone Number",
                    "hint": "",
                    "required": "0",
                    "relevance": "",
                    "constraints": "",
                    "id": "17"
                }
            }
        },
        "18": {
            "type": "page",
            "data_name": "past_countries_visited",
            "label": "For the past 21 days (3 weeks) which countries have you visited?",
            "hint": "",
            "repeat": "1",
            "relevance": "",
            "constraints": "",
            "id": "18",
            "child": {
                "19": {
                    "type": "select1",
                    "data_name": "Country",
                    "label": "Country",
                    "hint": "",
                    "required": "0",
                    "relevance": "",
                    "constraints": "",
                    "options": [
                        {
                            "key": "Tanzania",
                            "val": "tanzania"
                        },
                        {
                            "key": "Kenya",
                            "val": "kenya"
                        },
                        {
                            "key": "Rwanda",
                            "val": "rwanda"
                        }
                    ],
                    "id": "19"
                },
                "20": {
                    "type": "text",
                    "data_name": "Location",
                    "label": "Location visited/Province",
                    "hint": "",
                    "required": "0",
                    "relevance": "",
                    "constraints": "",
                    "id": "20"
                },
                "21": {
                    "type": "date",
                    "data_name": "date",
                    "label": "Date",
                    "hint": "",
                    "required": "0",
                    "relevance": "",
                    "constraints": "",
                    "id": "21"
                },
                "22": {
                    "type": "number",
                    "data_name": "number_days",
                    "label": "Number of days",
                    "hint": "",
                    "required": "0",
                    "relevance": "",
                    "constraints": "",
                    "id": "22"
                }
            }
        },
        "23": {
            "type": "page",
            "data_name": "clinical_signs",
            "label": "Clinical Signs",
            "hint": "",
            "repeat": "0",
            "relevance": "",
            "constraints": "",
            "id": "23",
            "child": {
                "24": {
                    "type": "select",
                    "data_name": "signs",
                    "label": "Do you have the following conditions or experienced them during the last 7 days (1 weeks)? ",
                    "hint": "",
                    "required": "0",
                    "relevance": "",
                    "constraints": "",
                    "options": [
                        {
                            "key": "Fever",
                            "val": "Fever"
                        },
                        {
                            "key": "Swollen glands",
                            "val": "Swollen_glands"
                        },
                        {
                            "key": "Headache",
                            "val": "Headache"
                        },
                        {
                            "key": "Coughing/Shortness breathing ",
                            "val": "Coughing_Shortness_breathing "
                        }
                    ],
                    "id": "24"
                }
            }
        }
    }
}';

        return json_decode($json, true);
    }
}
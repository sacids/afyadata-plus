<?php
/**
 * Created by PhpStorm.
 * User: administrator
 * Date: 01/04/2020
 * Time: 14:07
 */

class Forms extends MX_Controller
{
    private $data;

    public function __construct()
    {
        parent::__construct();
        $this->load->library(['json_schema', 'db_exp', 'upload']);
    }

    //lists
    function lists()
    {
        $this->data['title'] = 'Forms';

        $forms = $this->form_model->get_all();
        $this->data['forms'] = $forms;

        //render view
        $this->load->view('admin/header', $this->data);
        $this->load->view('forms/lists');
        $this->load->view('admin/footer');
    }

    //upload
    function upload()
    {
        $this->data['title'] = 'Upload Form';

        //form validation
        $this->form_validation->set_rules('name', 'Form Name', 'required|trim');
        $this->form_validation->set_rules('description', 'Form description', 'trim');
        $this->form_validation->set_rules('attachment', 'JSON File', 'callback_upload_json_file|trim');

        if ($this->form_validation->run($this) === TRUE) {
            $form_name = $this->input->post('name');
            $description = $this->input->post('description');

            $attachment_path = './assets/uploads/forms/definition/' . $_POST['attachment']; //uploaded file

            $data = file_get_contents($attachment_path);
            $data = json_decode($data, true);

            echo "<pre>";
            print_r($data);
            exit();
        }

        //populate data
        $this->data['name'] = array(
            'name' => 'name',
            'id' => 'name',
            'type' => 'text',
            'value' => $this->form_validation->set_value('name'),
            'class' => 'form-control',
            'placeholder' => 'Write form name...'
        );

        $this->data['description'] = array(
            'name' => 'description',
            'id' => 'description',
            'type' => 'text area',
            'rows' => 3,
            'value' => $this->form_validation->set_value('description'),
            'class' => 'form-control',
            'placeholder' => 'Write form description...'
        );

        $this->data['attachment'] = array(
            'name' => 'attachment',
            'id' => 'attachment',
            'type' => 'file',
            'class' => 'form-control'
        );

        //render view
        $this->load->view('admin/header', $this->data);
        $this->load->view('forms/upload');
        $this->load->view('admin/footer');
    }


    //form builder
    function builder()
    {
        $this->data['title'] = 'Form Builder';

        //render view
        $this->load->view('admin/header', $this->data);
        $this->load->view('forms/builder');
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

    /*=================================================
      Callback Functions
      ================================================*/
    //function to upload json file
    function upload_json_file()
    {
        $config['upload_path'] = './assets/uploads/forms/definition/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '200000';
        $config['overwrite'] = TRUE;
        $config['remove_spaces'] = TRUE;

        //initialize config
        $this->upload->initialize($config);

        if (isset($_FILES['attachment']) && !empty($_FILES['attachment']['name'])) {
            if ($this->upload->do_upload('attachment')) {
                // set a $_POST value for 'image' that we can use later
                $upload_data = $this->upload->data();

                //POST variables
                $_POST['attachment'] = $upload_data['file_name'];

                return TRUE;
            } else {
                // possibly do some clean up ... then throw an error
                $this->form_validation->set_message('upload_json_file', $this->upload->display_errors());
                return FALSE;
            }
        } else {
            // throw an error because nothing was uploaded
            $this->form_validation->set_message('upload_json_file', "Please, attach json file");
            return FALSE;
        }
    }
}
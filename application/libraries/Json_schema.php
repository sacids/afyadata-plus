<?php
/**
 * Created by PhpStorm.
 * User: administrator
 * Date: 31/03/2020
 * Time: 10:53
 */

class Json_schema
{
    private $_ci;

    function __construct()
    {
        $this->ci = &get_instance();
        log_message('debug', 'Json schema class Initialized');
    }

    //iterate form
    function iterate_form($branch)
    {
        foreach ($branch as $key => $element) {
            $this->display_element($element);
        }
    }


    //display elements
    function display_element($element)
    {
        foreach ($element as $key => $value) {
            $key = ($key == 'data_name' ? 'name' : $key);
            $key = ($key == 'datetime' ? 'datetime-local' : $key);

            ${$key} = $value;
        }

        $multiple = '';

        switch (strtoupper($type)) {
            case 'PAGE':
                echo "<div class='tab'>";
                echo "<div class='row'>";
                echo "<div class='col-md-12'>";
                echo "<h5 class='title'>" . $label . "</h5>";
                $branch = $element['child'];
                $this->iterate_form($branch);
                echo "</div>"; //col-md-12
                echo "</div>"; //row
                echo "</div>"; //tab
                break;
            case 'NUMBER':
            case 'TEXT':
            case 'DATE':
            case 'DATETIME-LOCAL':
            case 'COLOR':
            case 'FILE':
            case 'TIME':
            case 'URL':
            case 'EMAIL':
                $tmp = array(
                    'name' => $name,
                    'value' => '',
                    'type' => $type,
                    'id' => $id,
                    'class' => 'form-control',
                    'placeholder' => $hint,
                );
                echo "<div class='row'>";
                echo "<div class='col-md-12'>";
                echo "<div class='form-group'>";
                echo "<label>$label</label>";
                echo form_input($tmp);
                echo "</div>"; //form-group
                echo "</div>"; //col-md-12
                echo "</div>"; //row
                break;
            case 'SELECT':
                echo "<div class='row'>";
                echo "<div class='col-md-12'>";
                echo "<div class='form-group'>";
                echo "<label>$label</label>";
                foreach ($element['options'] as $option) {
                    echo '<br/>';
                    echo form_checkbox($name . '[]', $option['key'], '', ['id' => $name . "_" . $option['key'], 'class' => '']);
                    echo '&nbsp;&nbsp;<label>' . $option['val'] . '</label>';
                }
                echo "</div>"; //form-group
                echo "</div>"; //col-md-12
                echo "</div>"; //row
                break;
            case 'SELECT1':
                echo "<div class='row'>";
                echo "<div class='col-md-12'>";
                echo "<div class='form-group'>";
                echo "<label>$label</label>";
                $select_option = [];
                foreach ($element['options'] as $key => $value) {
                    $select_option[$value['key']] = $value['val'];
                }
                $select_option = ['' => 'Select'] + $select_option;
                echo form_dropdown($name . '[]', $select_option, set_value($name . '[]'), ['class' => 'form-control', 'id' => $name]);
                echo "</div>"; //form-group
                echo "</div>"; //col-md-12
                echo "</div>"; //row
                break;
            case 'TEXTAREA':
                echo "<div class='row'>";
                echo "<div class='col-md-12'>";
                echo "<div class='form-group'>";
                echo "<label>$label</label>";
                echo form_textarea($name, '', ['id' => $id, 'class' => 'form-control', 'rows' => 3]);
                echo "</div>"; //form-group
                echo "</div>"; //col-md-12
                echo "</div>"; //row
                break;
            case 'LOCATION':
                echo "<div class='row'>";
                echo "<div class='col-md-12'>";
                echo "<div class='form-group'>";
                echo "<label>$label</label>";
                echo "<div id='$id'></div>";
                echo "<input type='hidden' name='$name' value='' id='hidden_$id'>";
                echo "<button type='button' class='btn btn-outline-primary btn-xs' onclick='showPosition($id);'>$label</button>";
                echo "</div>"; //form-group
                echo "</div>"; //col-md-12
                echo "</div>"; //row
                break;
        }
    }
}
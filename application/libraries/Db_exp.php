<?php
/**
 * Created by PhpStorm.
 * User: administrator
 * Date: 01/04/2020
 * Time: 14:03
 */

class Db_exp
{
    private $_ci;

    function __construct()
    {
        $this->ci = &get_instance();
        log_message('debug', 'Db_exp class Initialized');
    }

    //create table string
    public function create_table_sql_query($tbl_name, $element)
    {
        $tbl_name = 'tb_' . $tbl_name;
        // initiate statement, set id as primary key, autoincrement
        $statement = "CREATE TABLE $tbl_name ( id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY ";

        $required = '';
        foreach ($element as $key => $value) {
            if (strtoupper($value['type']) == 'PAGE') {
                foreach ($value['child'] as $v) {
                    $col_name = $v['data_name'];
                    $type = strtoupper($v['type']);

                    if ($type == 'STRING' || $type == 'BINARY' || $type == 'BARCODE') {
                        $statement .= ", $col_name VARCHAR(300)";
                    }

                    if ($type == 'SELECT1') {
                        $statement .= ", $col_name  VARCHAR(300)";
                    }

                    if ($type == 'SELECT') {
                        $statement .= ", $col_name TEXT $required ";
                    }

                    if ($type == 'TEXT' || $type == 'TEXTAREA') {
                        $statement .= ", $col_name TEXT $required ";
                    }

                    if ($type == 'DATE') {
                        $statement .= ", $col_name DATE $required ";
                    }

                    if ($type == 'DATETIME') {
                        $statement .= ", $col_name datetime $required";
                    }

                    if ($type == 'TIME') {
                        $statement .= ", $col_name TIME $required";
                    }

                    if ($type == 'INT' || $type == 'NUMBER') {
                        $statement .= ", $col_name INT(20) $required ";
                    }

                    if ($type == 'DECIMAL') {
                        $statement .= ", $col_name DECIMAL $required ";
                    }

                    if ($type == 'LOCATION' || $type == 'GEOPOINT') {
                        $statement .= "," . $col_name . " VARCHAR(150) $required ";
                    }
                    $statement .= "\n";
                }

            }
        }

        $statement .= "," . "submitted_at DATETIME DEFAULT CURRENT_TIMESTAMP";
        $statement .= ")";
        return $statement;
    }
}
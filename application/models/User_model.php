<?php
class User_model extends CI_model{

var $last_id = -1;

 public function __construct() {
        $this->load->database();
        date_default_timezone_set('Asia/Kolkata');
    }

     function find_details($field, $value, $table) {
        $this->db->select('*');
        $this->db->from($table);
        if ($field != "") {
            if ($value != "") {
                $this->db->where($field, $value);
            }
        }
      //  $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }
function find_details_by_cond($cond, $table) {
        $this->db->select('*');
        $this->db->from($table);
        if ($cond != "") {
            $this->db->where($cond);
        }
      //  $this->db->order_by("id", "desc");
        $query = $this->db->get();
        //   print_r($this->db->last_query());
        return $query->result_array();
    }


    /* Find Last Inserted ID  */

    public function find_insert_id() {
        return $this->last_id;
    }

    /* Insert Data Into Table  */

    function store_details($data, $table) {
        $insert = $this->db->insert($table, $data);
        $this->last_id = $this->db->insert_id();
        return $insert;
    }

    /* Update Data From The Table  */

    function update_details($field, $value, $data_to_store, $table) {
        $this->db->where($field, $value);
        $update = $this->db->update($table, $data_to_store);
        return $update;
    }

    /* Delete Data From The Table  */

    function delete_details($field, $value, $table) {
        if ($field != "" && $value != "") {
            $this->db->where($field, $value);
        } else {
            $this->db->where('id!=', '0');
        }
        $delete = $this->db->delete($table);
        return $delete;
    }



}


?>

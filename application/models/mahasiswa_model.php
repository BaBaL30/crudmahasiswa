<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mahasiswa_model extends CI_Model
{
    public function getmahasiswa($id = NULL)
    {
        if ($id == NULL) {
            return $this->db->get('mahasiswa')->result_array();
        } else {
            return $this->db->get_where('mahasiswa', ['id_mahasiswa' => $id])->result_array();
        }
    }
}

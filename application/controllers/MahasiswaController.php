<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class MahasiswaController extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model','mahasiswa');
    }
    public function index_get()
    {
        $mahasiswa = $this->mahasiswa->getmahasiswa();

        $id = $this->get('id_mahasiswa');
        if ($id == null) {
            $mahasiswa = $this->mahasiswa->getmahasiswa();
        } else {
            $mahasiswa = $this->mahasiswa->getmahasiswa($id);
        }
        if ($mahasiswa) {
            $this->response([
                'status' => true,
                'data' => $mahasiswa
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'id not found'
            ], RestController::HTTP_NOT_FOUND);
        }
    }
}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('login')) {
            redirect('Login');
        }
    }

    protected function check_level($levels = [])
    {
        if (!in_array($this->session->userdata('level'), $levels)) {
            show_error('Anda tidak memiliki hak akses', 403);
        }
    }
}

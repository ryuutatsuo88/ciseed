<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student extends CI_Controller {

        public function __construct()
        {
			parent::__construct();
			$this->load->model('student_model');
        }

        public function index()
        {
			$data['students'] = $this->student_model->get_students();
			$this->output->set_content_type('application/json');
			$this->output->set_output(json_encode($data));
			return $data;
        }
        
        public function updatestudent()
        {
        	$this->student_model->update_student();
        }
}
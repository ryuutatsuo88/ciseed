<?php

class Student_model extends CI_Model
{

    public function __construct()
	{
			$this->load->database();
			$this->load->helper('string');
	}

	//updates all students with random names
    public function update_student()
	{	
		//get all current students from db
		$query = $this->db->get('Student');
		$data = array();
		//iterate over the result 
		Foreach ($query->result() as $row) {
			//push new random generate names and passwords into array
			array_push($data, array("id"=>$row->id, "user_name"=>random_string('alnum', 5), "password"=>random_string('alnum', 12)) );
		}
		//update db and return back
	    return $this->db->update_batch('Student', $data, 'id'); 
	}
    
    //returns all the students 
    public function get_students()
	{
		$query = $this->db->get('Student');
		return $query->result_array();
	}
}

?>
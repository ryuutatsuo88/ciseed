<?php

class Student_model extends CI_Model
{

    public function __construct()
	{
			$this->load->database();
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
			array_push($data, array("id"=>$row->id, "user_name"=>generateRandomString(5), "password"=>generateRandomString(12)) );
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

//function to generate random string
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

?>
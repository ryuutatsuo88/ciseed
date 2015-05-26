<?php

class StudentModelTest extends CIUnit_Framework_TestCase
{
    private $user;
    
    protected function setUp()
    {
    	$this->get_instance()->load->database();
        $this->get_instance()->load->model('student_model', 'Student');
        $this->Student = $this->get_instance()->Student;
    }
    
    public function test_update_student()
    {
        $expectedResult = 4;
        
        $this->assertEquals($expectedResult, $this->Student->update_student());
    }
    
    public function test_get_student()
    {   
        $expectedResult = $this->get_instance()->db->get('Student')->result_array();
        
        $this->assertEquals($expectedResult, $this->Student->get_students());
    }
}

?>
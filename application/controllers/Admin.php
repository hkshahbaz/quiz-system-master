<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		
		$this->load->view('admin/index');
	}
	public function insert(){

		$this->load->model('user');
		$query =array();
        $query['question']  =   $this->input->post('question');
		
		if(!empty($query['question']))
        {
			$insert = $this->user->insertRow($query);
			
				$this->flashAndRedirect($insert,
								"Question Added Successfully",
								"Question Failed to Add.Please Try Again.");
		}
		else{
			echo "Field is empty";
		}
	}
	public function select($id =Null){
		$this->load->model('user');
		$questions = $this->user->getRows($id);
		$words = $this->user->getblanks();
        if(!empty($questions)){
			$data['res1'] = $questions;
            $data['res2'] = $words;

			$this->load->view('admin/display',['data'=>$data]);
        }
        else{
            echo "There are no questions in the database";
        }
	}
	public function insertBlanks()
		{	
			$this->load->model('user');
			$word = array();
			$data = array();
			$word['blankid']=$this->input->get('blankid');
			$word['blankname']=$this->input->get('blankname');
			
			$res=$this->user->insertBlank($word);
			if($res)
			{
				//$data['word']=$this->Model_Member->checkStatus();
				$data['status']=true;
			}
			else
			{
				$data['status']=false;
			}
			echo json_encode($data);
		}
	public function fetchBlanks(){
		$this->load->model('user');
		$words = $this->user->getblanks();
		echo '<pre>',print_r($words);
	}
	
	private function flashAndRedirect($Successful, $successMessage,$failMessage)
		{
			if($Successful)
			{
				$this->session->set_flashdata('feedback',$successMessage);
				$this->session->set_flashdata('feedback_class','alert-success');
				return redirect('admin/index');
			}
			else
			{
				$this->session->set_flashdata('feedback',$failMessage);
				$this->session->set_flashdata('feedback_class','alert-danger');
				return redirect('admin/index');
			}
		}
}

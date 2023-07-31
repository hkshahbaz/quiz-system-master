<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {


	// Functions Related to Insert and fetch questions
	function insertRow($data =array()){
		$insert = $this->db->insert('question',$data);
		if($insert){
			return true;
		}
		else{
			return false;
		}
	}
	function getRows($id = null){

		if($id){
			$query = $this->db->get_where('question',array('id' => $id));
			return $query->row_array();
		}
		else
		{
			$query = $this->db->get('question');
			return $query->result_array();
		}
	}
	// Functions relaeted to blanks
	function insertBlank($data =array()){

		$id = $data['blankid'] ;
		$name = $data['blankname'];
		$check = $this->db->get_where('blankwords',array('blankid' => $id, 'blankname' => $name))->row();
		// rowCount($check );
		if($check){
			return false;
		}
		else
		{
			$sql = $this->db->insert('blankwords', $data);
			if($sql){
				return true;
			}
			else{
				return false;
			}
		}
		
	}
	function getblanks(){
		$query = $this->db->get('blankwords');
		return	$query->result_array();
	}
	function checkblanks($data =array()){
		$id = $data['blankid'] ;
		$name = $data['blankname'];
		$check = $this->db->get_where('blankwords',array('blankid' => $id, 'blankname' => $name))->row();
		// rowCount($check );
		if($check){
			return true;
		}
		else
		{
			return false;
		}
	}
	
}
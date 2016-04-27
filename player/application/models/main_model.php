<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Main_model extends CI_Model {

	public function __construct()
	{
		 parent::__construct();
		 $this->load->database();
	}

     public function main(){
        $query = $this->db->query("select * from team_info");
        return $query->result();
    }
}
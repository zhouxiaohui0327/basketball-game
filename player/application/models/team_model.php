<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Team_model extends CI_Model {

	public function __construct()
	{
		 parent::__construct();
		 $this->load->database();
	}

    public function getteam($id)
    {
       $query = $this->db->get_where('team_player', array('team_id' => $id));
        return $query->result();
    }
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Player_model extends CI_Model {

	public function __construct()
	{
		 parent::__construct();
		 $this->load->database();
	}


    public function getplayer($id)
    {
       $query = $this->db->get_where('player_info', array('id' => $id));
        return $query->result();
    }
}
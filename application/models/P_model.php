<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class P_model extends CI_Model{
	public $table = 'biodata';
	public function __construct()
	{   
		parent::__construct();
	}

    public function create($store)
    {
      $query = $this->db->insert($this->table, $store);
      return $query;
    }
}

?>
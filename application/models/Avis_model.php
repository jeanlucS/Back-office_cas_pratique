<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Avis_model extends CI_Model {

	var $column_order = array('utilisateur_id','endroit_id','note','commentaire',null); 
	var $column_search = array('utilisateur_id','endroit_id',); 
	var $order = array('utilisateur_id' => 'asc'); 

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query()
	{
		
		$this->db->from('avis');

		$i = 0;
	
		foreach ($this->column_search as $item) 
		{
			if($_POST['search']['value'])
			{
				
				if($i===0)
				{
					$this->db->group_start(); 
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}
		
		if(isset($_POST['order']))
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from('avis');
		return $this->db->count_all_results();
	}

	public function get_by_id_avis($avis_id)
	{
		$this->db->from('avis');
		$this->db->where('avis_id',$avis_id);
		$query = $this->db->get();

		return $query->row();
	}

	public function insert_avis($data)
	{
		$this->db->insert('avis',$data);
		return $this->db->insert_id();
	}

	public function update_avis($where, $data)
	{
		$this->db->update('avis', $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id_avis($avis_id)
	{
		$this->db->where('avis_id', $avis_id);
		$this->db->delete('avis');
	}
	
		
	function get_dropdown_list()
     {
      $this->db->from('avis_id');
      $result = $this->db->get();
      $avis = array();
      if($result->num_rows() > 0) {
      foreach($result->result_array() as $row) {
      $avis[$row['avis_id']] = $row['utilisateur_id'];
     }
    }
        return $avis;

}
}

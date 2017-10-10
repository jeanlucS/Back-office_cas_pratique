<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Avis extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Avis_model','avis');
	}

	public function index()
	{
		
		$this->load->helper('url');
		$this->load->view('Avis_view');
	}

	public function ajax_list()
	{
		$list = $this->avis->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $avis) {
			$no++;
			$row = array();
			$row[] = $avis->utilisateur_id;
			$row[] = $avis->endroit_id;
			$row[] = $avis->note;
			$row[] = $avis->commentaire;
			
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary btn-rounded btn-custom" href="javascript:void(0)" title="Edit" onclick="edit_avis('."'".$avis->avis_id."'".')"><i class="glyphicon glyphicon-pencil"></i> Modifier</a>
				  <a class="btn btn-sm btn-danger btn-rounded btn-custom" href="javascript:void(0)" title="Hapus" onclick="delete_avis('."'".$avis->avis_id."'".')"><i class="glyphicon glyphicon-trash"></i> Supprimer</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->avis->count_all(),
						"recordsFiltered" => $this->avis->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->avis->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		$data = array(
				'utilisateur_id' => $this->input->post('utilisateur_id'),
				'endroit_id' => $this->input->post('endroit_id'),
				'note' => $this->input->post('note'),
				'commentaire' => $this->input->post('commentaire'),				
			);
		$insert = $this->avis->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'utilisateur_id' => $this->input->post('utilisateur_id'),
				'endroit_id' => $this->input->post('endroit_id'),
				'note' => $this->input->post('note'),
				'commentaire' => $this->input->post('commentaire'),				
			);
		$this->avis->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->note->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('num_et') == '')
		{
			$data['inputerror'][] = 'num_et';
			$data['error_string'][] = 'Numero etudiant is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('num_mat') == '')
		{
			$data['inputerror'][] = 'num_mat';
			$data['error_string'][] = 'num_mat is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('note') == '')
		{
			$data['inputerror'][] = 'note';
			$data['error_string'][] = 'note is required';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
	
	function dynamic_combobox(){

     // retrieve the states and add to the data array				
		$data['note'] = $this->note_model->get_dropdown_list();
		$this->load->view('note_view', $data); 
}
	

}

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
		foreach ($list as $avi) {
			$no++;
			$row = array();
			$row[] = $avi->utilisateur_id;
			$row[] = $avi->endroit_id;
			$row[] = $avi->note;
			$row[] = $avi->commentaire;
			
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary btn-rounded btn-custom" href="javascript:void(0)" title="Edit" onclick="edit_avis('."'".$avi->avis_id."'".')"><i class="glyphicon glyphicon-pencil"></i> Modifier</a>
				  <a class="btn btn-sm btn-danger btn-rounded btn-custom" href="javascript:void(0)" title="Hapus" onclick="delete_avis('."'".$avi->avis_id."'".')"><i class="glyphicon glyphicon-trash"></i> Supprimer</a>';
		
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

	public function ajax_edit($avis_id)
	{
		$data = $this->avis->get_by_id_avis($avis_id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		$data = array(
				'utilisateur_id' => $this->input->post('utilisateur_id'),
				'endroit_id' => $this->input->post('endroit_id'),
				'note' => $this->input->post('note'),
				'commentaire' => $this->input->post('commentaire')			
			);
		$insert = $this->avis->insert_avis($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'utilisateur_id' => $this->input->post('utilisateur_id'),
				'endroit_id' => $this->input->post('endroit_id'),
				'note' => $this->input->post('note'),
				'commentaire' => $this->input->post('commentaire')			
			);
		$this->avis->update_avis(array('avis_id' => $this->input->post('avis_id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($avis_id)
	{
		$this->avis->delete_by_id_avis($avis_id);
		echo json_encode(array("status" => TRUE));
	}
	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('utilisateur_id') == '')
		{
			$data['inputerror'][] = 'utilisateur_id';
			$data['error_string'][] = 'Numero utilisateur est obligatoire';
			$data['status'] = FALSE;
		}

		if($this->input->post('endroit_id') == '')
		{
			$data['inputerror'][] = 'endroit_id';
			$data['error_string'][] = 'Numero endroit est obligatoire';
			$data['status'] = FALSE;
		}

		if($this->input->post('note') == '')
		{
			$data['inputerror'][] = 'note';
			$data['error_string'][] = 'note est obligatoire';
			$data['status'] = FALSE;
		}
      if($this->input->post('commentaire') == '')
		{
			$data['inputerror'][] = 'commentaire';
			$data['error_string'][] = 'commentaire est obligatoire';
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
		$data['avis'] = $this->avis->get_dropdown_list();
		$this->load->view('Avis_view', $data); 
}
	

}

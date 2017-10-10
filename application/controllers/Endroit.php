<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Endroit extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		$this->load->model('Endroit_model','endroit');
	}

public function index()
	{
		$this->load->helper('url');
		$this->load->view('Endroit_view');
	}
public function ajax_list()
	{
		$list = $this->endroit->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $endroit) {
			$no++;
			$row = array();
			$row[] = $endroit->ville;
			$row[] = $endroit->image;
			$row[] = $endroit->description;
			//ajoutez action sur HTML
			$row[] = '<a class="btn btn-sm btn-primary btn-rounded btn-custom" href="javascript:void(0)" title="Edit" onclick="edit_endroit('."'".$endroit->endroit_id."'".')"><i class="glyphicon glyphicon-pencil"></i> Modifier</a>
				  <a class="btn btn-sm btn-danger btn-rounded btn-custom" href="javascript:void(0)" title="Hapus" onclick="delete_endroit('."'".$endroit->endroit_id."'".')"><i class="glyphicon glyphicon-trash"></i> Supprimer</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->endroit->count_all(),
						"recordsFiltered" => $this->endroit->count_filtered(),
						"data" => $data,
				);
		//production à format du json
		echo json_encode($output);
	}
public function ajax_edit($id)
	{
		$data = $this->endroit->get_by_id($id);
		echo json_encode($data);
	}

public function ajax_add()
	{
		$this->_validate();
		$data = array(
				'ville' => $this->input->post('ville'),
				'image' => $this->input->post('image'),
				'description' => $this->input->post('description'),);
		$insert = $this->endroit->save($data);
		echo json_encode(array("status" => TRUE));
	}

public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'ville' => $this->input->post('ville'),
				'image' => $this->input->post('image'),
				'description' => $this->input->post('description'),);
		$this->endroit->update(array('endroit_id' => $this->input->post('endroit_id')), $data);
		echo json_encode(array("status" => TRUE));
	}
public function ajax_delete($id)
	{
		$this->endroit->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

	if($this->input->post('ville') == '')
		{
			$data['inputerror'][] = 'ville';
			$data['error_string'][] = 'ville est obligatoire';
			$data['status'] = FALSE;
		}
	if($this->input->post('image') == '')
		{
			$data['inputerror'][] = 'image';
			$data['error_string'][] = 'Image est obligatoire';
			$data['status'] = FALSE;
		}		
	if($this->input->post('description') == '')
		{
			$data['inputerror'][] = 'description';
			$data['error_string'][] = 'description est obligatoire';
			$data['status'] = FALSE;
		}

	if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

}

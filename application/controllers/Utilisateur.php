<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utilisateur extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Utilisateur_model','user');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('Utilisateur_view');
	}

	public function ajax_list()
	{
		$list = $this->user->get_datatables();
		
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $user) {
			$no++;
			$row = array();
			$row[] = $user->nom;
			$row[] = $user->email;
			$row[] = $user->genre;
			$row[] = $user->date_anniversaire;
			
			//ajoutez action sur HTML
			$row[] = '<a class="btn btn-sm btn-primary btn-rounded btn-custom" href="javascript:void(0)" title="Edit" onclick="edit_user('."'".$user->utilisateur_id."'".')"><i class="glyphicon glyphicon-pencil"></i> Modifier</a>
				  <a class="btn btn-sm btn-danger btn-rounded btn-custom" href="javascript:void(0)" title="Hapus" onclick="delete_user('."'".$user->utilisateur_id."'".')"><i class="glyphicon glyphicon-trash"></i> Supprimer</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->user->count_all(),
						"recordsFiltered" => $this->user->count_filtered(),
						"data" => $data,
				);
		//production à format du json
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->user->get_by_id($id);
		$data->date_anniversaire = ($data->date_anniversaire == '0000-00-00') ? '' : $data->date_anniversaire; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		$data = array(
				'nom' => $this->input->post('nom'),
				'email' => $this->input->post('nom'),
				'genre' => $this->input->post('genre'),
				'date_anniversaire' => $this->input->post('date_anniversaire'),
				
			);
		$insert = $this->user->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'nom' => $this->input->post('nom'),
				'email' => $this->input->post('nom'),
				'genre' => $this->input->post('genre'),
				'date_anniversaire' => $this->input->post('date_anniversaire'),
				
			);
		$this->user->update(array('utilisateur_id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

   public function ajax_delete($id)
	{
		$this->user->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
   private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
    if($this->input->post('nom') == '')
        {
            $data['inputerror'][] = 'nom';
            $data['error_string'][] = 'Le nom est obligatoire';
            $data['status'] = FALSE;
        }

    if($this->input->post('email') == '')
        {
            $data['inputerror'][] = 'email';
            $data['error_string'][] = 'Email est obligatoire';
            $data['status'] = FALSE;
        }
    if($this->input->post('genre') == '')
        {
            $data['inputerror'][] = 'genre';
            $data['error_string'][] = 'genre est obligatoire';
            $data['status'] = FALSE;
        }  
    if($this->input->post('date_anniversaire') == '')
        {
            $data['inputerror'][] = 'date_anniversaire';
            $data['error_string'][] = 'La date de naissance est obligatoire';
            $data['status'] = FALSE;
        }  
		
		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
	
	
	
}

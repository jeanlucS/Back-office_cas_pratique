<?php
/**
 * Created by PhpStorm.
 * User: Luc
 * Date: 10/10/2017
 * Time: 14:43
 */
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
        $this->load->view('crudUtilisateur');
    }

    public function list_user()
    {
        $list = $this->user->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $user) {
            $no++;
            $row = array();
            $row[] = $user->utilisateur_id;
            $row[] = $user->nom;
            $row[] = $user->mail;
            $row[] = $user->genre;
            $row[] = $user->date_anniversaire;

            //add html for action
            $row[] = '<a href="javascript:void(0)" class="btn btn-sm btn-primary btn-rounded btn-custom" title="Edit" onclick="edit_utilisateur('."'".$user->utilisateur_id."'".')"><i class="glyphicon glyphicon-pencil"></i>Modifier</a>
				  <a href="javascript:void(0)" class="btn btn-sm btn-primary btn-danger btn-rounded btn-custom" title="Hapus" onclick="delete_user('."'".$user->utilisateur_id."'".')"><i class="glyphicon glyphicon-trash"></i>Supprimmer</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->user->count_all(),
            "recordsFiltered" => $this->user->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function edit_users($utilisateur_id)
    {
        $data = $this->user->get_by_id($utilisateur_id);
        $data->date_anniversaire = 
        ($data->date_anniversaire == '0000-00-00') ? '' : $data->date_anniversaire; // if 0000-00-00 set tu empty for datepicker compatibility
    }

    public function ajout_users()
    {
        $this->_validate();
        $data = array(
            'nom' => $this->input->post('nom'),
            'mail' => $this->input->post('mail'),
            'password' => $this->input->post('password'),
            'date_anniversaire' => $this->input->post('date_anniversaire')
        );
        $insert = $this->user->save($data);
    }

    public function update_users()
    {
        $this->_validate();
        $data = array(
            'nom' => $this->input->post('nom'),
            'mail' => $this->input->post('mail'),
            'password' => $this->input->post('password'),
            'date_anniversaire' => $this->input->post('date_anniversaire')
        );
        $this->user->update(array('utilisateur_id' => $this->input->post('utilisateur_id')), $data);
    }

    public function delete_users($utilisateur_id)
    {
        $this->user->delete_by_id($utilisateur_id);
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
            $data['error_string'][] = 'name is required';
            $data['status'] = FALSE;
        }

    if($this->input->post('email') == '')
        {
            $data['inputerror'][] = 'email';
            $data['error_string'][] = 'Email is required';
            $data['status'] = FALSE;
        }

    if($this->input->post('password') == '')
        {
            $data['inputerror'][] = 'password';
            $data['error_string'][] = 'password is required';
            $data['status'] = FALSE;
        }
    if($this->input->post('genre') == '')
        {
            $data['inputerror'][] = 'genre';
            $data['error_string'][] = 'genre is required';
            $data['status'] = FALSE;
        }  
    if($this->input->post('date_anniversaire') == '')
        {
            $data['inputerror'][] = 'date_anniversaire';
            $data['error_string'][] = 'date is required';
            $data['status'] = FALSE;
        }  
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

}

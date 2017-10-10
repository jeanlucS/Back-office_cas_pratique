<?php
/**
 * Created by PhpStorm.
 * User: Luc
 * Date: 10/10/2017
 * Time: 14:43
 */
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
        $this->load->view('crudAvis');
    }

    public function list_avis()
    {
        $list = $this->avis->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $avis) {
            $no++;
            $row = array();
            $row[] = $avis->endroit_id;
            $row[] = $avis->utilisateur_id;
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
    }

public function edit_avi($avis_id)
    {
        $data = $this->avis->get_by_id($avis_id);
    }
 public function ajout_avis()
    {
        $this->_validate();
        $data = array(
            'utilisateur_id' => $this->input->post('utilisateur_id'),
            'endroit_id' => $this->input->post('endroit_id'),
            'note' => $this->input->post('note'),
            'commentaire' => $this->input->post('commentaire'),);
        $insert = $this->note->save($data);
    }

public function update_avi()
    {
        $this->_validate();
        $data = array(
            'utilisateur_id' => $this->input->post('utilisateur_id'),
            'endroit_id' => $this->input->post('endroit_id'),
            'note' => $this->input->post('note'),
            'commentaire' => $this->input->post('commentaire'),);
        $this->avis->update(array('avis_id' => $this->input->post('avis_id')), $data);
    }

public function delete_avi($avis_id)
    {
        $this->avis->delete_by_id($avis_id);
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
            $data['error_string'][] = 'Numero User is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('endroit_id') == '')
        {
            $data['inputerror'][] = 'endroit_id';
            $data['error_string'][] = 'Identifiant endroit is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('note') == '')
        {
            $data['inputerror'][] = 'note';
            $data['error_string'][] = 'note is required';
            $data['status'] = FALSE;
        }
        if($this->input->post('commentaire') == '')
        {
            $data['inputerror'][] = 'commentaire';
            $data['error_string'][] = 'commentaire is required';
            $data['status'] = FALSE;
        }
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }
function dynamic_combobox(){
        $data['avis'] = $this->avis->get_dropdown_list();
        $this->load->view('crudAvis', $data);
    }

}

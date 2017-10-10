<?php
/**
 * Created by PhpStorm.
 * User: Luc
 * Date: 10/10/2017
 * Time: 14:43
 */
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
        $this->load->view('crudEndroit');
    }

public function list_endroit()
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

            //add html for action
            $row[] = '<a href="javascript:void(0)" class="btn btn-sm btn-primary btn-rounded btn-custom" title="Edit" onclick="edit_endroit('."'".$endroit->endroit_id."'".')"><i class="glyphicon glyphicon-pencil"></i>  Modifier</a>
				  <a href="javascript:void(0)" class="btn btn-sm btn-primary btn-danger btn-rounded btn-custom" title="Hapus" onclick="delete_endroit('."'".$endroit->endroit_id."'".')"><i class="glyphicon glyphicon-trash"></i>  Supprimmer</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->endroit->count_all(),
            "recordsFiltered" => $this->endroit->count_filtered(),
            "data" => $data,
        );
    }

public function edit_endroits($endroit_id)
    {
        $data = $this->endroit->get_by_id($endroit_id);
    }

    public function ajout_endroits()
    {
        $this->_validate();
        $data = array(
            'ville' => $this->input->post('ville'),
            'image' => $this->input->post('image'),
            'description' => $this->input->post('description'),
            
        );
        $insert = $this->endroit->save($data);
    }
public function update_endroits()
    {
        $this->_validate();
        $data = array(
            'ville' => $this->input->post('ville'),
            'image' => $this->input->post('image'),
            'description' => $this->input->post('description'),
        );
        $this->endroit->update(array('endroit_id' => $this->input->post('endroit_id')), $data);
        echo json_encode(array("status" => TRUE));
    }

public function delete_endroits($endroit_id)
    {
        $this->endroit->delete_by_id($endroit_id);
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
            $data['error_string'][] = 'ville is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('image') == '')
        {
            $data['inputerror'][] = 'image';
            $data['error_string'][] = 'image is required';
            $data['status'] = FALSE;
        }
        if($this->input->post('description') == '')
        {
            $data['inputerror'][] = 'description';
            $data['error_string'][] = 'description is required';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

}

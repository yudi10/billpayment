<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller {

    function __construct(){
        parent::__construct();
        check_not_login();
        check_admin();

        $this->load->model('company_m');
        $this->load->library('form_validation');
    }

    public function get_ajax(){

        $list = $this->company_m->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $company) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $company->name;
            $row[] = $company->image != null ? '<img src="'.base_url('uploads/logo/'.$company->image).'" class="img" style="width:100px">' : null;
            $row[] = $company->phone;
            $row[] = $company->fax;
            $row[] = $company->address;

            $row[] = '<a href="'.site_url('company/edit/'.$company->company_id).'" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Update</a>
                      <a href="'.site_url('company/del/'.$company->company_id).'" onclick="return confirm(\'Yakin hapus data?\')"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>';
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->company_m->count_all(),
            "recordsFiltered" => $this->company_m->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function index(){
        
        $data['row'] = $this->company_m->get();
        $this->template->load('template', 'company/company_data');
    }

    public function add(){

        $company = new stdClass();
        $company->company_id = null;
        $company->name = null;
        $company->address = null;
        $company->phone = null;
        $company->fax = null;

        $data = array(
            'page' => 'add',
            'row' => $company
        );
        $this->template->load('template', 'company/company_form', $data);
    }

    public function edit($id)
	{
		$query = $this->company_m->get($id);
		if($query->num_rows() > 0){
			$company = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $company
			);
            
			$this->template->load('template', 'company/company_form', $data);
		} 
	}

    public function process(){
        $config['upload_path']      = './uploads/logo/';
        $config['allowed_types']    = 'jpg|png|gif|jpeg';
        $config['max_size']         = 2048;
        $config['file_name']        = 'logo-'.date('ymd').'-'.substr(md5(rand()),0,10);
        $this->load->library('upload', $config);

        $post = $this->input->post(null, TRUE);
        if(isset($_POST['add'])){
            if($this->company_m->check_name($post['name'])->num_rows() > 0){
                $this->session->set_flashdata('error',"Company Name $post[name] already");
                redirect('company');
            }else{
                if(@_FILES['image']['name'] != null){
                    if($this->upload->do_upload('image')){
                        $post['image'] = $this->upload->data('file_name');
                        $this->company_m->add($post);
                        if($this->db->affected_rows() > 0){
                            $this->session->set_flashdata('msg','Data berhasil disimpan');
                        }
                        redirect('company');
                    }else{
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('company');
                    }
                }else{
                    $post['image'] = null;
                    $this->company_m->add($post);
                    if($this->db->affected_rows() > 0){
                        $this->session->set_flashdata('msg','Data berhasil disimpan');
                    }
                    redirect('company');
                }
            }
        }else if(isset($_POST['edit'])){
            if($this->company_m->check_name($post['name'], $post['id'])->num_rows() > 0){
                $this->session->set_flashdata('error',"Company name $post[name] already");
                redirect('company/edit/'.$post['id']);
            }else{
                if(@$_FILES['image']['name'] != null){
                    if($this->upload->do_upload('image')){
                        $company = $this->company_m->get($post['id'])->row();
                        if($company->image != null){
                            $target_file = './uploads/logo/'.$company->image;
                            unlink($target_file);
                        }

                        $post['image'] = $this->upload->data('file_name');
                        $this->company_m->edit($post);
                        if($this->db->affected_rows() > 0){
                            $this->session->set_flashdata('msg','Data berhasil diubah');
                        }
                        redirect('company');
                    }else{
                        $error  = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('company/add');
                    }
                }else{
                    $post['image'] = null;
                    $this->company_m->edit($post);
                    if($this->db->affected_rows() > 0){
                        $this->session->set_flashdata('msg','Data berhasil diubah');
                    }
                    redirect('company');
                }
            }
        }
    }

    public function del($id){
        $company = $this->company_m->get($id)->row();
        if($company->image != null){
            $target_file = './uploads/logo/'.$company->image;
            unlink($target_file);
        }

		$this->company_m->del($id);
		if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('msg','Data berhasil dihapus');
        }
        redirect('company');
    }



}
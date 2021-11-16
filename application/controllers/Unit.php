<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit extends CI_Controller {

    function __construct(){
        parent::__construct();
        check_not_login();
        // check_admin();

        $this->load->model('unit_m');
        $this->load->library('form_validation');
    }

    public function index(){

        $data['row'] = $this->unit_m->get();
        $this->template->load('template', 'master/unit_data');
    }

    public function add(){ 

            $unit               = new stdClass();
            $unit->unit_id      = null;
            $unit->unit_name    = null;
            $unit->tipe_unit    = null;
            $unit->size_unit    = null;

            $data = array(
                'page'  => 'add',
                'row'   => $unit
            );

            $this->template->load('template', 'master/unit_form', $data);
    }

    public function edit($id){

        $query = $this->unit_m->get($id);
        if($query->num_rows() > 0){
            $unit = $query->row();
            $data = array(
                'page'  => 'edit',
                'row'   => $unit
            );
            $this->template->load('template', 'master/unit_form', $data);
        }else{
            echo "<script>alert('data not found');";
            echo "window.location='".site_url('unit')."'; </script>";
        }
    }

    public function process(){
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])){
			$this->unit_m->add($post);
		}else if(isset($_POST['edit'])){
			$this->unit_m->edit($post);
		}

		if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('msg','Data berhasil disimpan');
        }
        redirect('unit');
	}

    public function get_ajax(){

        $list = $this->unit_m->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $unit) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $unit->unit_name;
            $row[] = $unit->tipe_unit;
            $row[] = $unit->size_unit;
            

            $row[] = '<a href="'.site_url('unit/edit/'.$unit->unit_id).'" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Update</a>
                      <a href="'.site_url('unit/del/'.$unit->unit_id).'" onclick="return confirm(\'Yakin hapus data?\')"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>';
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->unit_m->count_all(),
            "recordsFiltered" => $this->unit_m->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function del($id){
        $this->unit_m->del($id);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('msg','Data berhasil dihapus');
        }
        redirect('unit');
    }



}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends CI_Controller {

    function __construct(){
        parent::__construct();
        check_not_login();
        check_admin();

        $this->load->model('bank_m');
        $this->load->library('form_validation');
    }


    public function get_ajax(){

        $list = $this->bank_m->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $bank) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $bank->name_bank;
            $row[] = $bank->name_rekening;
            $row[] = $bank->no_rekening;
            $row[] = $bank->kcp_bank;
            

            $row[] = '<a href="'.site_url('bank/edit/'.$bank->bank_id).'" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Update</a>
                      <a href="'.site_url('bank/del/'.$bank->bank_id).'" onclick="return confirm(\'Yakin hapus data?\')"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>';
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->bank_m->count_all(),
            "recordsFiltered" => $this->bank_m->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function index(){
        
        $data['row'] = $this->bank_m->get();
        $this->template->load('template', 'bank/bank_data');
    }

    public function add(){

        $bank = new stdClass();
        $bank->bank_id = null;
        $bank->name_bank = null;
        $bank->name_rekening = null;
        $bank->no_rekening = null;
        $bank->kcp_bank = null;

        $data = array(
            'page' => 'add',
            'row' => $bank
        );
        $this->template->load('template', 'bank/bank_form',$data);
    }

    public function edit($id){

        $query = $this->bank_m->get($id);
        if($query->num_rows() > 0){
            $bank = $query->row();
            $data = array(
                'page'  => 'edit',
                'row'   => $bank
            );
            $this->template->load('template', 'bank/bank_form', $data);
        }else{
            echo "<script>alert('data not found');";
            echo "window.location='".site_url('bank')."'; </script>";
        }
    }

    public function process(){
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])){
			$this->bank_m->add($post);
		}
        else if(isset($_POST['edit'])){
			$this->bank_m->edit($post);
		}

		if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('msg','Data berhasil simpan');
        }
        redirect('bank');
	}

    public function del($id){
        $this->bank_m->del($id);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('msg','Data berhasil dihapus');
        }
        redirect('bank');
    }

}
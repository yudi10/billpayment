<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Iuran extends CI_Controller {

    function __construct(){
        parent::__construct();
        check_not_login();
        // check_admin();

        $this->load->model('iuran_m');
        $this->load->library('form_validation');
    }

    public function index(){
        
        $data['row'] = $this->iuran_m->get();
        $this->template->load('template', 'master/iuran_data');
    }

    public function get_ajax(){

        $list = $this->iuran_m->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $iuran) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $iuran->iuran_name;
            $row[] = rupiah($iuran->price);
            

            $row[] = '<a href="'.site_url('iuran/edit/'.$iuran->iuran_id).'" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Update</a>
                      <a href="'.site_url('iuran/del/'.$iuran->iuran_id).'" onclick="return confirm(\'Yakin hapus data?\')"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>';
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->iuran_m->count_all(),
            "recordsFiltered" => $this->iuran_m->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function add(){

        $iuran = new stdClass();
        $iuran->iuran_id = null;
        $iuran->iuran_name = null;
        $iuran->price = null;

        $data = array(
            'page' => 'add',
            'row' => $iuran
        );
        $this->template->load('template', 'master/iuran_form',$data);
    }

    public function edit($id){

        $query = $this->iuran_m->get($id);
        if($query->num_rows() > 0){
            $iuran = $query->row();
            $data = array(
                'page'  => 'edit',
                'row'   => $iuran
            );
            $this->template->load('template', 'master/iuran_form', $data);
        }else{
            echo "<script>alert('data not found');";
            echo "window.location='".site_url('iuran')."'; </script>";
        }
    }

    public function process(){
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])){
			$this->iuran_m->add($post);
		}
        else if(isset($_POST['edit'])){
			$this->iuran_m->edit($post);
		}

		if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('msg','Data berhasil simpan');
        }
        redirect('iuran');
	}

    public function del($id){
        $this->iuran_m->del($id);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('msg','Data berhasil dihapus');
        }
        redirect('iuran');
    }

}
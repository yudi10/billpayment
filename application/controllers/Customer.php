<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

    function __construct(){
        parent::__construct();
        check_not_login();
        // check_admin();

        $this->load->model(['unit_m','customer_m']);
        // $this->load->library('form_validation');
    }

    public function index(){

        $data['row'] = $this->unit_m->get();
        $this->template->load('template', 'master/customer_data');
    }

    public function get_ajax(){

        $list = $this->customer_m->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $customer) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $customer->customer_name;
            $row[] = $customer->unit_name;
            $row[] = $customer->email;
            $row[] = $customer->phone;
            $row[] = $customer->address;
            

            $row[] = '<a href="'.site_url('customer/edit/'.$customer->customer_id).'" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Update</a>
                      <a href="'.site_url('customer/del/'.$customer->customer_id).'" onclick="return confirm(\'Yakin hapus data?\')"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>';
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->customer_m->count_all(),
            "recordsFiltered" => $this->customer_m->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function add(){

        $customer = new stdClass();
		$customer->customer_id = null;
		$customer->customer_name = null;
		$customer->unit_id = null;
        $customer->email = null;
        $customer->phone = null;
        $customer->address = null;

        $query_unit = $this->unit_m->get();

        $data = array(
			'page' => 'add',
            'row' => $customer,
            'unit' => $query_unit,
		);

        $this->template->load('template', 'master/customer_form', $data);
    }

    public function edit($id)
	{
		$query = $this->customer_m->get($id);
		if($query->num_rows() > 0){
			$customer = $query->row();
			$query_unit = $this->unit_m->get();

		    $data = array(
			    'page' => 'edit',
                'row' => $customer,
                'unit' => $query_unit,
		    );

		    $this->template->load('template', 'master/customer_form', $data);
		} else {
			echo "<script>alert('data not found');";
            echo "window.location='".site_url('item')."'; </script>";
		}
	}


    public function process(){
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])){
			$this->customer_m->add($post);
		}
        else if(isset($_POST['edit'])){
			$this->customer_m->edit($post);
		}

		if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('msg','Data berhasil simpan');
        }
        redirect('customer');
	}

    public function del($id)
	{
        $item = $this->customer_m->get($id)->row();

		$this->customer_m->del($id);
		if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('msg','Data berhasil dihapus');
        }
        redirect('customer');
    }


}
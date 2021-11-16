<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sale extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        check_not_login();
        // check_admin();
        
		$this->load->model('sale_m');
		$this->load->helper('short_number');
		$this->load->model(['customer_m', 'iuran_m']);
        
    }

	public function index()
	{
		
		$iuran = $this->iuran_m->get()->result();
		$customer = $this->customer_m->get()->result();
		$data = array(
			'iuran'		=> $iuran,
			'customer' 	=> $customer,
			'invoice'	=> $this->sale_m->invoice_no(),
		);
		$this->template->load('template', 'transaction/sale/sale_form', $data);
	}

	public function add_to_cart()
	{
		
	}
}
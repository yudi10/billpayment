<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_m extends CI_Model {

     
    var $table = 'customer'; //nama tabel dari database
    var $column_order = array(null, 'customer_name','unit_id','email','phone', 'address'); //field yang ada di table customer
    var $column_search = array('customer_name','unit_name' ,'phone'); //field yang diizin untuk pencarian 
    var $order = array('customer_id' => 'DESC'); // default order


    private function _get_datatables_query() {
        $this->db->select('customer.*, unit.unit_name');
        $this->db->from('customer');
        $this->db->join('unit', 'customer.unit_id = unit.unit_id');
        $i = 0;
        foreach ($this->column_search as $item) { // loop column 
            if(@$_POST['search']['value']) { // if datatable send POST for search
                if($i===0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }  else if(isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables(){
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all(){
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function get($id = null)
    {
        $this->db->select('customer.*,unit.unit_name as unit_name');
        $this->db->from('customer');
        $this->db->join('unit', 'unit.unit_id = customer.unit_id');
        if($id != null){
            $this->db->where('customer_id', $id);
        }
        $this->db->order_by('customer_id', 'desc');
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'customer_name' => $post['customer_name'],
            'unit_id' => $post['unit'],
            'email' => $post['email'],
            'phone' => $post['phone'],
            'address' => $post['address'],
        ];
        $this->db->insert('customer', $params);
    }

    public function edit($post){
        $params = [
            'customer_name' => $post['customer_name'],
            'unit_id' => $post['unit'],
            'email' => $post['email'],
            'phone' => $post['phone'],
            'address' => $post['address'],
            'updated' => date('Y-m-d'), 
        ];
        $this->db->where('customer_id', $post['id']);
        $this->db->update('customer', $params);
    }

    public function del($id){
        $this->db->where('customer_id', $id);
        $this->db->delete('customer');
    }

}
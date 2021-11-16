<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit_m extends CI_Model {

    var $table = 'unit'; //nama tabel dari database
    var $column_order = array(null, 'unit_name','tipe_unit','size_unit'); //field yang ada di table user
    var $column_search = array('unit_name','tipe_unit','size_unit'); //field yang diizin untuk pencarian 
    var $order = array('unit_id' => 'DESC'); // default order

    private function _get_datatables_query(){
         
        $this->db->from($this->table);
 
        $i = 0;
     
        foreach ($this->column_search as $item) // looping awal
        {
            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                 
                if($i===0) // looping awal
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
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

    function count_filtered(){
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all(){
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function get($id = null){
        $this->db->from('unit');
        if($id != null){
            $this->db->where('unit_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post){
        $params = [
            'unit_name' => $post['unit_name'],
            'tipe_unit' => $post['tipe_unit'],
            'size_unit' => $post['size_unit'],
        ];
        $this->db->insert('unit', $params);
    }

    public function edit($post){
        $params = [
            'unit_name' => $post['unit_name'],
            'tipe_unit' => $post['tipe_unit'],
            'size_unit' => $post['size_unit'],
            'updated' => date('Y-m-d'), 
        ];
        $this->db->where('unit_id', $post['id']);
        $this->db->update('unit', $params);
    }

    public function del($id){
        $this->db->where('unit_id', $id);
        $this->db->delete('unit');
    }




}
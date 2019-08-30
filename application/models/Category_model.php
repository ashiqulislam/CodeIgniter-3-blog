<?php 
class Category_model extends CI_Model {
    public function __construct(){
        $this->load->database();
    }

    public function get_category($id){
        $query = $this->db->get_where('categories', array('id'=>$id));
        return $query->row();
    }

    public function create_category(){
        return $this->db->insert('categories', ['name' => $this->input->post('name'), 'user_id'=> $this->session->userdata('user_id')]);
    }

    public function delete_category($id){
        $this->db->where('id', $id)->delete('categories');
        return true;
    }

    public function get_categories(){
       return $this->db->order_by('name')->get('categories')->result();
    }
}
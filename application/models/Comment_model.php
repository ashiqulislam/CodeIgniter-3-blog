<?php 
class Comment_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function create_comment($post_id){
        $data = [
            'post_id' => $post_id,
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'body' => $this->input->post('body'),
        ];

        return $this->db->insert('comments', $data);
    }

    public function get_comments($post_id){
        return $this->db->get_where('comments', [ 'post_id' => $post_id ])->result();
    }
}
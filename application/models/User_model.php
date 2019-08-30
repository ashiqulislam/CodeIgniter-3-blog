<?php 
class User_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function register($password){
        $data = [
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'password' => $password,
            'zipcode' => $this->input->post('zipcode'),
        ];

        return $this->db->insert('users', $data);
    }

    public function login($username){
        
        return $this->db->get_where('users', [ 'username' => $username])->row();
    }
}
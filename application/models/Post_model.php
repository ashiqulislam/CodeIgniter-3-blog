<?php 
class Post_model extends CI_Model {
    public function __construct(){
        $this->load->database();
    }

    public function get_posts($slug = FALSE, $limit = false, $offset = false){
        if($limit){
            $this->db->limit($limit, $offset);
        }
        if($slug == false){
            $this->db->order_by('posts.id', 'DESC');
            $this->db->join('categories', 'categories.id = posts.category_id');
            $query = $this->db->get('posts');
            return $query->result();
        }
        $query = $this->db->get_where('posts', array('slug'=>$slug));
        return $query->row();
    }

    public function create_post($post_image){
        $slug = url_title($this->input->post('title'));
        $data = [
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'body' => $this->input->post('body'),
            'category_id' => $this->input->post('category_id'),
            'user_id' => $this->session->userdata('user_id'),
            'post_image' => $post_image,
        ];

        return $this->db->insert('posts', $data);
    }

    public function delete_post($id){
        $this->db->where('id', $id)->delete('posts');
        return true;
    }

    public function update_post(){
        $slug = url_title($this->input->post('title'));
        $data = [
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'body' => $this->input->post('body'),
            'category_id' => $this->input->post('category_id'),
        ];
        return $this->db->where('id', $this->input->post('id'))->update('posts', $data);
    }

    public function get_categories(){
       return $this->db->order_by('name')->get('categories')->result();
    }

    public function get_post_by_category($category_id){
        $this->db->order_by('posts.id', 'DESC');
        $this->db->join('categories', 'categories.id = posts.category_id');
        $query = $this->db->get_where('posts', ['category_id' =>$category_id]);
        return $query->result();
    }
}
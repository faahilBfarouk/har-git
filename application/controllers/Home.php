<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Home_Model');
        $this->load->library('pagination');
    }

    public function index() {
        
        $this->load->view('Home');
    }

    public function Category() {
        $category = $this->uri->segment('3');
        $config = array();

        $config["base_url"] = base_url() . "home/Category/" . $category;
        $config["total_rows"] = $this->Home_Model->record_count($category);
        $config["per_page"] = 2;
        $config["uri_segment"] = 4;
        // custom paging configuration
        $config['num_links'] = 3;
        $config['use_page_numbers'] = TRUE;
        $config['reuse_query_string'] = TRUE;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = '1';
        $config['first_tag_open'] = '<li><a href="#" title="">';
        $config['first_tag_close'] = '</a></li>';
        $config['last_link'] = '3';
        $config['last_tag_open'] = '<li><a href="#" title="">';
        $config['last_tag_close'] = '</a></li>';
        $config['next_link'] = 'Next Page';
        $config['next_tag_open'] = '<li><a href="#" title=""><span>';
        $config['next_tag_close'] = '</span></a></li>';
        $config['prev_link'] = 'Prev Page';
        $config['prev_tag_open'] = '<li><a href="#" title=""><span>';
        $config['prev_tag_close'] = '</span></a></li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#" title="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li><a href="#" title="">';
        $config['num_tag_close'] = '</a></li>';

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["results"] = $this->Home_Model->
                fetch_categories($config["per_page"], $page, $category);
        $data["links"] = $this->pagination->create_links();
        $this->load->view('Category', $data);
    }

    public function Finance() {
        $result['title'] = $this->Home_Model->get_Finance();
        $this->load->view('Finance', $result);
    }

    public function Contact() {
        $head['head'] = $this->Home_Model->get_Head_Contact();
        $this->load->view('Contact', $head);
        //echo get_category();
    }

    public function true_value() {
        $result['cars'] = $this->Home_Model->get_true_cars();
        $this->load->view('true_value', $result);
    }

    public function Insurance() {
        $result['title'] = $this->Home_Model->get_Insurance_Info();

        $this->load->view('Insurance', $result);
    }

    public function car_details(){
        echo 'cardetails';
    }
    public function demo($id =null){
        echo '<pre>';
        print_r(get_cars());
        echo '<pre>';
        
    }
}

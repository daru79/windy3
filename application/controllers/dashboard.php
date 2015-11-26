<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller {
    public function __construct() {
        parent::__construct();
        
    }
    
    public function index() {
        $this->data['subview'] = 'dashboard/index_v';
        $this->load->view('layout_main_v', $this->data);
        
    }
    
}
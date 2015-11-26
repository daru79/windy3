<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
    public $data = array();
    
    function __construct() {
        parent::__construct();
        $this->data['errors'] = array();
        $this->data['site_name'] = config_item('site_name');
        
        $this->data['meta_title'] = 'Windy 3.0';
        $this->data['product'] = 'Windy';
        $this->data['version'] = '3.0';
        $this->load->model('employee_m');
        
    }
    
}
<?php

class Employee_m extends MY_Model {
    protected $_table_name = 'employee';
    protected $_primary_key = 'em_id'; // UWAGA! W oryginalnym 'user_m' nie ma tej składowej w ogóle
    protected $_primary_filter = 'intval'; // UWAGA! W oryginalnym 'user_m' nie ma tej składowej w ogóle // Filtr dla klucza głównego, aby rzutować go na liczbę całkowitą
    protected $_order_by = 'em_lname';
    protected $_timestamps = FALSE;
    public $rules = array( // Reguły walidacji, składowa powinna być publiczna aby móc ją załadować w kontrolerze 
        'email' => array(
            'field' => 'em_mail',
            'label' => 'E-mail',
            'rules' => 'trim|required|valid_email|xss_clean'
            
        ),
        
        'password' => array(
            'field' => 'em_pass',
            'label' => 'Hasło',
            'rules' => 'trim|required'
            
        )
        
    ); 
    
    
    public function __construct() {
        parent::__construct();
        
    }
    
    // Logowanie użytkownika
    public function login() {
        // Find the user and store him in a variable user
        $employee = $this->get_by(array(
            'em_mail' => $this->input->post('em_mail'),
            'em_pass' => $this->hash_salt($this->input->post('em_pass'))
            
        ), TRUE); // TRUE becouse we want a single employee object, and not an array of objects
        
        // Sprawdzenie czy są elementy w tablicy (czy znaleziono pracownika spełniającego ww. kryteria)
        if(count($employee)) {
            // Zaloguj pracownika i dodaj jego dane do zmiennej sesyjnej
            $data = array(
                'em_fname' => $employee->em_fname,
                'em_lname' => $employee->em_lname,
                'em_id' => $employee->em_id,
                'loggedin' => TRUE
                
            );
            
            $this->session->set_userdata($data);
            
        }
        
    }
    
    // Metoda sprawdzająca czy użytkownik jest zalogowany
    public function loggedin() {
        return (bool) $this->session->userdata('loggedin');
        
    }
    
    public function logout() {
        $this->session->sess_destroy();
        
    }
    
    public function hash_salt($string) {
        return hash('sha512', $string . config_item('encryption_key'));
        
    }
    
}
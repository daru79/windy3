<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee extends MY_Controller {
    public function __construct() {
        parent::__construct();
        
    }
    
    public function login() {
        // Przekierowanie zalogowanego (poprzez formularz) użytkownika
        // Ustawiamy domyślnie jako FALSE, ale gdyby się okazało '||' że jest zalogowany to przekierujemy go dalej
        // Redirect a user if he's already logged in
        $dashboard = 'dashboard';
        $this->employee_m->loggedin() == TRUE || redirect($dashboard);
        
        // Set form
        // Walidujemy dane z formularza (reguły walidacji są zapisane w 'employee_m', przypisujemy je do zmiennej '$rules' i je ustawiamy
        $rules = $this->employee_m->rules;
        $this->form_validation->set_rules($rules);
        
        // Process form
        // Przetwarzamy dane
        if($this->form_validation->run() == TRUE) {
            // Logujemy i przekierowujemy
            if($this->employee_m->login() == TRUE) { // Dodanie warunku jako dodatkowe zabezpieczenie
                redirect($dashboard);
                
            } else {
                // Wyświetlenie komunikatu o błędzie i odświeżenie strony logowania
                $this->session->set_flashdata('error', 'Niepoprawny e-mail i/lub hasło');
                redirect('employee/login', 'refresh');
            
            }
        
        }
        
        // Load the view
        $this->data['subview'] = 'employee/login_v'; // zdefiniowana ścieżka dostępu dla ciała 'modala' dla opcji 'login'
        $this->load->view('layout_modal_v', $this->data);
    
    }
    
}
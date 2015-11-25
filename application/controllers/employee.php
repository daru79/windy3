<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee extends MY_Controller {
    public function __construct() {
        parent::__construct();
        
    }
    
    public function login() {
        // Przekierowanie zalogowanego (poprzez formularz) użytkownika
        // Ustawiamy domyślnie jako FALSE, ale gdyby się okazało '||' że jest zalogowany to przekierujemy go dalej
        // Redirect a user if he's already logged in
        $dashboard = 'admin/dashboard';
        $this->employee_m->loggedin() == FALSE || redirect($dashboard);
        
        // Przetwarzamy 
        
    }
    
}
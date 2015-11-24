<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {
    protected $_table_name = '';
    protected $_primary_key = '';
    protected $_primary_filter = 'intval'; // Filtr dla klucza głównego, aby rzutować go na liczbę całkowitą
    protected $_order_by = '';
    public $rules = array(); // Reguły walidacji, składowa powinna być publiczna aby móc ją załadować w kontrolerze 
    protected $_timestamps = FALSE;
    
    public function __construct() {
        parent::__construct();
        
    }
    
    // Pobieranie danych
    public function get($id = NULL, $single = FALSE) { // Zakładamy domyślnie, że pobieramy wszystkie rekody
        if($id != NULL) {
            $filter_id = $this->_primary_filter;
            $id = $filter_id($id); // Rzutujemy wartość 'id' na liczbę całkowitą
            $this->db->where($this->_primary_key, $id);
            
            // Ustalamy metodę otrzymania wyniku, czyli 1 rekord
            $method = 'row';
            
        } else if($single = TRUE) {
            // Ustalamy metodę otrzymania wyniku, czyli 1 rekord
            $method = 'row';
            
        } else {
            // Ustalamy metodę otrzymania wyniku, czyli wszystkie rekody
            $method = 'result';
            
        }
        
        // Sortowanie wg. konkretnej kolumny
        $this->db->order_by($this->_order_by);
        
        return $this->db->get($this->_table_name)->$method();
        
    }
    
}
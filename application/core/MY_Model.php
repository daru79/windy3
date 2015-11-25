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
    
    // Pobieranie danych z warunkiem
    public function get_by($where, $single = FALSE) {
        $this->db->where($where);
        
        return $this->get(NULL, $single);
        
    }
    
    // Zapisywanie i edycja danych
    // If you pass an 'id' it will be an update, if not it will be an insert
    public function save($data, $id = NULL) {
        // Ustawienie timestamp'a
        if($this->_timestamps == TRUE) {
            $now = date('Y-m-d H:i:s'); // Ustawienie bieżacej daty i czasu
            $id || $data['created'] = $now; // Jeśli '$id' będzie miało wartość 'FALSE' przypisz do zmiennej '$data['created']' zmienną '$now'
            $data['modified'] = $now;
            
        }
        
        // Zapisanie nowego rekordu
        if($id === NULL) {
            // Dodatkowe sprawdzenie (?) czy jest ustawiona zmienna '$id'
            !isset($data[$this->_primary_key]) || $data[$this->_primary_key] = NULL; // jeśli jakimś cudem jest ustawiony '$id' jako 'primary key' to przypisz do niego wartość 'NULL'
            
            $this->db->set($data); // Ustawiamy wartości
            $this->db->insert($this->_table_name); // Wprowadzenie danych do danej tabeli
            $id = $this->db->insert_id(); // Zwraca 'id' wprowadzonego rekordu https://ellislab.com/codeigniter/user-guide/database/helpers.html
            
        }
        
        // Edycja rekordu
        else {
            $filter = $this->_primary_filter; // Ustawiamy filtr
            $id = $filter($id); // Filtrujemy otrzymane 'id' za pomocą rzutowania na liczbę całkowitą intval()
            $this->db->set(data); // Ustawiamy wartości
            $this->db->where($this->_primary_key, $id); // Ustawiamy warunek
            $this->db->update($this->_table_name); // Modyfikujemy rekord w tabeli na podstawie ww. warunku i dostarczonych danych
            
        }
        
        return $id;
        
    }
    
    public function delete($id) {
        $filter = $this->_primary_filter; // Ustawiamy filtr
        $id = $filter($id); // Filtrujemy otrzymane 'id' za pomocą rzutowania na liczbę całkowitą intval()
        
        // Zabezpieczenie na wypadek jeśli z 'id' byłoby coś nie tak ;)
        if (!$id) {
            return FALSE;
            
        }
        
        $this->db->where($this->_primary_key, $id); // Ustawiamy warunek
        $this->db->limit(1); // Ustawiamy limit na 1 rekord, aby dodatkowo się upewnić, że zostanie usunięty tylko 1 rekord
        $this->db->delete($this->_table_name); // Usunięcie rekordu z uwzględnieniem ww. warunków
        
    }
    
}
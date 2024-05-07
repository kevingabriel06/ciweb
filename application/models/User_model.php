<?php
class User_model extends CI_Model {

    public function register($username, $password) {
        // Insert user data into database
        $data = array(
            'username' => $username,
            'password' => $password // Hash the password before storing in real-world scenario
        );
        $this->db->insert('users', $data);
    }

    public function login($username, $password) {
        // Check if user exists in database and password is correct
        $query = $this->db->get_where('users', array('username' => $username, 'password' => $password));
        return $query->row_array(); // Return user data if login is successful
    }
    
    public function is_username_available($username) {
        $query = $this->db->get_where('users', array('username' => $username));
        return $query->num_rows() == 0; // Returns true if username is available
    }
    
}
?>

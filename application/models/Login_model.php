<?php
class Login_model extends CI_Model
{
    function can_login($email, $password)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        if($query->num_rows() > 0)
        {
            $user = $query->row();
            // Check if the password matches using password_verify
            if(password_verify($password, $user->password))
            {
                // Password matches, return TRUE
                return TRUE;
            }
            else
            {
                // Password doesn't match, return appropriate message
                return 'Incorrect password';
            }
        }
        else
        {
            // User with provided email not found
            return 'User not found';
        }
    
        // $this->db->where('email', $email);
        // $query = $this->db->get('users');
        // if ($query->num_rows() > 0) {
        //     foreach ($query->result() as $row) {
        //         /* Commenting out email verification
        //         if ($row->is_email_verified == 'yes') {
        //             $store_password = $this->encrypt->decode($row->password);
        //             if ($password == $store_password) {
        //                 $this->session->set_userdata('id', $row->id);
        //             } else {
        //                 return 'Wrong Password';
        //             }
        //         } else {
        //             return 'First verify your email address';
        //         }
        //         */
                
        //         // Without email verification, directly set session data
        //         $store_password = $this->encryption->decode($row->password);
        //         if ($password == $store_password) {
        //             $this->session->set_userdata('id', $row->id);
        //         } else {
        //             return 'Wrong Password';
        //         }
        //     }
        // } else {
        //     return 'Wrong Email Address';
        // }
    }

    public function get_user_id($email) {
        // Fetch the user ID based on the email address
        $this->db->select('id');
        $this->db->where('email', $email);
        $query = $this->db->get('users');

        if ($query->num_rows() > 0) {
            return $query->row()->id;
        } else {
            return NULL;
        }
    }
}
?>

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Database extends CI_Model {

	public function create($user)
    {
        return $this->db->query("INSERT INTO users (name, alias, email, password, birthdate, created_at) VALUES (?,?,?,?,?,NOW())", array($user['name'], $user['alias'], $user['email'], $user['password'], $user['birthdate']));
    }

    public function get_user($user)
    {
    	return $this->db->query("SELECT * FROM users WHERE email = ?", $user['email'])->row_array();
    }

    public function login($user)
	{
		$users=array('log_email'=>$user['log_email'], 'log_password'=>$user['log_password']);
    	$query = "SELECT * FROM users WHERE email = ? AND password = ?";
    	return $this->db->query($query, $users)->row_array();
	}

	public function get_quotes()
    {
    	$user=$this->session->userdata('user');
    	// var_dump($user); die();
    	return $this->db->query("SELECT quotes.id, user_id, author_quote, quote, users.alias, users.name FROM quotes
    								LEFT JOIN users on quotes.user_id=users.id
                                    WHERE quotes.id NOT IN (SELECT fave_quote.quote_id FROM fave_quote WHERE fave_quote.user_id=?)", $user['id'])->result_array();
    }

    public function fave_quotes($user)
    {
    	// var_dump($user); die();
    	return $this->db->query("SELECT quotes.id, quotes.user_id, author_quote, quote, users.alias, users.name FROM quotes
    								LEFT JOIN fave_quote on quotes.id=fave_quote.quote_id
    								LEFT JOIN users on quotes.user_id=users.id
    								WHERE fave_quote.user_id = ?", $user['id'])->result_array();
    }

    public function new_quote()
    {
    	$log_user=array('quote'=>$this->input->post(), 'user'=>$this->session->userdata('user'));
    	// var_dump($log_user); die();
    	return $this->db->query("INSERT INTO quotes (user_id, author_quote, quote, created_at) VALUES (?,?,?,NOW())", array($log_user['user']['id'], $log_user['quote']['author_quote'], $log_user['quote']['quote']));
    }

    public function add_quote($id)
    {
    	$user=$this->session->userdata('user');
    	// var_dump($user['id'], $id); die();
        return $this->db->query("INSERT INTO fave_quote (quote_id, user_id) VALUES (?,?)", array($id, $user['id']));
    }

    public function remove_quote($id)
    {
    	$user=$this->session->userdata('user');
    	// var_dump($user['id'], $id); die();
        return $this->db->query("DELETE FROM fave_quote WHERE quote_id = ? AND user_id = ?", array($id, $user['id']));
    }
}

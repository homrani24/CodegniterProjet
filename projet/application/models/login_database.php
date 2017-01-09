<?php
// Begin DWFE
Class Login_Database extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url_helper');
		$this->load->database();

	}

// enregistrement


	public function registration_insert($data) {



// Requête pour vérifier si le nom d'utilisateur existe déjà ou non
		$condition = "MAIL =" . "'" . $data['MAIL'] . "'";
		$this->db->select('*');
		$this->db->from('client');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			$data['MDP']=md5($data['MDP']);

// Requête pour insérer des données dans la base de données
			$this->db->insert('client', $data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}
		} else {
			return false;
		}
	}

// Lire les données à l'aide du nom d'utilisateur et son mot de passe
	public function login($data) {

		$condition = "MAIL =" . "'" . $data['MAIL'] . "' AND " . "MDP =" . "'" . md5($data['MDP']) . "'";
		$this->db->select('*');
		$this->db->from('client');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}

// Lire les données de la base de données pour afficher les données dans la page d'administration
	public function read_user_information($email) {

		$condition = "MAIL =" . "'" . $email . "'";
		$this->db->select('*');
		$this->db->from('client');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}

    function update_user($id,$data){
        $this->db->where('ID_CLIENT', $id);
        $this->db->update('client', $data);
    }
    public function read_user_information_id($id) {

        $condition = "ID_CLIENT =" . "'" . $id . "'";
        $this->db->select('*');
        $this->db->from('client');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

}
//End DWFE
?>
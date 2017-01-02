<?php
// Begin DWFE
Class Gestion_boutique extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->database();

    }

// enregistrement


    public function creerboutique($data)
    {


// Requête pour insérer des données dans la base de données
        $this->db->insert('boutique', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        }

    }
    public function read_boutique_information($id) {

        $condition = "ID_CLIENT =" . "'" . $id . "'";
        $this->db->select('*');
        $this->db->from('boutique');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function read_boutique($id) {

        $condition = "ID_BOUTIQUE =" . "'" . $id . "'";
        $this->db->select('*');
        $this->db->from('boutique');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function update_boutiquet($id,$data){
        $this->db->where('ID_BOUTIQUE', $id);
        $this->db->update('boutique', $data);
    }

}
//
//End DWFE
?>
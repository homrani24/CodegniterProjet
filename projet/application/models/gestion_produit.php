<?php
// Begin DWFE
Class Gestion_produit extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->database();

    }

    public function creerproduit($data)
    {


// Requête pour insérer des données dans la base de données
        $this->db->insert('produits', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        }

    }

    public function read_categorie_produit() {

        $this->db->select('*');
        $this->db->from('categories');
        $query = $this->db->get();

        if ($query->num_rows() >= 1) {
            return $query->result_array();

        } else {
            return false;
        }
    }

// Lire les données de la base de données pour afficher les données dans la page d'administration
    public function show_all_produits() {

       // $condition = "ID_CAT = " . $id ;
        $this->db->select('*');
        $this->db->from('produits');
        // $this->db->join('categories', 'produits.ID_CAT = categories.ID_CAT');
       // $this->db->where($condition);
        $query = $this->db->get();

        if ($query->num_rows() >= 1) {
            return $query->result_array();
        } else {
            return false;
        }
    }

// Lire les données de la base de données pour afficher les données dans la page d'administration
    public function show_produits_boutique($id) {

        $condition = "ID_BOUTIQUE = " . $id ;
        $this->db->select('*');
        $this->db->from('produits');
        // $this->db->join('categories', 'produits.ID_CAT = categories.ID_CAT');
        $this->db->where($condition);
        $query = $this->db->get();

        if ($query->num_rows() >= 1) {
            return $query->result_array();
        } else {
            return false;
        }
    }


// Lire les données de la base de données pour afficher les données dans la page d'administration
    public function recherche_produits($id) {

        $this->db->select('*');
        $this->db->from('produits');
        // $this->db->join('categories', 'produits.ID_CAT = categories.ID_CAT');
        $this->db->like('NOM_PROD', $id);
        $query = $this->db->get();

        if ($query->num_rows() >= 1) {
            return $query->result_array();
        } else {
            return false;
        }
    }
// Lire les données de la base de données pour afficher les données dans la page d'administration
    public function show_produits($id) {

        $condition = "ID_CAT = " . $id ;
        $this->db->select('*');
        $this->db->from('produits');
       // $this->db->join('categories', 'produits.ID_CAT = categories.ID_CAT');
        $this->db->where($condition);
        $query = $this->db->get();

        if ($query->num_rows() >= 1) {
            return $query->result_array();
        } else {
            return false;
        }
    }

// Lire les données de la base de données pour afficher les données dans la page d'administration
    public function show_produits_modifier($id) {

        $condition = "ID_PROD = " . $id ;
        $this->db->select('*');
        $this->db->from('produits');
        // $this->db->join('categories', 'produits.ID_CAT = categories.ID_CAT');
        $this->db->where($condition);
        $query = $this->db->get();

        if ($query->num_rows() >= 1) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    function delete_produit($id){
        $this->db->where('ID_PROD', $id);
        $this->db->delete('produits');
    }
    function update_produit($id,$data){
        $this->db->where('ID_PROD', $id);
        $this->db->update('produits', $data);
    }


}
//
//End DWFE
?>
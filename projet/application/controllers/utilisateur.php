<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Utilisateur extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('gestion_produit');

        $this->load->library('upload');
    }

    public function index()
    {
        $this->load->model("Gestion_produit");
        $data['categorie'] = $this->Gestion_produit->read_categorie_produit();
        $data['produit'] = $this->Gestion_produit->show_all_produits();
        $this->load->view('utilistateur/header',$data);
        $this->load->view('utilistateur/index',$data);
        $this->load->view('utilistateur/footer');
    }
    public function produits_show($id)
    {

        $this->load->model("Gestion_produit");
        $data['categorie'] = $this->Gestion_produit->read_categorie_produit();
        $data['produit'] = $this->Gestion_produit->show_produits($id);
        $data['identifiant']=$id;
        $this->load->view('utilistateur/header',$data);
        $this->load->view('utilistateur/index',$data);
        $this->load->view('utilistateur/footer');

    }


// Valider et stocker les données d'enregistrement dans la base de données


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
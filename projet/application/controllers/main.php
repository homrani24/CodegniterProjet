<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {



    public function index()
    {
     //   $this->load->view('header');
        $this->load->view('login');
        //$this->load->view('newsfeed');
        $this->load->view('footer');

    }

    public function register()
    {
        //   $this->load->view('header');
        $this->load->view('register');
        //$this->load->view('newsfeed');
        $this->load->view('footer');

    }
   public function acceuil()
    {

        $this->load->model("Gestion_produit");
        $data['produit'] = $this->Gestion_produit->show_all_produits();
        $data['categorie'] = $this->Gestion_produit->read_categorie_produit();

        $this->load->view('header',$data);
        $this->load->view('index');
        $this->load->view('footer');

    }
    public function creer_boutique()
    {

        $this->load->model("Gestion_produit");
        $data['categorie'] = $this->Gestion_produit->read_categorie_produit();

        $this->load->view('header',$data);
        $this->load->view('boutique');
        $this->load->view('footer');

    }
    public function vendre()
    {

        $this->load->model("Gestion_produit");
        $data['categorie'] = $this->Gestion_produit->read_categorie_produit();

        $this->load->view('header',$data);
        $this->load->view('boutique');
        $this->load->view('footer');

    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
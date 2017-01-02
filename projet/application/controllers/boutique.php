<?php
// Begin DWFE
//session_start(); //nous devons démarrer la session afin d'y accéder via CI

Class Boutique extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->helper('form');
        $this->load->library('form_validation');

       $this->load->model('gestion_boutique');
    }

// Afficher la page de connexion
    public function index()
    {
        $this->load->view('boutique');
        $this->load->view('footer');
    }

    public function modifier_bout($id)
    {
        $this->load->model("Gestion_boutique");

        $data['boutique'] = $this->Gestion_boutique->read_boutique($id);


        $this->load->model("Gestion_produit");

        $data['categorie'] = $this->Gestion_produit->read_categorie_produit();

        $this->load->view('header',$data);

        $this->load->view('modifier_boutique',$data);
        $this->load->view('footer');
    }


// Valider et stocker les données d'enregistrement dans la base de données
    public function new_boutique()
    {

// Vérifier la validation les données entrées par l'utilisateur
        $this->form_validation->set_rules('nom', 'Nom boutique', 'trim|required|xss_clean');
        $this->form_validation->set_rules('description', 'description boutique', 'trim|required|xss_clean');
        $this->form_validation->set_rules('id', 'description boutique', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header');
            $this->load->view('boutique');
            $this->load->view('footer');
        } else {

            $data = array(
                'ID_CLIENT' => $this->input->post('id'),
                'NOM_BOUTIQUE' => $this->input->post('nom'),
                'DESCRIPTION_BOUT' => $this->input->post('description'),
                'DATE_CRIATION' => date('Y-m-d'),
            );
            $result = $this->gestion_boutique->creerboutique($data);

            if ($result == TRUE) {
                $data['message_display'] = 'le boutique est creer !';
             //   $this->load->view('authentification/logout', $data)
                redirect('authentification/logout');

            } else {
                $data['message_display'] = 'le boutique n est pas creer';
               // $this->load->view('authentification/logout', $data);
                redirect('authentification/logout');
            }
        }
    }

//--------------------------

// Valider et stocker les données d'enregistrement dans la base de données
    public function modifier_boutique($id)
    {

// Vérifier la validation les données entrées par l'utilisateur
        $this->form_validation->set_rules('nom', 'Nom boutique', 'trim|required|xss_clean');
        $this->form_validation->set_rules('description', 'description boutique', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            redirect('boutique/gestion_boutique/'.$id);

        } else {

            $data = array(
                'NOM_BOUTIQUE' => $this->input->post('nom'),
                'DESCRIPTION_BOUT' => $this->input->post('description')
            );
            $result = $this->gestion_boutique->update_boutiquet($id,$data);

            if ($result == TRUE) {
                $data['message_display'] = 'le boutique est creer !';
                //   $this->load->view('authentification/logout', $data)
                redirect('boutique/gestion_boutique/'.$id);

            } else {
                $data['message_display'] = 'le boutique n est pas creer';
                // $this->load->view('authentification/logout', $data);
                redirect('boutique/gestion_boutique/'.$id);
            }
        }
    }
    //-----------------------
    public function gestion_boutique($id)
    {

        $this->load->model("Gestion_boutique");

        $data['boutique'] = $this->Gestion_boutique->read_boutique($id);


        $this->load->model("Gestion_produit");
        $data['produit'] = $this->Gestion_produit->show_produits_boutique($id);

        $data['categorie'] = $this->Gestion_produit->read_categorie_produit();

        $this->load->view('header',$data);
        $this->load->view('gestion_boutique',$data);
        $this->load->view('footer');

    }
}

// End DWFE
?>
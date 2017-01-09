<?php
// Begin DWFE
//session_start(); //nous devons démarrer la session afin d'y accéder via CI

Class Authentification extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');

        $this->load->model('login_database');
        $this->load->model('gestion_boutique');
    }

// Afficher la page de connexion
    public function index()
    {
        $this->load->view('login');
        $this->load->view('footer');
    }

// Afficher la page d'inscription
    public function user_registration_show()
    {
        $this->load->view('index');

    }

// Valider et stocker les données d'enregistrement dans la base de données
    public function new_user_registration()
    {

// Vérifier la validation les données entrées par l'utilisateur
        $this->form_validation->set_rules('nom', 'Nom d\'utilisateur', 'trim|required|xss_clean');
        $this->form_validation->set_rules('prenom', 'Prenom d\'utilisateur', 'trim|required|xss_clean');
        $this->form_validation->set_rules('adresse', 'adresse', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email_value', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Mot de passe', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('register');
        } else {

            $data = array(
                'NOM_CLIENT	' => $this->input->post('nom'),
                'PRENOM_CLIENT' => $this->input->post('prenom'),
                'ADRESSE_CLIENT' => $this->input->post('adresse'),
                'MAIL' => $this->input->post('email_value'),
                'MDP' => $this->input->post('password')
            );
            $result = $this->login_database->registration_insert($data);

            if ($result == TRUE) {
                $data['message_display'] = 'Inscription réussie !';
                $this->load->view('login', $data);
            } else {
                $data['message_display'] = 'Nom d\'utilisateur existe déjà!';
                $this->load->view('register', $data);
            }
        }
    }



    // Vérifier la connexion de l'utilisateur
    public function user_login_process()
    {

        $this->form_validation->set_rules('email', 'email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Mot de passe', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            if (isset($this->session->userdata['logged_in'])) {


                redirect("main/acceuil");


            } else {
                $this->load->view('login');
            }
        } else {
            $data = array(
                'MAIL' => $this->input->post('email'),
                'MDP' => $this->input->post('password')
            );


            $result = $this->login_database->login($data);


            if ($result == TRUE) {

                $email = $this->input->post('email');
                $result = $this->login_database->read_user_information($email);
                $id = $result[0]->ID_CLIENT;

                $result2=$this->gestion_boutique->read_boutique_information($id);
                $id_boutique=$result2[0]->ID_BOUTIQUE;
                       if(!isset($id_boutique)){
                           $id_boutique='vide';
                       }
                echo $result[0]->MAIL;
                if ($result != false) {
                    $session_data = array(
                        'email' => $result[0]->MAIL,
                        'nom' => $result[0]->NOM_CLIENT,
                        'user_id' => $result[0]->ID_CLIENT,
                        'id_boutique' => $id_boutique
                    );
                    // Ajouter des données utilisateur à la session

                    $this->session->set_userdata('logged_in', $session_data);
                    redirect("main/acceuil");
                   // $this->load->view('index');

                }
            } else {
                $data = array(
                    'error_message' => 'Nom d\'utilisateur ou mot de passe non valide'
                );
                $this->load->view('login', $data);
            }
        }
    }
// edit user
    public function edit_user_info($id)
    {

// Vérifier la validation les données entrées par l'utilisateur
        $this->form_validation->set_rules('nom', 'Nom d\'utilisateur', 'trim|required|xss_clean');
        $this->form_validation->set_rules('prenom', 'Prenom d\'utilisateur', 'trim|required|xss_clean');
        $this->form_validation->set_rules('adresse', 'adresse', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email_value', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Mot de passe', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            //$this->load->view('register');
            redirect('authentification/modifier_user/'.$id);

        } else {

            $data = array(
                'NOM_CLIENT	' => $this->input->post('nom'),
                'PRENOM_CLIENT' => $this->input->post('prenom'),
                'ADRESSE_CLIENT' => $this->input->post('adresse'),
                'MAIL' => $this->input->post('email_value'),
                'MDP' => md5($this->input->post('password'))
            );
            $result = $this->login_database->update_user($id,$data);

            if ($result == TRUE) {
                $data['message_display'] = 'Inscription réussie !';
                //$this->load->view('authentification/edit_user_info/'.$id);
                redirect('authentification/modifier_user/'.$id);

            } else {
                $data['message_display'] = 'Nom d\'utilisateur existe déjà!';
               // $this->load->view('authentification/edit_user_info/'.$id);
                redirect('authentification/modifier_user/'.$id);
            }
        }
    }


// Déconnexion de la page d'administration
    public function logout() {

// Suppression de données de la session

        $sess_array = array(
            'username' => ''
        );
        $this->session->unset_userdata('logged_in', $sess_array);
//        $data['message_display'] = 'Déconnexion réussie';


      //  $this->load->view('login', $data);
        redirect("cart/remove/logout");

    }

    public function modifier_user($id)
    {
        $this->load->model("Gestion_produit");
        $this->load->model("Login_Database");
        $data['user'] = $this->Login_Database->read_user_information_id($id);
        $data['categorie'] = $this->Gestion_produit->read_categorie_produit();
        $this->load->view('header',$data);
        $this->load->view('edit_user',$data);
        $this->load->view('footer');
    }
}

// End DWFE
?>
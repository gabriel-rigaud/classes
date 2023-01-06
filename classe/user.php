<?php
class User {
    private $id;
    public $login;
    public $email;
    public $prenom;
    public $nom;

    // Constructeur pour initialiser les attributs de l'objet
    public function __construct($id, $login, $email, $prenom, $nom) {
        $this->id = $id;
        $this->login = $login;
        $this->email = $email;
        $this->$prenom = $prenom;
        $this->$nom = $nom;
    }
}
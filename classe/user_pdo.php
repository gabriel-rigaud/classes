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
$this->prenom = $prenom;
$this->nom = $nom;
}

// Méthode pour créer un nouvel utilisateur dans la base de données
public function create() {
// Connectez-vous à la base de données
$db_username = "username";
$db_password = "password";
$db_name = "database_name";
$db_server = "localhost";

$dsn = "mysql:host=$db_server;dbname=$db_name";
$pdo = new PDO($dsn, $db_username, $db_password);

// Préparez une requête d'insertion
$sql = "INSERT INTO users (login, email, prenom, nom) VALUES (:login, :email, :prenom, :nom)
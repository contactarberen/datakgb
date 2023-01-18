<?php
  class Admin {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    // Regsiter admin
    public function register($data){
      $this->db->query('INSERT INTO admins (email, motPasse) VALUES(:email, :motPasse)');
      // Bind values
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':motPasse', $data['password']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    // Login Admin
    public function login($email, $password){
      $this->db->query('SELECT * FROM admins WHERE email = :email');
      $this->db->bind(':email', $email);

      $row = $this->db->single();

      $hashed_password = $row->motPasse;
      if(password_verify($password, $hashed_password)){
        return $row;
      } else {
        return false;
      }
    }

    // Find admin by email
    public function findAdminByEmail($email){
      $this->db->query('SELECT * FROM admins WHERE email = :email');
      // Bind value
      $this->db->bind(':email', $email);

      $row = $this->db->single();

      // Check row
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }

    // Get Admin by ID
    public function getAdminById($id){
      $this->db->query('SELECT * FROM admins WHERE idAdmin = :id');
      // Bind value
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      return $row;
    }
  }
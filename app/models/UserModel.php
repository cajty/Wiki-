<?php 


namespace App\models;

use App\core\Database;
use PDO;


class UserModel extends Database{
   
    private $firstname;
    private $lastname;
    private $email;
    private $password;
    private $isAdmin;

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }
    public function getFirstname()
    {
        return $this->firstname;
    }
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }
    public function getLastname()
    {
        return $this->lastname;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function setIsAdmin($b)
    {
        $this->isAdmin = $b;
    }
    public function getIsAdmin()
    {
        return $this->isAdmin;
    }


    public function registerUser()
    {
        $conn =  $this->connect();
        $sql = "INSERT INTO `users`(`first_name`, `last_name`, `email`, `password`, `isAdmin`) VALUES (:firstname, :lastname,:email ,:hashedPassword, :isAdmin )";

        $query = $conn->prepare($sql);
        $query->bindValue(':firstname',  $this->getFirstname());
        $query->bindValue(':lastname', $this->getLastname());
        $query->bindValue(':hashedPassword',$this->getPassword());
        $query->bindValue(':email', $this->getEmail());
        $query->bindValue(':isAdmin', $this->getIsAdmin());
        
        $query->execute();
        if ($query) {
            return true;
        }else {
            return false; 
        }
    }
    

    public function loginUser()
    {
        $conn =  $this->connect();
        $sql = "SELECT * FROM `users` where email = :email";
        $query = $conn->prepare($sql);
        $query->bindValue(':email',$this->getEmail());
        $query->execute();
        $result = $query->fetch(PDO::FETCH_OBJ);
        if ($result && $result->password == $this->getPassword() ) {

            return $result;
        } else {
            return false; 
        }
    }



}
<?php 
class RegisterUser{

    private $username;

    private $raw_password;

    private $encrypted_password;

    private $email; 

    private $hometown; 
    private $bday;

    public $error;

    public $success;

    private $storage = "data.json";

    private $stored_users;

    private $new_user;

    public function __construct($username, $password, $email, $hometown,$bday){
        $this->username = trim($username);
        $this->username = filter_var($this->username, FILTER_SANITIZE_STRING);

        $this->raw_password = filter_var(trim($password), FILTER_SANITIZE_STRING);
        $this->encrypted_password = password_hash($this->raw_password, PASSWORD_DEFAULT);

        $this->email = trim($email);
        $this->email = filter_var($this->email, FILTER_SANITIZE_STRING);

        $this->hometown = trim($hometown);
        $this->hometown = filter_var($this->hometown, FILTER_SANITIZE_STRING);

        
        $this->bday = trim($bday);
        $this->bday = filter_var($this->bday, FILTER_SANITIZE_STRING);


        $this->stored_users = json_decode(file_get_contents($this->storage), true);
        $this->new_user = [
            "username" => $this->username,
            "password" => $this->encrypted_password,
            "email" => $this->email,
            "hometown" => $this->hometown,
            "bday" => $this->bday,
        ];

        if ($this->checkFieldValues()) {
            $this->insertUser();
        }
    }

    private function checkFieldValues(){
        if (empty($this->username) || empty($this->raw_password)){
            $this->error = "Both fields are required.";
            return false;
        } else {
            return true;
        }
    }

    private function usernameExists(){
        if ($this->stored_users !== null) {
            foreach ($this->stored_users as $user) {
                if ($this->username == $user["username"]) {
                    $this->error = "Username already taken.";
                    return true;
                }
            }
        }
        return false;
    }

    private function insertUser(){
        if ($this->usernameExists() == false) {
            $this->stored_users = $this->stored_users ?? [];
            array_push($this->stored_users, $this->new_user);
            if (file_put_contents($this->storage, json_encode($this->stored_users, JSON_PRETTY_PRINT))) {
                $this->success = "Successfully registered.";
            } else {
                $this->error = "Failed to register.";
            }
        }
    }
}
?>

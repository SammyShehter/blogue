<?php 

class User{
    private $db;

    public function __construct($db){
        $this->db = $db;
    }

    public function is_logged_in(){
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
            return true;
        }
    }

    // public function create_hash($value){
    //     return $hash = password_hash($value, PASSWORD_DEFAULT);
    // }

    private function get_user_hash($username){

        try{

            $stmt = $this->db->prepare('SELECT password FROM blogue_member WHERE username =:username');
            $stmt->execute(array('username' => $username));
            $row = $stmt->fetch();
            return $row['password'];

        } catch(PDOException $e) {
            echo "<p class='error'>".$e->getMessage()."</p>";
        }
    }

    public function login($username, $password){

        $hash = $this->get_user_hash($username);

        if(password_verify($password, $hash) == 1){
            $_SESSION['loggedin'] = true;

            return true;
        }

    }

    public function logout(){
        session_destroy();
    }
}
?>
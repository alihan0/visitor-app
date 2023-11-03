<?php 

class visitor{
    public function index(){
        require("app/connect/db.php");
        if(isset($_SESSION["login"])){
            $query = $db->query("SELECT * FROM accounts WHERE id = '{$_SESSION['uid']}'")->fetch(PDO::FETCH_ASSOC);
            if($query["type"] == "ADMIN"){
                redirect("/home");
                echo "admin";
            }else{
                redirect("/staff");
            }
        }else{
            redirect("/login");
        }
    }
    public function sessions(){
        session_start();
        print_r($_SESSION);
    }

    public function card(){
        view("visitorCard","theme");
    }

    public function show(){
        view("showVisit","theme");
    }

    public function control(){
        view("visitor","theme");
    }

    

}
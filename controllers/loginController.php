<?php
require_once('Controller.php');

class loginController extends Controller {

    public function __construct() {

    }

    public function login() {
        $oLoginModel = $this->loadModel('loginModel');

        if (isset($_POST['login'])) {
            $userId = $oLoginModel->userExists($_POST['pseudo'], md5($_POST['password']));

            if ($userId > 0) {
                $_SESSION['userid'] = $userId;
                if (!empty($_GET[2])) {
                    header('location:../chatmvc/chat/chatIndex/'.$_GET[2]);
                } else {
                    header('location:../chatmvc//chat/chatIndex/1');
                }
            }
        }
 
        $this->render('loginView');

    }

    public function signup() {
        $oLoginModel = $this->loadModel('loginModel');

        if (isset($_POST['signup'])) {
            $usersignup = $oLoginModel->userSignup($_POST['pseudo'], $_POST['email'], md5($_POST['password']));

            if ($usersignup > 0) {
                $_SESSION['userid'] = $usersignup;
                header('location:../chatmvc/chat/chatIndex/1');
                }
        }
        $this->render('signupView');
    }

    public function forgotPassword() {
        $oLoginModel = $this->loadModel('loginModel');

        if(isset($_POST['forgotPassword'])) {
    		if (TRUE === $oLoginModel->forgotPassword($_POST['email'],md5($_POST['npassword']))) {
    			header('location:login');
    		}
    	}

        $this->render('forgotPasswordView');
    }
}
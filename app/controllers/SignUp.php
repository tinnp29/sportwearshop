<?php
    class SignUp extends Controller{

        public function __construct() {
            $this->helper("link");

            $this->accountModel = $this->model("AccountModel");
        }

        public function index() {

            $this->viewClient("signup", [
                "title" => "__hoamattroi | Đăng Ký"
            ]);

        }

        public function signUp() {

            // Get Input
            $accountInfo = [
                'firstName'     => $this->checkInput('first_name'),
                'lastName'      => $this->checkInput('last_name'),
                'email'         => $this->checkInput('email'), 
                'password'      => $this->checkInput('password'),
                'rePassword'    => $this->checkInput('re_password'),
                'firstNameErr'  => '',  
                'lastNameErr'   => '',  
                'emailErr'      => '',  
                'passwordErr'   => '',  
                'rePasswordErr' => '',  
            ];
            
            if(empty($accountInfo['firstName'])) {
                $accountInfo['firstNameErr'] = "Họ không được để trống !";
            }

            if(empty($accountInfo['lastName'])) {
                $accountInfo['lastNameErr'] = "Tên không được để trống !";
            }

            if(empty($accountInfo['email'])) {
                $accountInfo['emailErr'] = "Email không được để trống !";
            } else {
                if(!$this->accountModel->checkEmail($accountInfo['email'])) {
                    $accountInfo['emailErr'] = "Email đã tồn tại !";
                }
            }

            if(empty($accountInfo['password'])) {
                $accountInfo['passwordErr'] = "Mật khẩu không được để trống !";
            }

            if(empty($accountInfo['rePassword'])) {
                $accountInfo['rePasswordErr'] = "Mật khẩu không được để trống !";
            } elseif($accountInfo['rePassword'] !== $accountInfo['password']) {
                $accountInfo['rePasswordErr'] = "Mật khẩu không trùng khớp !";
            }

            if(empty($accountInfo['firstNameErr']) && empty($accountInfo['lastNameErr']) &&
               empty($accountInfo['emailErr'])     && empty($accountInfo['passwordErr']) &&
               empty($accountInfo['rePasswordErr'])) {
            
                $password = password_hash($accountInfo['password'], PASSWORD_DEFAULT);
                $dataValid = [$accountInfo['firstName'], $accountInfo['lastName'], 
                             $accountInfo['email'], $password]; 
                 
                if($this->accountModel->signUp($dataValid)) {
                    
                    $this->setFlash("signupSuccess", "Đăng ký tài khoản thành công !");   
                    $this->redirect("SignIn");

                }

            } else {
                $this->viewClient('signup', $accountInfo);
            }

        }
    }
?>
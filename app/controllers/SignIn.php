<?php
    class SignIn extends Controller {

        public function __construct() {
            $this->helper("link");

            $this->accountModel = $this->model("AccountModel");
        }
        
        public function index() {
            
            $this->viewClient("signin", [
                "title" => "__hoamattroi | Đăng Nhập"
            ]);
        }

        public function signIn() {
            // Get Input
            $accountInfo = [
                'email'         => $this->checkInput('email'), 
                'password'      => $this->checkInput('password'), 
                'emailErr'      => '',  
                'passwordErr'   => ''
            ];

            if(empty($accountInfo['email'])) {
                $accountInfo['emailErr'] = "Email không được để trống !";
            }
            if(empty($accountInfo['password'])) {
                $accountInfo['passwordErr'] = "Mật khẩu không được để trống !";
            }

            if(empty($accountInfo['emailErr']) && empty($accountInfo['passwordErr'])) {
                 
                $result = $this->accountModel->signIn($accountInfo['email'], $accountInfo['password']);
        
                if($result['status'] === 'emailIncorrect') {
                    
                    $accountInfo['emailErr'] = "Email không chính xác, vui lòng kiểm tra lại !";
                    $this->viewClient('signin', $accountInfo);
                    
                } elseif($result['status'] === 'passwordIncorrect') {
                    
                    $accountInfo['passwordErr'] = "Mật khẩu không chính xác !";
                    $this->viewClient('signin', $accountInfo);

                } elseif($result['status'] === 'ok') {
                    
                    // print_r($result);
                    $this->setSession('accountId', $result['accountId']);
                    $this->setSession('firstName', $result['firstName']);
                    $this->setSession('lastName', $result['lastName']);
                    $this->setSession('roleName', $result['roleName']);

                    if($result['role'] == 1) {

                        $this->redirect('administrator');

                    } elseif($result['role'] == 2) {
                        
                        echo "Nhân Viên";

                    } else {

                        $this->redirect('home');

                    }
                }


            } else {
                $this->viewClient('signin', $accountInfo);
            }

        }

        public function logOut() {
            $this->destroySession();
            $this->redirect("signin");
        }

    }
?>
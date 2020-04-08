<?php
    class Profile extends Controller {

        public function __construct() {
            $this->helper("link");
            
            $this->profileModel = $this->model("ProfileModel");
            $this->accountModel = $this->model("AccountModel");
        }

        public function index() {
            $result = $this->profileModel->getPersonalInfo($this->getSession("accountId"));

            $this->viewServer("index", [
                "title"       => "__hoamattroi | Thông Tín Cá Nhân",
                "page"        => "profile",
                "dataAccount" => $result
            ]);
        }

        public function update() {

            $accountId = $this->getSession('accountId');

            if(isset($_POST['updateBtn'])) {
            
                // Get Input
                $accountInfo = [
                    'firstName'     => $this->checkInput('first_name'),
                    'lastName'      => $this->checkInput('last_name'),
                    'firstNameErr'  => '',  
                    'lastNameErr'   => ''
                ];

                if(empty($accountInfo['firstName'])) {
                    
                    $accountInfo['firstNameErr'] = "Họ không được để trống !";
                }
                if(empty($accountInfo['lastName'])) {
                    $accountInfo['lastNameErr'] = "Tên không được để trống !";
                }

                if(empty($accountInfo['firstNameErr']) && empty($accountInfo['lastNameErr'])) {
                    
                    $updateData = [$accountInfo['firstName'], $accountInfo['lastName'], $accountId];
                    
                    if($this->profileModel->update($updateData)) {
                        
                        $this->setFlash("updateSuccess", "Cập nhật tài khoản thành công !");
                        $this->redirect("Profile");

                    }
                    
                } else {
                    $this->setFlash("firstNameErr", $accountInfo['firstNameErr']);
                    $this->setFlash("lastNameErr", $accountInfo['lastNameErr']);
                    $this->redirect("Profile");
                }


            }

        }

    }
?>
<?php
    class ProfileModel extends Database {

        public function getPersonalInfo($accountId) {
         
            if($this->query("SELECT * FROM accounts WHERE account_id = ?", [$accountId])) {
                
                if($this->rowCount() > 0) {
                    $row = $this->fetch();
                    
                    $accId = $row->account_id;
                    $firstName = $row->first_name;
                    $lastName = $row->last_name;
                    $email = $row->email;
                    $password = $row->password;
                    $role = $row->role_id;
                    $roleName = $row->role_name;

                    return ["accountId" => $accId,
                            "firstName" => $firstName,
                            "lastName"  => $lastName,
                            "email"     => $email,
                            "password"  => $password,
                            "role"      => $role,
                            "roleName"  => $roleName];
                }

            };

        }

        public function update($updateData) {

            if($this->query("UPDATE accounts
                            SET first_name = ?, last_name = ?
                            WHERE account_id = ?", $updateData)) {

                return true;

            }

        }

    }
?>
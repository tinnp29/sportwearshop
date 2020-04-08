<?php
    class AccountModel extends Database {

        public function signUp($data) {
            
            $result = false;

            if($this->query("INSERT INTO accounts(first_name, last_name, email, password)
            VALUES (?, ?, ?, ?)", $data)) {
                $result = true;
            };

            return json_encode($result);

        }


        public function checkEmail($email) {
            if($this->query("SELECT email FROM accounts WHERE email = ?", [$email])) {
                if($this->rowCount() > 0) {
                    return false;
                } else {
                    return true;
                }
            }
        }

        public function signIn($email, $password) {

            if($this->query("SELECT * FROM accounts a
                            JOIN roles r ON a.role_id = r.role_id
                            WHERE email = ? ", [$email])) {

                if($this->rowCount() > 0) {

                    // Trả về một data row
                    $row = $this->fetch();

                    $accountId = $row->account_id;
                    $firstName = $row->first_name;
                    $lastName = $row->last_name;
                    $dbPassword = $row->password;
                    $role = $row->role_id;
                    $roleName = $row->role_name;

                    if(password_verify($password, $dbPassword)) {

                        return ["status"    => "ok",
                                "accountId" => $accountId,
                                "firstName" => $firstName,
                                "lastName"  => $lastName,
                                "role"      => $role,
                                "roleName"  => $roleName];

                    } else {
                        return ["status" => "passwordIncorrect"];
                    }

                } else {
                    return ["status" => "emailIncorrect"];
                }

            }

        }


        public function getAllAccount($accountId) {

            if($this->query("SELECT * FROM accounts a
                            JOIN roles r
                                ON a.role_id = r.role_id 
                            WHERE account_id <> ?
                            ORDER BY last_name ASC", [$accountId])) {

                    $data = $this->fetchAll();
                    return $data;

            }

        }

    }
?>
<?php
    class CategoriesModel extends Database {
        
        public function getAllCategories() {
            
            if($this->query("SELECT
                                c.category_id,
                                c.category_name as category_child, 
                                cc.category_name as category_parent 
                            FROM categories c 
                            JOIN categories cc 
                                ON c.parent_id = cc.category_id
                            ORDER BY category_child ASC")) {
                
                    return $this->fetchAll();

            }

        }

        public function getCateParent() {

            if($this->query("SELECT * FROM categories
                            WHERE parent_id = 0")) {
                
                $data = $this->fetchAll();

            }
            // return json_encode($data);
            return $data;

        }

        public function addCateParent($cateParent) {

            $result = fasle;

            if($this->query("INSERT INTO categories(category_name)
                            VALUES (?)", [$cateParent])) {
                $result = true;
            }

            return json_encode($result);

        }

        public function addCateChild($data) {

            $result = fasle;

            if($this->query("INSERT INTO categories(category_name, parent_id)
                            VALUES (?, ?)", $data)) {
                $result = true;
            }

            return json_encode($result);

        }

    }
?>
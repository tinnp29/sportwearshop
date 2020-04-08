<?php
    class Categories extends Controller {

        public function __construct() {
            $this->helper("link");
            
            $this->categoriesModel = $this->model("CategoriesModel");
        }

        public function index() {
            $data = $this->categoriesModel->getAllCategories();
            $dataCatePar = $this->categoriesModel->getCateParent();

            $this->viewServer("index", [
                "title"       => "__hoamattroi | Danh Mục Sản Phẩm",
                "page"        => "categories",
                "categories" => $data,
                "dataCatePar" => $dataCatePar
            ]);
        }

        public function Add() {
            
            if(isset($_POST["addParentBtn"])) {
                $categoryParent = $this->checkInput("category_par");
                $categoryParentErr = '';

                if(empty($categoryParent)) {
                    $categoryParentErr = "Không được để trống !";
                }

                if(empty($categoryParentErr)) {
                    
                    if($this->categoriesModel->addCateParent($categoryParent)) {

                        $this->setFlash("addCateParSuccess", "Thêm thành công !");   
                        $this->redirect("Categories");

                    }

                } else {

                    $this->setFlash("addCateParErr", $categoryParentErr);   
                    $this->redirect("Categories");

                }

            } elseif(isset($_POST["addChildBtn"])) {
                
                $category = [
                    "cateChild"     => $this->checkInput("category_child"),
                    "catePar"       => $this->checkInput("cate_par"),
                    "cateChildErr"  => "",
                    "cateParErr"    => "",
                ];

                if(empty($category["cateChild"])) {
                    $category["cateChildErr"] = "Không được để trống !";
                }

                if(empty($category["catePar"])) {
                    $category["cateParErr"] = "Chưa được chọn !";
                }

                if(empty($category["cateChildErr"]) && empty($category["cateParErr"])) {
                    
                    $cateData = [$category["cateChild"], $category["catePar"]];

                    if($this->categoriesModel->addCateChild($cateData)) {

                        $this->setFlash("addCateChildSuccess", "Thêm thành công !");   
                        $this->redirect("Categories");

                    }

                } else {

                    $this->setFlash("cateChildErr", $category["cateChildErr"]);   
                    $this->setFlash("selectErr", $category["cateParErr"]);   
                    $this->redirect("Categories");

                }
            }

        }

    }
?>
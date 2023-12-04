<?php

namespace app\Controller;

include "app/Models/Category.php";

use app\Models\Category;
use app\Traits\ApiResponseFormatter as CategoryApiResponseFormatter;

class CategoryController
{    
    use CategoryApiResponseFormatter;

    public function indexCategory()
    {
        $categoryModel = new Category();        
        $response = $categoryModel->getCategory();
        return $this->apiResponse(200, "success", $response);
    }

    public function getCategoryById($id)
    {
        $categoryModel = new Category();
        $response = $categoryModel->getCategoryById($id);
        return $this->apiResponse(200, "success", $response);
    }

    public function insertCategory()
    {        
        $jsonInput = file_get_contents('php://input');
        $inputData = json_decode($jsonInput, true);        
        if (json_last_error()) {
            return $this->apiResponse(400, "error invalid input", null);
        }
        
        $categoryModel = new Category();
        $response = $categoryModel->createCategory([
            "name" => $inputData['name'],            
        ]);

        return $this->apiResponse(200, "success", $response);
    }

    public function updateCategory($id)
    {       
        $jsonInput = file_get_contents('php://input');
        $inputData = json_decode($jsonInput, true);        
        if (json_last_error()) {
            return $this->apiResponse(400, "error invalid input", null);
        }
        $categoryModel = new Category();
        $response = $categoryModel->updateCategory([
            "name" => $inputData['name']
        ], $id);

        return $this->apiResponse(200, "success", $response);
    }

    public function deleteCategory($id)
    {
        $categoryModel = new Category();
        $response = $categoryModel->destroyCategory($id);

        return $this->apiResponse(200, "success", $response);
    }

}
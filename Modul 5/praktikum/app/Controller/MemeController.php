<?php

namespace app\Controller;

include "app/Traits/ApiResponseFormatter.php";
include "app/Models/Meme.php";

use app\Models\Meme;
use app\Traits\ApiResponseFormatter as MemeApiResponseFormatter;

class MemeController
{    
    use MemeApiResponseFormatter;

    public function indexMeme()
    {
        $memeModel = new Meme();        
        $response = $memeModel->findAllMeme();
        return $this->apiResponse(200, "success", $response);
    }

    public function getMemeById($id)
    {
        $memeModel = new Meme();
        $response = $memeModel->findMemeById($id);
        return $this->apiResponse(200, "success", $response);
    }

    public function insertMeme()
    {        
        $jsonInput = file_get_contents('php://input');
        $inputData = json_decode($jsonInput, true);        
        if (json_last_error()) {
            return $this->apiResponse(400, "error invalid input", null);
        }
        
        $memeModel = new Meme();
        $response = $memeModel->createPost([
            "title" => $inputData['title'],
            "imgUrl" => $inputData['imgUrl'],
            "memeDesc" => $inputData['memeDesc'],
            "category_id" => $inputData['category_id']
        ]);

        return $this->apiResponse(200, "success", $response);
    }

    public function updateMeme($id)
    {        
        $jsonInput = file_get_contents('php://input');
        $inputData = json_decode($jsonInput, true);        
        if (json_last_error()) {
            return $this->apiResponse(400, "error invalid input", null);
        }
        $memeModel = new Meme();
        $response = $memeModel->updatePost([
            "title" => $inputData['title'],
            "imgUrl" => $inputData['imgUrl'],
            "memeDesc" => $inputData['memeDesc']
        ], $id);

        return $this->apiResponse(200, "success", $response);
    }

    public function deleteMeme($id)
    {
        $memeModel = new Meme();
        $response = $memeModel->destroyPost($id);

        return $this->apiResponse(200, "success", $response);
    }
}
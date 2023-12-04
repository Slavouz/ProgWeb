<?php

namespace app\Routes;

include "app/Controller/MemeController.php";
include "app/Controller/CategoryController.php";

use app\Controller\MemeController;
use app\Controller\CategoryController;

class MemeRoutes
{
    public function handle($method, $path)
    {
        $memeController = new MemeController();
        $categoryController = new CategoryController();

        switch($method) {
            case 'GET':
                if ($path == '/api/Meme') {                    
                    echo $memeController->indexMeme();
                } else if ($path == '/api/Category') {
                    echo $categoryController->indexCategory();
                }

                if (strpos($path, '/api/Meme') == 0) {
                    $pathParts = explode('/', $path);
                    $id = $pathParts[count($pathParts) - 1];
                    
                    echo $memeController->getMemeById($id);
                }  elseif (strpos($path, '/api/Category') == 0) {
                    $pathParts = explode('/', $path);
                    $id = $pathParts[count($pathParts) - 1];

                    echo $categoryController->getCategoryById($id);
                }
                break;
            case 'POST':
                if ($path == '/api/Meme') {
                    echo $memeController->insertMeme();
                } else if($path == '/api/Category') {
                    echo $categoryController->insertCategory();
                }
                break;
            case 'PUT':
                if (strpos($path, '/api/Meme') == 0) {
                    $pathParts = explode('/', $path);
                    $id = $pathParts[count($pathParts) - 1];

                    echo $memeController->updateMeme($id);
                } else if (strpos($path, '/api/Category') == 0) {
                    $pathParts = explode('/', $path);
                    $id = $pathParts[count($pathParts) - 1];

                    echo $categoryController->updateCategory($id);
                }
                break;
            case 'DELETE':
                if (strpos($path, '/api/Meme') == 0) {
                    $pathParts = explode('/', $path);
                    $id = $pathParts[count($pathParts) - 1];

                    echo $memeController->deleteMeme($id);
                } else if (strpos($path, '/api/Category') == 0) {
                    $pathParts = explode('/', $path);
                    $id = $pathParts[count($pathParts) - 1];

                    echo $categoryController->deleteCategory($id);
                }
                break;            
        }
    }
}
<?php
require_once('model/Model.php');
require_once('config/config.php');
require_once('BaseController.php');

class CategoriesController extends BaseController
{
    private $categoryModel;
    private $debug;

    public function __construct()
    {
        $this->categoryModel = new Model('categories');
        $this->debug = defined('DEBUG_MODE') ? DEBUG_MODE : FALSE;
    }

    public function getAllCategories()
    {
        try {
            $categories = $this->categoryModel->fetchAll();
            
            $categoryObject = array_map(function ($cateogry) {
                $category = $cateogry;

                $coursecount = $this->categoryModel->countCoursesInCategory($category['id']);
        
                return array(
                    'id' => $category['id'],
                    'name' => $category['name'],
                    'parent_id' => $category['parent'],
                    'count_of_courses' => $coursecount,
                    'created_at' => date('Y-m-d H:i:s', strtotime($category['created_at'])),
                    'updated_at' => date('Y-m-d H:i:s', strtotime($category['updated_at']))
                );
            }, $categories);
        
            $this->sendOutput(json_encode($categoryObject,JSON_UNESCAPED_SLASHES));
        } catch (Exception $e) {
            if ($this->debug) {
                echo "Error: " . $e->getMessage();
            }
        }
    }

    public function getCategoryByID($id)
    {
        try {
            $categories = $this->categoryModel->fetchByID('id',$id);

            if (empty($categories)) {
                http_response_code(404);
                echo json_encode(array('message' => 'Category not found'));
                exit;
            }

            $categoryObject = array_map(function ($category) {
                
                $coursecount = $this->categoryModel->countCoursesInCategory($category['id']);

                return array(
                    'id' => $category['id'],
                    'name' => $category['name'],
                    'parent_id' => $category['parent'],
                    'count_of_courses' => $coursecount,
                    'created_at' => date('Y-m-d H:i:s', strtotime($category['created_at'])),
                    'updated_at' => date('Y-m-d H:i:s', strtotime($category['updated_at']))
                );
            }, $categories);

            $this->sendOutput(json_encode($categoryObject,JSON_UNESCAPED_SLASHES));
        } catch (Exception $e) {
            if ($this->debug)
                echo "Error: " . $e->getMessage();
        }
    }
}

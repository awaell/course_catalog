<?php
require_once('model/Model.php');
require_once('config/config.php');
require_once('BaseController.php');

class CoursesController extends BaseController
{
    private $courseModel, $categoryModel;
    private $debug;

    public function __construct()
    {
        $this->courseModel = new Model('courses');
        $this->categoryModel = new Model('categories');
        $this->debug = defined('DEBUG_MODE') ? DEBUG_MODE : FALSE;
    }

    public function getAllCourses()
    {
        try {
            $courses = $this->courseModel->fetchAll();

            $coursesObject = array_map(function ($courses) {
                $category = $this->categoryModel->fetchByID('id', $courses['category_id']);
                return array(
                    'id' => $courses['course_id'],
                    'name' => $courses['title'],
                    'description' => $courses['description'],
                    'preview' => $courses['image_preview'],
                    'main_category_name' => $category[0]["name"],
                    'created_at' => date('Y-m-d H:i:s', strtotime($courses['created_at'])),
                    'updated_at' => date('Y-m-d H:i:s', strtotime($courses['updated_at']))
                );
            }, $courses);

            $this->sendOutput(json_encode($coursesObject, JSON_UNESCAPED_SLASHES));
        } catch (Exception $e) {
            if ($this->debug)
                echo "Error: " . $e->getMessage();
        }
    }

    public function getCourseByID($id)
    {
        try {
            $courses = $this->courseModel->fetchByID('course_id', $id);
            
            if (empty($courses)) {
                http_response_code(404);
                echo json_encode(array('message' => 'Course not found'));
                exit;
            }

            $coursesObject = array_map(function ($courses) {
                $category = $this->categoryModel->fetchByID('id', $courses['category_id']);
                return array(
                    'id' => $courses['course_id'],
                    'name' => $courses['title'],
                    'description' => $courses['description'],
                    'preview' => $courses['image_preview'],
                    'main_category_name' => $category[0]["name"],
                    'created_at' => date('Y-m-d H:i:s', strtotime($courses['created_at'])),
                    'updated_at' => date('Y-m-d H:i:s', strtotime($courses['updated_at']))
                );
            }, $courses);

            $this->sendOutput(json_encode($coursesObject, JSON_UNESCAPED_SLASHES));
        } catch (Exception $e) {
            if ($this->debug)
                echo "Error: " . $e->getMessage();
        }
    }
}

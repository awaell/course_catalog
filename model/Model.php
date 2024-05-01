<?php
require_once('config/config.php');
require_once('config/database.php');

class Model
{
    private $table;
    private $db;
    private $debug;

    public function __construct($table)
    {
        $this->table = $table;
        $this->db = DB::getInstance()->getConnection();
        $this->debug = defined('DEBUG_MODE') ? DEBUG_MODE : FALSE;
    }

    public function fetchAll()
    {
        try {
            $sql = "select * from {$this->table}";
            $result = $this->db->query($sql);
            if ($result->rowCount() > 0) {
                $data = [];
                $i=0;
                while($row = $result->fetch(PDO::FETCH_ASSOC)){
                    $data[$i] = $row;
                    $i++;
                }
                return $data;
            } else {
                return [];
            }
        } catch (Exception $e) {
            if ($this->debug)
                echo "Error: " . $e->getMessage();
        }
    }

    public function fetchByID($columnName,$id)
    {
        try {
            // Escape column name & id
            $sql = "SELECT * FROM {$this->table} where $columnName = :id ";
            $sqlstmt = $this->db->prepare($sql);

            // Execute the query with parameter bindings
            $sqlstmt->bindValue(":id", $id, PDO::PARAM_STR); 

            $sqlstmt->execute();
            
            $result = $sqlstmt->fetchAll(PDO::FETCH_ASSOC);
            if (!empty($result)) {
                return $result;
            } else {
                return [];
            }
        } catch (Exception $e) {
            if ($this->debug)
                echo "Error: " . $e->getMessage();
        }
    }

    public function countCoursesInCategory($categoryId) {
        try {
            // Retrieve count of courses in the category and its subcategories
            $sql = "SELECT COUNT(*) AS total
                    FROM courses
                    WHERE category_id = :categoryId 
                    OR category_id IN (SELECT id FROM categories WHERE parent = :categoryId)";
            $sqlstmt = $this->db->prepare($sql);
            $sqlstmt->bindParam(':categoryId', $categoryId, PDO::PARAM_STR);
            $sqlstmt->execute();
            $result = $sqlstmt->fetch(PDO::FETCH_ASSOC);
    
            return $result['total'];
        } catch (Exception $e) {
            if ($this->debug) {
                echo "Error: " . $e->getMessage();
            }
        }
    }
    
}

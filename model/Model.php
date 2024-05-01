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
            // Construct the SQL query with a recursive CTE to count courses in the category and its subcategories
            $sql = "
                WITH RECURSIVE category_tree AS (
                    SELECT id
                    FROM categories
                    WHERE id = :categoryId
                    UNION ALL
                    SELECT c.id
                    FROM categories c
                    INNER JOIN category_tree ct ON c.parent = ct.id
                )
                SELECT COUNT(*) AS total
                FROM courses
                WHERE category_id IN (SELECT id FROM category_tree)
            ";
    
            // Prepare and execute the SQL query
            $sqlstmt = $this->db->prepare($sql);
            $sqlstmt->bindParam(':categoryId', $categoryId, PDO::PARAM_STR);
            $sqlstmt->execute();
    
            // Fetch the result
            $result = $sqlstmt->fetch(PDO::FETCH_ASSOC);
    
            // Return the total count of courses
            return $result['total'];
        } catch (Exception $e) {
            // Handle any exceptions
            if ($this->debug) {
                echo "Error: " . $e->getMessage();
            }
        }
    }
    
    
}

<?php 
    class Database{
        public $database;

        function __construct($database)
        {
            $this -> database = $database;
        }

        public function fetch_todos(){
            try{
                return $this -> database -> query("SELECT * FROM todo_list ORDER BY id DESC"); // get todos as reverse sorted from db
            }
            catch (Exception $error) { jsout($error); }
            finally { jsout("finally: fetch_todos"); }
        }

        public function insert_into_table($name, $details){
            jsout("$name, $details");
            try{
                $this -> database -> exec("INSERT INTO 
                todo_list (name, details) 
                VALUES ('$name', '$details');");
            }
            catch (Exception $error) { jsout($error); }
            finally { jsout("finally: insert_into_table"); }
        }

        public function create_table(){
            try{
                $this -> database -> exec("CREATE TABLE 
                todo_list (
                    id INTEGER PRIMARY KEY,
                    name TEXT,
                    details TEXT,
                    creation_date DATETIME DEFAULT CURRENT_TIMESTAMP)
                ");
                jsout("Table created.");
            }
            catch (Exception $error) { jsout($error); }
            finally { jsout("finally: create_table"); }
        }

        public function is_table_existed(){ return $this -> database -> exec("SELECT 0 FROM todo_list"); }
    }
?>
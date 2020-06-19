<?php 
    class Database{
        public $database;

        function __construct($database)
        {
            $this -> database = $database;
        }

        public function remove($id){
            try{
                $this -> database -> exec("DELETE FROM note_list WHERE id = $id");
            }
            catch (Exception $error) { jsout($error); }
            // finally { jsout("finally: remove"); }
        }

        public function commit_edits($id, $name, $details){
            try{
                $this -> database -> exec("UPDATE note_list 
                SET 
                name = '$name', 
                details = '$details',
                modification_date = CURRENT_TIMESTAMP
                WHERE id = $id");
            }
            catch (Exception $error) { jsout($error); }
            // finally { jsout("finally: commit_edits"); }
        }

        public function fetch_notes(){
            try{
                return $this -> database -> query("SELECT * FROM note_list ORDER BY id DESC"); // get notes as reverse sorted from db
            }
            catch (Exception $error) { jsout($error); }
            // finally { jsout("finally: fetch_notes"); }
        }

        public function insert_into_table($name, $details){
            // jsout("$name, $details");
            try{
                $this -> database -> exec("INSERT INTO 
                note_list (name, details) 
                VALUES ('$name', '$details');");
            }
            catch (Exception $error) { jsout($error); }
            // finally { jsout("finally: insert_into_table"); }
        }

        public function create_table(){
            try{
                $this -> database -> exec("CREATE TABLE 
                note_list (
                    id INTEGER PRIMARY KEY,
                    name TEXT,
                    details TEXT,
                    creation_date DATETIME DEFAULT CURRENT_TIMESTAMP,
                    modification_date DATETIME)
                ");
                jsout("Table created.");
            }
            catch (Exception $error) { jsout($error); }
            // finally { jsout("finally: create_table"); }
        }

        public function is_table_existed(){ return $this -> database -> exec("SELECT 0 FROM note_list"); }
    }
?>
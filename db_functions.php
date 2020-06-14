<?php 
    function fetch_todos($database){
        try{
            return $database -> query("SELECT * FROM todo_list ORDER BY id DESC");
        }
        catch (Exception $error) { jsout($error); }
        finally { jsout("finally: fetch_todos"); }
    }

    function insert_into_table($database, $name, $details){
        jsout("$name, $details");
        try{
            $database -> exec("INSERT INTO 
            todo_list (name, details) 
            VALUES ('$name', '$details');");
        }
        catch (Exception $error) { jsout($error); }
        finally { jsout("finally: insert_into_table"); }
    }

    function create_table($database){
        try{
            $database -> exec("CREATE TABLE 
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

    function is_table_existed($database){ return $database -> exec("SELECT 0 FROM todo_list"); }
?>
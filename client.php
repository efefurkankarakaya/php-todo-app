<?php 
    $name = $_POST["name"];
    $details = $_POST["details"];
    $database = new SQLite3("database.db");

    $isExisted = is_table_existed($database);

    if ($name || $details){
        if ($isExisted){
            jsout("Table exists.");
        }
        else{
            create_table($database);
        }
        insert_into_table($database, $name, $details);
    }
    load_todos($database);
?>
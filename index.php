<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP To Do List App</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"></head>
<body>
    <div id="main" class="container" align="center">
        <h1 class="text-muted">Add</h1>
        <form action="index.php" method="POST">
            <div class="form-group" id="form-group">
                <input id="name" name="name" type="text" class="form-control col-md-3" placeholder="Name">
                <textarea id="details" name="details" type="text" class="form-control col-md-3" placeholder="Details"></textarea>
                <button name="submit" type="submit" class="btn btn-secondary">Submit</button>
            </div>
        </form>
    </div> 

    <?php 
        // sudo apt install php7.4-sqlite3
        include "database.php";
        include "client.php";
        include "tools.php";

        $sqlite_db = new SQLite3("database.db");
        $database = new Database($sqlite_db);
        $client = new Client($database);

        $client -> load_home();
    ?>    
    <script src="edit.js"></script>
    <script src="remove.js"></script>
    <script src="main.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <noscript>
        <p>JavaScript is not loaded.</p>
    </noscript>
</body>
</html>
<?php 
    class Client{
        private $name;
        private $details;
        public $database;

        function __construct($database)
        {
            $this -> database = $database;
            $this -> name = $_POST["name"];
            $this -> details = $_POST["details"];
        }

        public function load_home(){
            $isExisted = $this -> database -> is_table_existed();

            if ($this -> name || $this -> details){
                if ($isExisted){
                    jsout("Table exists.");
                }
                else{
                    $this -> database -> create_table();
                }
                $this -> database -> insert_into_table($this -> name, $this -> details);
            }
            $this -> load_todos($this -> database -> fetch_todos());
        }

        private function load_todos($results){
            echo "<table class='table container'>
                    <thead>
                        <tr>
                        <th class='text-muted' scope='col'>#</th>
                        <th class='text-muted' scope='col'>Name</th>
                        <th class='text-muted' scope='col'>Details</th>
                        <th class='text-muted' scope='col'>Creation Time</th>
                        <th class='text-muted' scope='col'></th>
                        <th class='text-muted' scope='col'></th>
                        </tr>
                    </thead>";
            while ($row = $results -> fetchArray()) {
                jsout("ID: $row[0] | Name: $row[1] | Details: $row[2] | Creation Date: $row[3]");
                echo "
                <tbody>
                    <tr>
                    <th class='text-muted' scope='row'>$row[0]</th>
                    <td class='text-muted'>$row[1]</td>
                    <td class='text-muted'>$row[2]</td>
                    <td class='text-muted'>$row[3]</td>
                    <td class='text-light'><a class='btn btn-warning' href='index.php' name='edit'>Edit</a></td>
                    <td class='text-dark'><a class='btn btn-danger' href='index.php' name='remove'>Remove</a></td>
                    </tr>
                </tbody>
                ";
            }
            echo "</table>";
        }
    }
?>
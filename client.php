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

        public function send_remove_request(){
            $id = $_POST["remove-submit"];

            if ($id){
                $this -> database -> remove($id);
            }
        }

        public function send_edits(){
            $id = $_POST["id"];
            $edited_name = $_POST["edited_name"];
            $edited_details = $_POST["edited_details"];
            // jsout("$id, $edited_name, $edited_details");
            if ($edited_name || $edited_details){
                $this -> database -> commit_edits($id, $edited_name, $edited_details);
            }
        }

        public function load_home(){
            $isExisted = $this -> database -> is_table_existed();
            // jsout($isExisted);

            if ($this -> name || $this -> details){ // check inputs are valid at least one of them must be
                if (!$isExisted){ // check the table exists
                    $this -> database -> create_table();
                }
                $this -> database -> insert_into_table($this -> name, $this -> details); // inserts inputs if there is, before the page load
            }

            $this -> send_edits(); // sends edits if there are, before the page load
            $this -> send_remove_request();
            $this -> load_notes($this -> database -> fetch_notes());
        }

        private function load_notes($results){
            echo "<table id='main-table' class='table container'>
                    <thead>
                        <tr>
                        <th class='text-muted' scope='col'>#</th>
                        <th class='text-muted' scope='col'>Name</th>
                        <th class='text-muted' scope='col'>Details</th>
                        <th class='text-muted' scope='col'>Creation Time</th>
                        <th class='text-muted' scope='col'>Modification Time</th>
                        <th class='text-muted' scope='col'></th>
                        <th class='text-muted' scope='col'></th>
                        </tr>
                    </thead>";
            while ($row = $results -> fetchArray()) {
                // jsout("ID: $row[0] | Name: $row[1] | Details: $row[2] | Creation Date: $row[3] | Modification Date: $row[4]");
                echo "
                <tbody>
                    <tr>
                    <th class='text-muted' scope='row'>$row[0]</th>
                    <td class='text-muted'>$row[1]</td>
                    <td class='text-muted'>$row[2]</td>
                    <td class='text-muted'>$row[3]</td>
                    <td class='text-muted'>$row[4]</td>
                    <td><a class='edit btn btn-warning text-dark' name='edit'>Edit</a></td>
                    <td><a class='remove btn btn-danger text-light' name='remove'>Remove</a></td>
                    </tr>
                </tbody>
                ";
            }
            echo "</table>";
        }
    }
?>
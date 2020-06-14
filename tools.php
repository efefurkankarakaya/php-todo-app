<?php
    function load_todos($database){
        $results = fetch_todos($database);
        echo "<table class='table container'>
                <thead>
                    <tr>
                    <th class='text-muted' scope='col'>#</th>
                    <th class='text-muted' scope='col'>Name</th>
                    <th class='text-muted' scope='col'>Details</th>
                    <th class='text-muted' scope='col'>Creation Time</th>
                    </tr>
                </thead>";
        while ($row = $results -> fetchArray()) {
            $i = 0;
            jsout("ID: $row[0] | Name: $row[1] | Details: $row[2] | Creation Date: $row[3]");
            echo "
            <tbody>
                <tr>
                <th class='text-muted' scope='row'>$row[0]</th>
                <td class='text-muted'>$row[1]</td>
                <td class='text-muted'>$row[2]</td>
                <td class='text-muted'>$row[3]</td>
                </tr>
            </tbody>
            ";
        }
        echo "</table>";
    }

    function jsout($param){
        echo "
        <script>
            console.group('PHP');
            console.log('$param'); // json_encode($param)
            console.groupEnd();
        </script>
        ";
    }
?>
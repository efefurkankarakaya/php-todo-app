<?php
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
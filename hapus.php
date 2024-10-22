<?php
require 'function.php';

$id = $_GET["id"];

if (hapus($id) > 0) {
    echo "
        <script>
            alert('Data deleted successfully!');
            document.location.href = 'index.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Data failed to delete.');
            document.location.href = 'index.php';
        </script>
    ";
}

?>
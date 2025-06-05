<?php
function connect($sql) {
    $conn = mysqli_connect("localhost", "root", "", "betterpkp_db");
    $query = mysqli_query($conn, $sql);
    if(!$query) return false;
    else return $query;
}

function condition($x) {
    $x = isset($x) && !empty($x);
    return($x);
}
?>
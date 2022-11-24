<?php

    include_once('common.php');
    $conn = create_connection();
    $sql = "select articleid, author, headline, viewcount, createtime from article where articleid < 20";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    echo json_encode($data);

?>
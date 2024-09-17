<?php


function main() {
    $conn = new mysqli(
        $host="localhost",
        $username="root",
        $password="",
        $database="bankschema",
        $port=3306
    );

    if ($conn->connect_error)
        die('Connection Failed!' . "$conn->connect_error" . "\n");
    
    $sql = "select * from bank;";
    $result = $conn->query($sql);

    if ($result->num_rows > 0)
        while ($row = $result->fetch_assoc())
            echo "ID: {$row["bank_id"]} - Name: {$row["bank_name"]}\n";
    else
        echo "No result found!\n";

    $conn->close();
}

main();


?>
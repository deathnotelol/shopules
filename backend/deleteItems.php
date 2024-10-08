<?php

include('../db_connect.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {

        $sql = "DELETE FROM items WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
        
            header("Location: itemsList.php"); 
            exit();
        } else {
            echo "Error: Unable to delete the item.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Error: ID not provided.";
}

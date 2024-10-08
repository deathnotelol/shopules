<?php

include('../db_connect.php');

// Function to delete a record from the specified table
function deleteRecord($conn, $table, $id)
{
    try {
        $sql = "DELETE FROM $table WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

// Check if both id and table are provided in the GET request

if (isset($_GET['id']) && isset($_GET['table'])) {
    $id = $_GET['id'];
    $table = $_GET['table'];

    // Define an array of valid tables for deletion

    $validTables = ['categories', 'subcategories', 'brands', 'items'];


    // Check if the specified table is valid
    if (in_array($table, $validTables)) {
        // Call the delete function
        if (deleteRecord($conn, $table, $id)) {

            // Redirect to different locations based on the table deleted
            switch ($table) {
                case 'categories':
                    header("Location: categorylist.php");
                    break;
                case 'subcategories':
                    header("Location: subcategorylist.php");
                    break;
                case 'brands':
                    header("Location: brandList.php");
                    break;
                case 'items':
                    header("Location: itemsList.php");
                    break;
                default:
                    echo "Error: Unknown table.";
                    exit();
            }
            exit();
        } else {
            echo "Error: Unable to delete the item from $table.";
        }
    } else {
        echo "Error: Invalid table specified.";
    }
} else {
    echo "Error: ID or Table name not provided.";
}

<?php
include('../db_connect.php');

if (isset($_POST['catupdate'])) {
    $id = $_POST['id'];
    $catname = $_POST['catname'];
    $oldPhoto = $_POST['oldphoto'];
    $newPhoto = $_FILES['photo'];

    $basepath = 'photo/';

    if ($newPhoto['size'] > 0) {

        $fullpath = $basepath . basename($newPhoto['name']);
        
        if (move_uploaded_file($newPhoto['tmp_name'], $fullpath)) {
            if (file_exists($oldPhoto)) {
                unlink($oldPhoto); 
            }
        } else {
            echo "Error: Unable to upload the new photo.";
            exit();
        }
    } else {
        $fullpath = $oldPhoto;
    }

    $sql = "UPDATE categories SET name = :name, photo = :photo WHERE id = :id";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $catname);
    $stmt->bindParam(':photo', $fullpath);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header('Location: categorylist.php');
        exit();
    } else {
        echo "Error: Unable to update the category.";
    }
} else {
    echo "Error: Form submission is not valid.";
}



if (isset($_POST['subcatupdate'])) {
    $id = $_POST['id'];
    $subcatname = $_POST['subcatname'];
    $catid = $_POST['categories_id'];
    
    $sql = "UPDATE subcategories SET name = :subcatname, category_id = :categories_id WHERE id = :id";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':subcatname', $subcatname);
    $stmt->bindParam(':categories_id', $catid);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header('Location: subcategorylist.php');
        exit();
    } else {
        echo "Error: Unable to update the subcategory.";
    }
} else {
    echo "Error: Form submission is not valid.";
}


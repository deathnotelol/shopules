<?php
include('../db_connect.php');

//Categories Update

if (isset($_POST['catupdate'])) {
    $id = $_POST['id'];
    $catname = $_POST['catname'];
    $oldPhoto = $_POST['oldphoto'];
    $newPhoto = $_FILES['photo'];

    $basepath = '../photo/category/';

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


//Subcategories Update

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


// Item Updat

if (isset($_POST['additem'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];
    $subcategory = $_POST['subcategory'];
    $oldphoto = $_POST['oldphoto'];

    $newphoto = $_FILES['photo'];


    $basepath = '../photo/items/';
    if ($newphoto['size'] > 0) {
        $basepath = '../photo/items/';
        $fullpath = $basepath . $newphoto['name'];
        move_uploaded_file($newphoto['tmp_name'], $fullpath);
    } else {
        $fullpath = $oldphoto;
    }

    $sql = "UPDATE items SET name=:name, photo=:photo, price=:price, discount=:discount, subcategory_id=:subcategory_id WHERE id = :id";


    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':photo', $fullpath);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':discount', $discount);
    $stmt->bindParam(':subcategory_id', $subcategory);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header('Location: itemsList.php');
}

// Brands Updat

if (isset($_POST['brandName'])) {
    $id = $_POST['id'];
    $brandName = $_POST['brandName'];
    $oldphoto = $_POST['oldphoto'];

    $newphoto = $_FILES['brandPhoto'];


    $basepath = '../photo/brands/';
    if ($newphoto['size'] > 0) {
        $basepath = '../photo/brands/';
        $fullpath = $basepath . $newphoto['name'];
        move_uploaded_file($newphoto['tmp_name'], $fullpath);
    } else {
        $fullpath = $oldphoto;
    }

    $sql = "UPDATE brands SET name=:name, photo=:photo  WHERE id = :id";


    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $brandName);
    $stmt->bindParam(':photo', $fullpath);
    $stmt->execute();

    header('Location: brandList.php');
}




<?php
include('../db_connect.php');

// Add Items

if(isset($_POST['add'])) {
$name = $_POST['name'];
$price = $_POST['price'];
$discount = $_POST['discount'];
$subcategory = $_POST['subcategory'];
$photo = $_FILES['photo'];

$basepath = '../photo/items/';


$fullpath = $basepath.$photo['name'];
move_uploaded_file($photo['tmp_name'], $fullpath);

$sql = "INSERT INTO items (name, photo, price, discount, subcategory_id) VALUES (:name, :photo, :price, :discount, :subcategory_id)";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':photo', $fullpath);
$stmt->bindParam(':price', $price);
$stmt->bindParam(':discount', $discount);
$stmt->bindParam(':subcategory_id', $subcategory);
$stmt->execute();

header('Location: itemsList.php');

}


// Add Categories
if(isset($_POST['catadd'])) {

    $catname = $_POST['catname'];
    $catphoto = $_FILES['catphoto'];
    
    $basepath = '../photo/category/';
    $fullpath = $basepath.$catphoto['name'];
    move_uploaded_file($catphoto['tmp_name'], $fullpath);
    
    $sql = "INSERT INTO categories (name, photo) VALUES (:name, :photo)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $catname);
    $stmt->bindParam(':photo', $fullpath);
    $stmt->execute();
    
    header('Location: categorylist.php');
}



// Add Subcategories

if(isset($_POST['subcatadd'])) {

    $subcatname = $_POST['subcatname'];
    $subcategories_id = $_POST['categories_id'];
    
    $sql = "INSERT INTO subcategories (name, category_id) VALUES (:name, :subcategories_id)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $subcatname);
    $stmt->bindParam(':subcategories_id', $subcategories_id);
    $stmt->execute();
    
    header('Location: subcategorylist.php');
}


// Add Brands
if(isset($_POST['brandAdd'])) {

    $brandName = $_POST['brandName'];
    $brandPhoto = $_FILES['brandPhoto'];
    
    $basepath = '../photo/brands/';
    $fullpath = $basepath.$brandPhoto['name'];
    move_uploaded_file($brandPhoto['tmp_name'], $fullpath);
    
    $sql = "INSERT INTO brands (name, photo) VALUES (:name, :photo)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $brandName);
    $stmt->bindParam(':photo', $fullpath);
    $stmt->execute();
    
    header('Location: brandList.php');
}







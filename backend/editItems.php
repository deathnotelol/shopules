<?php
include('include/backendHeader.php');
include('../db_connect.php');

$id = $_GET['id'];

$sql = "SELECT * FROM items where id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":id", $id);
$stmt->execute();
$items = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1> <i class="icofont-list"></i> Update Item Form </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <a href="itemsList.php" class="btn btn-outline-primary">
                <i class="icofont-double-left">Back</i>
            </a>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form action="updateData.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $items['id'] ?>;">
                        <input type="hidden" name="oldphoto" value="<?= $items['photo'] ?>">

                        <div class="form-group row">
                            <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name_id" name="name" value="<?php echo $items['name'] ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name_id" class="col-sm-2 col-form-label"> Price </label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="name_id" name="price" value="<?php echo $items['price'] ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name_id" class="col-sm-2 col-form-label"> Discount </label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="name_id" name="discount" value="<?php echo $items['discount'] ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="photo_id" class="col-sm-2 col-form-label"> Subcategory </label>
                            <div class="col-sm-10">
                            <select class="form-control" aria-label="Default select example" name="subcategory">
                                    <?php
                                    $sql = "SELECT * FROM subcategories";

                                    $stmt = $conn->prepare($sql);
                                    $stmt->execute();
                                    $subcategories = $stmt->fetchAll();

                                    foreach ($subcategories as $subcategory) {
                                        $id = $subcategory["id"];
                                        $name = $subcategory['name'];
                                    ?>
                                        <option value="<?= $id ?>"
                                            <?php
                                            if ($id == $items['subcategory_id']) {
                                                echo "selected";
                                            }
                                            ?>>
                                            <?php echo $name; ?></option>

                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="photo_id" class="col-sm-2 col-form-label"> Old Photo </label>
                            <div class="col-sm-10">
                                <img src="<?php echo $items['photo'] ?>" alt="" width="150px" height="150px">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="photo_id" class="col-sm-2 col-form-label"> New Photo </label>
                            <div class="col-sm-10">
                                <input type="file" id="photo_id" class="form-control" name="photo">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary" name="additem">
                                    <i class="icofont-save"></i>
                                    Update
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include('include/backendFooter.php') ?>
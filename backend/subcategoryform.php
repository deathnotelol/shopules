<?php 
include('include/backendHeader.php');
include('../db_connect.php');
?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1> <i class="icofont-list"></i> Subcategory Form </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <a href="subcategorylist.php" class="btn btn-outline-primary">
                <i class="icofont-double-left">Back</i>
            </a>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form action="insertData.php" method="POST" enctype="multipart/form-data">

                        <div class="form-group row">
                            <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name_id" name="subcatname">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="photo_id" class="col-sm-2 col-form-label"> Category </label>
                            <div  class="col-sm-10">
                                <select class="form-control " aria-label="Default select example" name="categories_id">
                                    <?php
                                    $sql = "SELECT * FROM categories";
    
                                    $stmt = $conn->prepare($sql);
                                    $stmt->execute();
                                    $categories = $stmt->fetchAll();
    
                                    foreach ($categories as $category) { ?>
                                        <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary" name="subcatadd">
                                    <i class="icofont-save"></i>
                                    Add
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
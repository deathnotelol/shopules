<?php 
include('include/backendHeader.php'); 
include('../db_connect.php');

$id = $_GET['id'];

$sql = "SELECT * FROM categories where id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":id", $id);
$stmt->execute();
$categories = $stmt->fetch(PDO::FETCH_ASSOC);

?>



<main class="app-content">
    <div class="app-title">
        <div>
            <h1> <i class="icofont-list"></i> Category Form </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <a href="categorylist.php" class="btn btn-outline-primary">
                <i class="icofont-double-left">Back</i>
            </a>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form action="updateData.php" method="POST" enctype="multipart/form-data">

                        <input type="hidden" name="id" value="<?php echo $categories['id']; ?>">
                        <input type="hidden" name="oldphoto" value="<?php echo $categories['photo']; ?>">

                        <div class="form-group row">
                            <label for="name_id" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name_id" name="catname" value="<?php echo $categories['name']; ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="photo_id" class="col-sm-2 col-form-label"> Old Photo </label>
                            <div class="col-sm-10">
                                <img src="<?php echo $categories['photo']; ?>" alt="" width="100px" height="100px">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="photo_id" class="col-sm-2 col-form-label"> New Photo </label>
                            <div class="col-sm-10">
                                <input type="file" id="photo_id" name="photo">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary" name="catupdate">
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
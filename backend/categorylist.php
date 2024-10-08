<?php 
include('include/backendHeader.php');
include('../db_connect.php');
?>


<main class="app-content">
            <div class="app-title">
                <div>
                    <h1> <i class="icofont-list"></i> Category </h1>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <a href="categoryform.php" class="btn btn-outline-primary">
                        <i class="icofont-plus">Add</i>
                    </a>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="sampleTable">
                                    <thead>
                                        <tr>
                                          <th>#</th>
                                          <th>Name</th>
                                          <th>Photo</th>
                                          <th>Action</th>
                                        </tr>
                                    </thead>
                                    <?php 
                                        $sql = "SELECT * FROM categories ORDER BY id DESC";

                                        $stmt = $conn->prepare($sql);
                                        $stmt->execute();
                                        $categories = $stmt->fetchAll();
                                        $count = 1;
                                        foreach($categories as $category) { ?>
                                    <tbody>
                                        <tr>
                                            <td> <?php echo $count++ ?> </td>
                                            <td> <?php echo $category['name'] ?> </td>
                                            <td> <img src="<?php echo $category['photo'] ?>" alt="" width="50px" height="50px"> </td>

                                            <td>
                                                <a href="editData.php?id=<?php echo $category['id'] ?>" class="btn btn-warning">
                                                    <i class="icofont-ui-settings">Edit</i>
                                                </a>

                                                    <a href="deleteData.php?id=<?php echo $category['id'] ?>&table=categories" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this categories?');">
                                                        <i class="icofont-close">Delete</i>
                                                    </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</main>


<?php include('include/backendFooter.php') ?>
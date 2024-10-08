<?php
include('include/backendHeader.php');
include('../db_connect.php');
?>


<main class="app-content">
    <div class="app-title">
        <div>
            <h1> <i class="icofont-list"></i> Sub Category </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <a href="subcategoryform.php" class="btn btn-outline-primary">
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
                                    <th>Categories Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php
                            $sql = "SELECT subcategories.*, categories.name as category_name 
                                FROM subcategories 
                                JOIN categories ON subcategories.category_id = categories.id 
                                ORDER BY subcategories.id DESC";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            $subcategories = $stmt->fetchAll();
                            $count = 1;
                            foreach ($subcategories as $subcategory) { ?>
                                <tbody>
                                    <tr>
                                        <td> <?php echo $count++ ?> </td>
                                        <td> <?php echo $subcategory['name'] ?> </td> <!-- Subcategory Name -->
                                        <td> <span class="text-info"> <?php echo $subcategory['category_name'] ?></span></td>
                                        <td>
                                            <a href="editSubcategory.php?id=<?php echo $subcategory['id'] ?>" class="btn btn-warning">
                                                <i class="icofont-ui-settings">Edit</i>
                                            </a>
                                            <a href="deleteData.php?id=<?=$subcategory['id'];?>&table=subcategories" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this subcategories?');">
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
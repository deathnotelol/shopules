<?php 
include('include/backendHeader.php');
include('../db_connect.php');
?>


<main class="app-content">
            <div class="app-title">
                <div>
                    <h1> <i class="icofont-list"></i> Items List </h1>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <a href="addItems.php" class="btn btn-outline-primary">
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
                                          <th>Price</th>
                                          <th>Discount</th>
                                          <th>Sub Category</th>
                                          <th>Action</th>
                                        </tr>
                                    </thead>
                                    <?php 
                                         $sql = "SELECT items.*, subcategories.name as subcategory_name 
                                         FROM items 
                                         JOIN subcategories ON items.subcategory_id = subcategories.id 
                                         ORDER BY items.id DESC";

                                        $stmt = $conn->prepare($sql);
                                        $stmt->execute();
                                        $items = $stmt->fetchAll();
                                        $count = 1;
                                        foreach($items as $item) { ?>
                                    <tbody>
                                        <tr>
                                            <td> <?php echo $count++ ?> </td>
                                            <td> <?php echo $item['name'] ?> </td>
                                            <td> <img src="<?php echo $item['photo'] ?>" alt="" width="50px" height="50px"> </td>
                                            <td> <?php echo $item['price'] ?> </td>
                                            <td> <?php echo $item['discount'] ?></td>
                                            <td> <?php echo $item['subcategory_name'] ?> </td>

                                            <td>
                                                <a href="" class="btn btn-warning">
                                                    <i class="icofont-ui-settings">Edit</i>
                                                </a>

                                                <a href="deleteData.php?id=<?=$item['id']?>&table=items" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this subcategories?');">
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
<?php
include('include/backendHeader.php');
include('../db_connect.php');

// Check if the 'id' is set in the query string for editing a subcategory
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the subcategory details based on the ID
    $sql = "SELECT * FROM subcategories WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $subcategory = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if the subcategory exists
    if (!$subcategory) {
        echo "Subcategory not found.";
        exit();
    }
} else {
    echo "ID not provided.";
    exit();
}
?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="icofont-list"></i> Subcategory Form</h1>
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
                    <form action="updateData.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $subcategory['id']; ?>">

                        <div class="form-group row">
                            <label for="name_id" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name_id" name="subcatname" value="<?php echo ($subcategory['name']); ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category_id" class="col-sm-2 col-form-label">Category</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="categories_id">
                                    <?php
                                    $sql = "SELECT * FROM categories";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->execute();
                                    $categories = $stmt->fetchAll();

                                    foreach ($categories as $category) {

                                        $selected = ($category['id'] == $subcategory['category_id']) ? 'selected' : '';?>
                                        <option value="<?php echo $category['id']; ?>" <?php echo $selected; ?>>
                                            <?php echo $category['name']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary" name="subcatupdate">
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
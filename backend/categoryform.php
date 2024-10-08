<?php include('include/backendHeader.php') ?>

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
                    <form action="insertData.php" method="POST" enctype="multipart/form-data">

                        <div class="form-group row">
                            <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name_id" name="catname">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="photo_id" class="col-sm-2 col-form-label"> Photo </label>
                            <div class="col-sm-10">
                                <input type="file" id="photo_id" name="catphoto">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary" name="catadd">
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
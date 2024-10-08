<!DOCTYPE html>
<html>
<?php 
include("frontendHeader.php");
include('../db_connect.php'); 
?>

	
	<!-- Carousel -->
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  		<ol class="carousel-indicators">
    		<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    		<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    		<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  		</ol>
  		
  		<div class="carousel-inner">
    		<div class="carousel-item active">
		      	<img src="image/banner/ac.jpg" class="d-block w-100 bannerImg" alt="...">
		    </div>
		    <div class="carousel-item">
		      	<img src="image/banner/giordano.jpg" class="d-block w-100 bannerImg" alt="...">
		    </div>
		    <div class="carousel-item">
		      	<img src="image/banner/garnier.jpg" class="d-block w-100 bannerImg" alt="...">
		    </div>
  		</div>
	</div>


	<!-- Content -->
	<div class="container mt-5 px-5">
		<!-- Category -->
		<div class="row">
			<?php 
			$sql = "SELECT * FROM categories ORDER BY RAND() LIMIT 8"; 


			$stmt = $conn->prepare($sql);
			$stmt->execute();
			$categories = $stmt->fetchAll();

			foreach($categories as $category) { ?>
			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 ">
				<div class="card categoryCard border-0 shadow-sm p-3 mb-5 rounded text-center">
				  	<img src="<?php echo $category['photo'] ?>" width="200px" height="200px" class="card-img-top" alt="...">
				  	<div class="card-body">
				    	<p class="card-text font-weight-bold text-truncate"> <?php echo $category['name'] ?> </p>
				  	</div>
				</div>
			</div>
			<?php } ?>
		</div>

		<div class="whitespace d-xl-block d-lg-block d-md-none d-sm-none d-none"></div>
		
		<!-- Discount Item -->
		<div class="row mt-5">
			<h1> Discount Item </h1>
		</div>

	    <!-- Disocunt Item -->
		<div class="row">
			<div class="col-12">
				<div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
		            <div class="MultiCarousel-inner">

						<?php 
						$sql = "SELECT * FROM items WHERE discount > 0 ORDER BY id DESC";
						$stmt = $conn->prepare($sql);
						$stmt->execute();
						$items = $stmt->fetchAll();
	
						foreach ($items as $item) { ?>
							<div class="item">
								<div class="pad15">
									<img src="<?= $item['photo'] ?>" class="img-fluid">
									<p class="text-truncate"><?= $item['name'] ?></p>
	
									<p class="item-price">
										<strike><?= $item['price']; ?> Ks</strike>
										<span class="d-block"><?= $item['discount']; ?> Ks</span>
									</p>
	
									<div class="star-rating">
										<ul class="list-inline">
											<li class="list-inline-item"><i class='bx bxs-star'></i></li>
											<li class="list-inline-item"><i class='bx bxs-star'></i></li>
											<li class="list-inline-item"><i class='bx bxs-star'></i></li>
											<li class="list-inline-item"><i class='bx bxs-star'></i></li>
											<li class="list-inline-item"><i class='bx bxs-star-half'></i></li>
										</ul>
									</div>
									<a href="#" class="addtocartBtn text-decoration-none">Add to Cart</a>
								</div>
							</div>
						<?php } ?>
		                
		            </div>
		            <button class="btn btnMain leftLst"><</button>
		            <button class="btn btnMain rightLst">></button>
		        </div>
		    </div>
		</div>

		<!-- Flash Sale Item -->
		<div class="row mt-5">
			<h1> Flash Sale </h1>
		</div>

	    <!-- Flash Sale Item -->
		<div class="row">
			<div class="col-12">
				<div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
		            <div class="MultiCarousel-inner">

					<?php 
					$sql = "SELECT * FROM items ORDER BY id DESC";
					$stmt = $conn->prepare($sql);
					$stmt->execute();
					$items = $stmt->fetchAll();

					foreach($items as $item)  { ?>
		                <div class="item">
		                    <div class="pad15">
		                    	<img src="<?= $item['photo'] ?>" class="img-fluid">
		                        <p class="text-truncate"><?= $item['name'] ?></p>
		                        <p class="item-price">
								<?php  if ($item['discount']) { ?>
		                        	<strike><?= $item['price']; ?> Ks </strike> 
		                        	<span class="d-block"><?= $item['discount']; ?> Ks</span>
		                        </p>
								<?php } else {?> <span class="d-block"><?= $item['price']; ?> Ks</span>
                				<?php } ?>

		                        <div class="star-rating">
									<ul class="list-inline">
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star-half' ></i></li>
									</ul>
								</div>

								<a href="#" class="addtocartBtn text-decoration-none">Add to Cart</a>

		                    </div>
		                </div>
					<?php } ?>	                
		            </div>
		            <button class="btn btnMain leftLst"><</button>
		            <button class="btn btnMain rightLst">></button>
		        </div>
		    </div>
		</div>

		<!-- Random Catgory ~ Item -->
		<div class="row mt-5">
			<h1> Fresh Picks </h1>
		</div>

	    <!-- Random Item -->
		<div class="row">
		<div class="col-12">
				<div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
		            <div class="MultiCarousel-inner">

					<?php 
					$sql = "SELECT * FROM items ORDER BY RAND()";
					$stmt = $conn->prepare($sql);
					$stmt->execute();
					$items = $stmt->fetchAll();

					foreach($items as $item)  { ?>
		                <div class="item">
		                    <div class="pad15">
		                    	<img src="<?= $item['photo'] ?>" class="img-fluid">
		                        <p class="text-truncate"><?= $item['name'] ?></p>
		                        <p class="item-price">
								<?php  if ($item['discount']) { ?>
		                        	<strike><?= $item['price']; ?> Ks </strike> 
		                        	<span class="d-block"><?= $item['discount']; ?> Ks</span>
		                        </p>
								<?php } else {?> <span class="d-block"><?= $item['price']; ?> Ks</span>
                				<?php } ?>

		                        <div class="star-rating">
									<ul class="list-inline">
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star-half' ></i></li>
									</ul>
								</div>

								<a href="#" class="addtocartBtn text-decoration-none">Add to Cart</a>

		                    </div>
		                </div>
					<?php } ?>	                
		            </div>
		            <button class="btn btnMain leftLst"><</button>
		            <button class="btn btnMain rightLst">></button>
		        </div>
		    </div>
		</div>

		
		<div class="whitespace d-xl-block d-lg-block d-md-none d-sm-none d-none"></div>

	    <!-- Brand Store -->
	    <div class="row mt-5">
			<h1> Top Brand Stores </h1>
	    </div>

	    <!-- Brand Store Item -->
	    <section class="customer-logos slider mt-5">
	      	<div class="slide">
	      		<a href="">
		      		<img src="image/brand/loacker_logo.jpg">
		      	</a>
	      	</div>
	      	
	      	<div class="slide">
	      		<a href="">
	      			<img src="image/brand/lockandlock_logo.png">
	      		</a>
	      	</div>
	      	
	      	<div class="slide">
	      		<a href="">
	      			<img src="image/brand/apple_logo.png">
	      		</a>
	      	</div>
	      	
	      	<div class="slide">
	      		<a href="">
	      			<img src="image/brand/giordano_logo.png">
	      		</a>
	      	</div>
	      	
	      	<div class="slide">
	      		<a href="">
	      			<img src="image/brand/saisai_logo.png">
	      		</a>
	      	</div>
	      	
	      	<div class="slide">
	      		<a href="">
	      			<img src="image/brand/brands_logo.png">
	      		</a>	
	      	</div>
	      	
	      	<div class="slide">
	      		<a href="">
	      			<img src="image/brand/acer_logo.png">
	      		</a>
	      	</div>
	      	
	      	<div class="slide">
	      		<a href="">
	      			<img src="image/brand/bella_logo.png">
	      		</a>
	      	</div>
	      	
	      	<div class="slide">
	      		<a href="">
	      			<img src="image/brand/ariel_logo.png">
	      		</a>
	      	</div>
	   	</section>

	    <div class="whitespace d-xl-block d-lg-block d-md-none d-sm-none d-none"></div>

	</div>
	<?php include ("frontendFooter.php"); ?>

</body>
</html>
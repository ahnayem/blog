<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Blog</title>
	<link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300i,400,500" rel="stylesheet">

	<link rel="stylesheet" href="vendor/themify-icons/themify-icons.css">
	<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<link rel="stylesheet" href="vendor/owl-carousel/owl.theme.default.min.css">
	<link rel="stylesheet" href="vendor/owl-carousel/owl.carousel.min.css">
	<link rel="stylesheet" href="vendor/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

	<!-- ================Offcanvus Menu Area =================-->
	<div class="side_menu">
			<ul class="list menu_right">
				<li>
					<a href="index.html">Home</a>
				</li>
				<li>
					<a href="about.html">About</a>
				</li>
				<li>
					<a href="projects.html">Projects</a>
				</li>
				<li>
					<a href="service.html">Service</a>
				</li>
				<li>
					<a href="#">Pages</a>
					<ul class="list">
						<li>
							<a href="elements.html">Elements</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#">Blog</a>
					<ul class="list">
						<li>
							<a href="blog">Blog</a>
						</li>
						<li>
							<a href="blog-single">Blog Details</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="contact.html">Contact</a>
				</li>
			</ul>
	</div>
	<!--================End Offcanvus Menu Area =================-->

	<!--================Canvus Menu Area =================-->
	<div class="canvus_menu">
		<div class="container">
			<div class="float-right">
				<div class="toggle_icon" title="Menu Bar">
					<span></span>
				</div>
			</div>
		</div>
	</div>
	<!--================End Canvus Menu Area =================-->
  <header class="hero-banner">
    <div class="container">
      <h2 class="section-intro__subtitle">Blog Home</h2>
      <div class="btn-group breadcrumb">
        <a href="index.html" class="btn">Home</a>
        <span class="btn btn--rightBorder">Blog</span>
      </div>
    </div>
  </header>

	<!-- Start post-content Area -->
	<section class="post-content-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 posts-list">
				<?php 
					include 'db/db.php';

					$query = "SELECT * FROM blog_post";

					$stmt 	  = $db->prepare($query);
					$result   = $stmt->execute();
					

					if($result == true){

						while ($row = $stmt->fetch()) {

							$id = $row['id'];
							$author_name = $row['author_name'];
							$title = $row['title'];
							$description = $row['description'];
							$author = $row['author_name'];
							$tag = $row['tag'];
							$image = $row['photo'];
							$view = $row['view'];
							$time = date('jS M, Y', strtotime($row['date'])); ?>
						

					<div class="single-post row">
						<div class="col-lg-3  col-md-3 meta-details">
							<ul class="tags">
								<li><a href="#"><?php echo $tag; ?></a></li>
							</ul>
							<div class="user-details row">
								<p class="user-name col-lg-12 col-md-12 col-6"><a href="#">
									<?php echo $author_name; ?></a> <span class="lnr lnr-user"></span></p>
								<p class="date col-lg-12 col-md-12 col-6"><a href="#">
									<?php echo $time; ?></a> <span class="lnr lnr-calendar-full"></span></p>
								<p class="view col-lg-12 col-md-12 col-6"><a href="#">
									<?php echo $view; ?></a> <span class="lnr lnr-eye"></span></p>
								<p class="comments col-lg-12 col-md-12 col-6"><a href="#">06 Comments</a> <span class="lnr lnr-bubble"></span></p>
							</div>
						</div>
						<div class="col-lg-9 col-md-9 ">
							<div class="feature-img">
								<img class="img-fluid" src="uploads/<?php echo $image; ?>" alt="">
							</div>
							<a class="posts-title" href="blog-single?id=<?php echo $id; ?>"><h3><?php echo $title; ?></h3></a>
							<p class="excert">
								<?php echo substr($description,0,300); ?>
							</p>
							<a href="blog-single?id=<?php echo $id; ?>" class="primary-btn">View More</a>
						</div>
					</div>

				<?php	}} ?>



					<nav class="blog-pagination justify-content-center d-flex">
						<ul class="pagination">
							<li class="page-item">
								<a href="#" class="page-link" aria-label="Previous">
									<span aria-hidden="true">
										<span class="lnr lnr-chevron-left"></span>
									</span>
								</a>
							</li>
							<li class="page-item"><a href="#" class="page-link">01</a></li>
							<li class="page-item active"><a href="#" class="page-link">02</a></li>
							<li class="page-item"><a href="#" class="page-link">03</a></li>
							<li class="page-item"><a href="#" class="page-link">04</a></li>
							<li class="page-item"><a href="#" class="page-link">09</a></li>
							<li class="page-item">
								<a href="#" class="page-link" aria-label="Next">
									<span aria-hidden="true">
										<span class="lnr lnr-chevron-right"></span>
									</span>
								</a>
							</li>
						</ul>
					</nav>
				</div>
				<div class="col-lg-4 sidebar-widgets">
					<div class="widget-wrap">
						<div class="single-sidebar-widget search-widget">
							<form class="search-form" action="#">
								<input placeholder="Search Posts" name="search" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Posts'">
								<button type="submit"><i class="fa fa-search"></i></button>
							</form>
						</div>
						<div class="single-sidebar-widget user-info-widget">
							<img src="img/blog/user-info.png" alt="">
							<a href="#"><h4>Charlie Barber</h4></a>
							<p>
								Senior blog writer
							</p>
							<ul class="social-links">
								<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="#"><i class="fab fa-twitter"></i></a></li>
								<li><a href="#"><i class="fab fa-github"></i></a></li>
								<li><a href="#"><i class="fab fa-behance"></i></a></li>
							</ul>
							<p>
								Boot camps have its supporters andit sdetractors. Some people do not understand why you should have to spend money on boot
								camp when you can get. Boot camps have itssuppor ters andits detractors.
							</p>
						</div>
						<div class="single-sidebar-widget popular-post-widget">
							<h4 class="popular-title">Popular Posts</h4>
							<div class="popular-post-list">
								<div class="single-post-list d-flex flex-row align-items-center">
									<div class="thumb">
										<img class="img-fluid" src="img/blog/pp1.jpg" alt="">
									</div>
									<div class="details">
										<a href="blog-single.html"><h6>Space The Final Frontier</h6></a>
										<p>02 Hours ago</p>
									</div>
								</div>
								<div class="single-post-list d-flex flex-row align-items-center">
									<div class="thumb">
										<img class="img-fluid" src="img/blog/pp2.jpg" alt="">
									</div>
									<div class="details">
										<a href="blog-single.html"><h6>The Amazing Hubble</h6></a>
										<p>02 Hours ago</p>
									</div>
								</div>
								<div class="single-post-list d-flex flex-row align-items-center">
									<div class="thumb">
										<img class="img-fluid" src="img/blog/pp3.jpg" alt="">
									</div>
									<div class="details">
										<a href="blog-single.html"><h6>Astronomy Or Astrology</h6></a>
										<p>02 Hours ago</p>
									</div>
								</div>
								<div class="single-post-list d-flex flex-row align-items-center">
									<div class="thumb">
										<img class="img-fluid" src="img/blog/pp4.jpg" alt="">
									</div>
									<div class="details">
										<a href="blog-single.html"><h6>Asteroids telescope</h6></a>
										<p>02 Hours ago</p>
									</div>
								</div>
							</div>
						</div>
						<div class="single-sidebar-widget ads-widget">
							<a href="#"><img class="img-fluid" src="img/blog/ads-banner.jpg" alt=""></a>
						</div>
						<div class="single-sidebar-widget post-category-widget">
							<h4 class="category-title">Post Catgories</h4>
							<ul class="cat-list">
								<li>
									<a href="#" class="d-flex justify-content-between">
										<p>Technology</p>
										<p>37</p>
									</a>
								</li>
								<li>
									<a href="#" class="d-flex justify-content-between">
										<p>Lifestyle</p>
										<p>24</p>
									</a>
								</li>
								<li>
									<a href="#" class="d-flex justify-content-between">
										<p>Fashion</p>
										<p>59</p>
									</a>
								</li>
								<li>
									<a href="#" class="d-flex justify-content-between">
										<p>Art</p>
										<p>29</p>
									</a>
								</li>
								<li>
									<a href="#" class="d-flex justify-content-between">
										<p>Food</p>
										<p>15</p>
									</a>
								</li>
								<li>
									<a href="#" class="d-flex justify-content-between">
										<p>Architecture</p>
										<p>09</p>
									</a>
								</li>
								<li>
									<a href="#" class="d-flex justify-content-between">
										<p>Adventure</p>
										<p>44</p>
									</a>
								</li>
							</ul>
						</div>
						<div class="single-sidebar-widget newsletter-widget">
							<h4 class="newsletter-title">Newsletter</h4>
							<p>
								Here, I focus on a range of items and features that we use in life without giving them a second thought.
							</p>
							<div class="form-group d-flex flex-row">
								<div class="col-autos">
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i>
											</div>
										</div>
										<input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email" onfocus="this.placeholder = ''"
										 onblur="this.placeholder = 'Enter email'">
									</div>
								</div>
								<a href="#" class="bbtns">Subcribe</a>
							</div>
							<p class="text-bottom">
								You can unsubscribe at any time
							</p>
						</div>
						<div class="single-sidebar-widget tag-cloud-widget">
							<h4 class="tagcloud-title">Tag Clouds</h4>
							<ul>
								<li><a href="#">Technology</a></li>
								<li><a href="#">Fashion</a></li>
								<li><a href="#">Architecture</a></li>
								<li><a href="#">Fashion</a></li>
								<li><a href="#">Food</a></li>
								<li><a href="#">Technology</a></li>
								<li><a href="#">Lifestyle</a></li>
								<li><a href="#">Art</a></li>
								<li><a href="#">Adventure</a></li>
								<li><a href="#">Food</a></li>
								<li><a href="#">Lifestyle</a></li>
								<li><a href="#">Adventure</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End post-content Area -->

	<!-- start footer Area -->
	<footer class="footer footer-bg">
			<div class="container">
				<div class="row">
					<div class="col-sm-4 col-lg-2 mb-4 mb-lg-0 text-center text-sm-left">
						<h3 class="footer__title">Top Products</h3>
						<ul class="footer__link">
							<li><a href="#/">managed Website</a></li>
							<li><a href="#/">Manage Reputation</a></li>
							<li><a href="#/">power Tools</a></li>
							<li><a href="#/">Marketing Service</a></li>
						</ul>
					</div>
					<div class="col-sm-4 col-lg-2 mb-4 mb-lg-0 text-center text-sm-left">
						<h3 class="footer__title">Quick Links</h3>
						<ul class="footer__link">
							<li><a href="#/">Jobs</a></li>
							<li><a href="#/">Brand Assets</a></li>
							<li><a href="#/">Investor Relations</a></li>
							<li><a href="#/">Terms of Service</a></li>
						</ul>
					</div>
					<div class="col-sm-4 col-lg-2 mb-4 mb-lg-0 text-center text-sm-left">
						<h3 class="footer__title">Features</h3>
						<ul class="footer__link">
							<li><a href="#/">Jobs</a></li>
							<li><a href="#/">Brand Assets</a></li>
							<li><a href="#/">Investor Relations</a></li>
							<li><a href="#/">Terms of Service</a></li>
						</ul>
					</div>
					<div class="col-sm-4 col-lg-2 mb-4 mb-lg-0 text-center text-sm-left">
						<h3 class="footer__title">Resources</h3>
						<ul class="footer__link">
							<li><a href="#/">Guides</a></li>
							<li><a href="#/">Research</a></li>
							<li><a href="#/">Experts</a></li>
							<li><a href="#/">Agencies</a></li>
						</ul>
					</div>
					<div class="col-sm-8 col-lg-4 mb-4 mb-lg-0 text-center text-sm-left">
						<h3 class="footer__title">Newsletter</h3>
						<p>You can trust us. we only send promo offers,</p>
						<form action="" class="form-subscribe">
							<div class="input-group">
								<input type="email" class="form-control" placeholder="Your email address" required>
								<div class="input-group-append">
									<button class="btn-append" type="submit"><i class="lnr lnr-arrow-right"></i></button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="d-sm-flex justify-content-between footer__bottom top-border">
					<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
					<ul class="social-icons mt-2 mt-sm-0">
						<li><a href="#/"><i class="fab fa-facebook-f"></i></a></li>
						<li><a href="#/"><i class="fab fa-twitter"></i></a></li>
						<li><a href="#/"><i class="fab fa-dribbble"></i></a></li>
						<li><a href="#/"><i class="fab fa-behance"></i></a></li>					
					</ul>
				</div>
			</div>
		</footer>
	<!-- End footer Area -->


	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>	
	<script src="vendor/bootstrap/bootstrap.bundle.min.js"></script>
	<script src="vendor/owl-carousel/owl.carousel.min.js"></script>

	<script>

		var heroCarousel = $('.heroCarousel');
		heroCarousel.owlCarousel({
		loop:true,
		margin:10,
		nav: false,
		startPosition: 1,
		responsiveClass:true,
		responsive:{
			0:{
				items:1
			}
		}
		});

		var dropToggle = $('.menu_right > li').has('ul').children('a');
		dropToggle.on('click', function() {
			dropToggle.not(this).closest('li').find('ul').slideUp(200);
			$(this).closest('li').children('ul').slideToggle(200);
			return false;
		});

		$( ".toggle_icon" ).on('click', function() {
			$( 'body' ).toggleClass( "open" );
		});

	</script>
</body>

</html>
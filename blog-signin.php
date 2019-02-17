<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Blog Details</title>
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
							<a href="blog.php">Blog</a>
						</li>
						<li>
							<a href="single-blog.php">Blog Details</a>
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
      <h2 class="section-intro__subtitle">Blog</h2>
      <div class="btn-group breadcrumb">
        <a href="index.html" class="btn">Home</a>
        <span class="btn btn--rightBorder">Sign Up</span>
      </div>
    </div>
  </header>

	<!-- Start post-content Area -->
	<section class="post-content-area single-post-area">
		<div class="container">
			<div class="row" style="margin-top: -50px;">
				<div class="col-lg-3 posts-list"></div>
				<div class="col-lg-6 posts-list">
					<div class="comment-form" style="margin-top: -25px;">
						<h4 class="text-white">SIGN IN HERE</h4>
						<form action="app/signin-script.php" method="post">
							<div class="form-group form-inline">
								<div class="form-group col-md-12">
									<input type="email" class="form-control" name="email" id="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
								</div>
							</div>

							<div class="form-group form-inline">
								<div class="form-group col-md-12">
									<input type="password" class="form-control" name="pass" id="pass" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
								</div>
							</div>
							
							<button type="submit" style="border: 2px solid #f9cc41; hover-color:#fff" name="signin" class="btn btn-warning primary-btn">SIGN IN</button>
						</form>
					</div>
				</div>
				<div class="col-lg-3 posts-list"></div>
			</div>
		</div>
	</section>
	<!-- End post-content Area -->


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
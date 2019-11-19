<?php
require_once('content/content.php');

$content = new Content();

$mission = $content->get_content('mission');
$vision = $content->get_content('vision');
$rules = $content->get_content('rules');
$address = $content->get_content('address');
$city = $content->get_content('city');
$workhours = $content->get_content('workhours');
$contact = $content->get_content('contact');
$email = $content->get_content('email');
$photo = $content->get_photo('photo');

?>

<!DOCTYPE html>
<html lang = "en">
	<head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
    <meta charset="utf-8">
		<title>Raizen Travel and Tours</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-theme.min.css" rel="stylesheet">
	<link href="css/animate.min.css" rel="stylesheet" >	
	<link href="css/font-awesome.min.css" rel="stylesheet">	
	<link href="css/prettyPhoto.css" rel="stylesheet">
	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-theme.min.css" rel="stylesheet">
	<link href="css/animate.min.css" rel="stylesheet" >	
	<link href="css/font-awesome.min.css" rel="stylesheet">	
	<link href="css/prettyPhoto.css" rel="stylesheet">
	
	<link href="css/theme.css" rel="stylesheet">	
	<link href="css/responsive.css" rel="stylesheet">
	<link href="css/colors/golden.css" rel="stylesheet" class="colors">
        
	</head>
<body data-spy="scroll" data-target="#mynav" data-offset="85">
    
    <div id="preloader">
	<div id="status">
		<div class="spinner">
			  <div class="rect1"></div>
			  <div class="rect2"></div>
			  <div class="rect3"></div>
			  <div class="rect4"></div>
			  <div class="rect5"></div>
		</div>
	</div>
</div>
    <header>
<!-- Header -->
    <div id="navigation">
	<div class="navbar-wrapper">
		<nav class="navbar-inverse navbar-static-top" role="navigation">
			<div class="container">
				<div class="row">
                   <div style = "float:right; margin-left: -10px;" >
		<img src = "images/raizen.jpg" width = "90" height = "80">				
					<div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            </button>
                		
            
			</div>
					</div>
					<div id="mynav" class="navbar-collapse collapse">
						<ul class="nav navbar-nav main-nav-list">
							<li><a href="#home">Home</a></li>
							<li><a href="#about">About</a></li>
							<li><a href="#gallery">Gallery</a></li>
							<li><a href="#rules">Rules and Regulation</a></li>
                            <li><a href="#contactus">Contact Us</a></li>	
							<li><a href = "book.php">Book Your Tour</a></li>
							
							<li>
								<?php
									session_start();

									if (!isset($_SESSION['username'])) {
										echo '<a href = "client/login.php">Login / Register</a>';
									}else{
										echo '<li class="nav-item dropdown">
										        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.
										          $_SESSION['username'].
										        '</a>
										        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
										          <a class="dropdown-item" href="client/logout.php">Logout</a>
										        </div>
										      </li>';
									}
								?>
							</li>
														
						</ul>
					</div>		
				</div>
			</div>
		</nav>
	</div>
</div>

 
 <!-- Index -->   
	<section id="home">
	<div class="slide-wrap">
		<div id="home-slider" class="carousel slide carousel-fade" data-ride="carousel">
			<div class="carousel-inner">
				<div class="item active"> <!-- Change Image -->
					<div class="caption">
						<h1 class="animated fadeInLeftBig">Welcome to <strong>RAIZEN</strong></h1>
						
						
					</div>
				</div>
				<div class="item"> <!-- Change Image -->
					<div class="caption">
						<h1 class="animated fadeInLeftBig"><strong>Travel</strong> and Tours</h1>
						
						
					</div>
				</div>
				<div class="item"> <!-- Change Image -->
					<div class="caption">
						<h1 class="animated fadeInLeftBig">Enjoy <strong>Traveling</strong></h1>
						
					</div>
				</div>
			</div>
			<a class="left-control" href="#home-slider" data-slide="prev"><i class="fa fa-angle-left"></i></a>
			<a class="right-control" href="#home-slider" data-slide="next"><i class="fa fa-angle-right"></i></a>
    </div>	
	</div>	
</section>
    
 </header>   
    
  <!-- About Us -->  
    <section class="section-wrapper" id="about">
	<div class="about-us">
		<div class="why-us"  "background-color: darkslategray;">	  
			<div class="container">	  
				<div class="row">
					<!-- Block Title -->
					<div class="section-title wow fadeInUp" data-wow-duration="1s" data-wow-delay="300ms">			
						<h1 style="color:#ffffff">ABOUT RAIZEN</h1>							
					</div>
				<div class="element-title wow fadeInDown" data-wow-duration="1s" data-wow-delay="300ms">			
					
                    	<div class="wrapper-why-us"><h1 style="color:gray"><strong> Mission</strong></h1>
                    <h3 class="main-color"><?php echo $mission;?></h3>
					</div>
                    <div class="wrapper-why-us"><h1 style="color:gray"><strong> Vision</strong></h1>
                    <h3 class="main-color"><?php echo $vision;?></h3>
					</div>
			</div>
            </div>
        </div>
        </div>
        </div>
    </section>
    
 
<!-- Gallery  -->
  <section class="section-wrapper" id="gallery">
<div class="skills parallax">
		<div class="overlay">
			<div class="wrapper-block-skills">
				<!-- Block Title -->
				<div class="element-title">	
					<div class="row">	 		
						<div class="container">	 		
                            <h1 class="white-color wow fadeInDown" data-wow-duration="1s" data-wow-delay="300ms"><strong style="font-size:50px  ">   GALLERY</strong></h1>
								</div>
					</div>
				</div>	
                    
                    <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="300ms"><span style="color:white">These Are Our Pictures, With </span><span class="white-color">our Happy clients</span></h3>	
				</div>
			</div>
		</div>  
                
        <div class="row">
			<div class="container-fluid">	 		
				<div class="wrapper-works">
					<div class="portfoliO">
                        <ul id="filters" class="wow fadeInRight" data-wow-duration="1s" data-wow-delay="300ms"></ul>
				    
						<div class="portfolio-wrap">
							<div class="myport wow fadeInDown" data-wow-duration="1s" data-wow-delay="600ms">
						
                                <div class="mix category-1 portfolio" data-myorder="1">
									<div class="img-holder">
									<a href="images/raizenimg/gal1.jpg" >	
											<img class="" src="../slider/<?php echo $fetch['photo']?>" alt="This is the title"> <!-- Change Image -->
											<div class="works-overlay">
												<div class="img-overlay"></div>
											</div>		
											<div class="overlay-content"> 
												<div class="works-overlay-category">IMAGE</div>															
												<div class="works-overlay-icon"><i class="fa fa-image"></i></div>										
											</div>	
										</a>
									</div>		  
								</div>

                    <div class="mix category-2 portfolio" data-cat="category-2" data-myorder="2">
									<div class="img-holder">
										<a href="images/raizenimg/gal2.jpg" >									
										<img class="" src="images/raizenimg/gal2.jpg" alt="This is the title"> <!-- Change Image -->
											<div class="works-overlay">
												<div class="img-overlay"></div>
											</div>		
											<div class="overlay-content"> 
												<div class="works-overlay-category">IMAGE</div>				
                                               			
												<div class="works-overlay-icon"><i class="fa fa-image"></i></div>		
											</div>	
										</a>
									</div>	
								</div>
        
          <div class="mix category-3 portfolio" data-cat="category-3" data-myorder="3">
									<div class="img-holder">
										<a href="images/raizenimg/gal3.jpg" >									
										<img class="" src="images/raizenimg/gal3.jpg" alt="This is the title"> <!-- Change Image -->
											<div class="works-overlay">
												<div class="img-overlay"></div>
											</div>		
											<div class="overlay-content"> 
												<div class="works-overlay-category">IMAGE</div>				
                                               			
												<div class="works-overlay-icon"><i class="fa fa-image"></i></div>			
											</div>	
										</a>
									</div>	
								</div>
        
          <div class="mix category-1 portfolio" data-cat="category-1" data-myorder="4">
									<div class="img-holder">
										<a href="images/raizenimg/gal4.jpg" >									
										<img class="" src="images/raizenimg/gal4.jpg" alt="This is the title"> <!-- Change Image -->
											<div class="works-overlay">
												<div class="img-overlay"></div>
											</div>		
											<div class="overlay-content"> 
												<div class="works-overlay-category">IMAGE</div>				
                                                			
												<div class="works-overlay-icon"><i class="fa fa-image"></i></div>			
											</div>	
										</a>
									</div>	
								</div>
        
          <div class="mix category-2 portfolio" data-cat="category-2" data-myorder="5">
									<div class="img-holder">
										<a href="images/raizenimg/gal5.jpeg" >									
										<img class="" src="images/raizenimg/gal5.jpeg" alt="This is the title"> <!-- Change Image -->
											<div class="works-overlay">
												<div class="img-overlay"></div>
											</div>		
											<div class="overlay-content"> 
												<div class="works-overlay-category">IMAGE</div>				
                                               			
												<div class="works-overlay-icon"><i class="fa fa-image"></i></div>			
											</div>	
										</a>
									</div>	
								</div>
        
        <div class="mix category-3 portfolio" data-cat="category-3" data-myorder="6">
									<div class="img-holder">
										<a href="images/raizenimg/gal6.jpeg" >	
											<img class="" src="images/raizenimg/gal6.jpeg" alt="This is the title"> <!-- Change Image -->
											<div class="works-overlay">
												<div class="img-overlay"></div>
											</div>		
											<div class="overlay-content"> 
												<div class="works-overlay-category">IMAGE</div>												
												<div class="works-overlay-icon"><i class="fa fa-image"></i></div>					
											</div>	
										</a>
									</div>			  
								</div>
        
        
                                <div class="mix category-1 portfolio" data-cat="category-1" data-myorder="7">
									<div class="img-holder">
										<a  href="images/raizenimg/gal7.jpeg" >
											<img class="" src="images/raizenimg/gal7.jpeg" alt="This is the title"> <!-- Change Image -->
											<div class="works-overlay">
												<div class="img-overlay"></div>
											</div>		
											<div class="overlay-content"> 
												<div class="works-overlay-category">IMAGE</div>										
												<div class="works-overlay-icon"><i class="fa fa-image"></i></div>										
											</div>	
										</a>
									</div>		  
								</div>
        
                                	<div class="mix category-2 portfolio" data-cat="category-2" data-myorder="8">
									<div class="img-holder">
										<a  href="images/raizenimg/gal8.jpeg" >
											<img class="" src="images/raizenimg/gal8.jpeg" alt="This is the title"> <!-- Change Image -->
											<div class="works-overlay">
												<div class="img-overlay"></div>
											</div>		
											<div class="overlay-content"> 
												<div class="works-overlay-category">IMAGE</div>										
																						
												<div class="works-overlay-icon"><i class="fa fa-image"></i></div>						
											</div>
										</a>
                                        </div>
                                </div>
                          <div class="gap"></div>
								<div class="gap"></div>
							</div>
						</div>
                       
					</div>		
				</div>
			</div>
      </div>
                	
    </section>
    <br/>
    <br/>
    <br/>
    
    <!-- Rules -->
    
    <section class="section-wrapper" id="rules">
    <div class="stay-in parallax">
		<!-- Block Title -->
		<div class="overlay">
			<div class="wrapper-block-stay-in">
				<div class="element-title">	
					<div class="row">	 		
						<div class="container">	 		
							<h1 class="white-color wow fadeInDown" data-wow-duration="1s" data-wow-delay="300ms"><strong>Rules and Regulations</strong></h1>
							
                      
                            <h3 style="color:#000000"><center><span style="background-color:gold"><?php echo $rules;?></span></center></h3>
					</div>
						</div>
					</div>
				</div>
            </div>
        </div>
    
     
</section> 
    
    <!-- Contacts -->
    <section class="section-wrapper" id="contactus">
	
	<div class="contacts"> 
	
		<!-- Block Title -->	
		<div class="element-title">			
			<div class="row">	 		
				<div class="container">
					<div class="section-title wow fadeInDown" data-wow-duration="1s" data-wow-delay="300ms">			
						<h1 style="color:#ffffff">Contact Us</h1>							
					</div>				
                    <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="300ms"  style="color:gray">Contact Our <span style="color:gray">Staff to ask or Clarify any doubts</span></h3>	
				</div>
			</div>
		</div>
		<!-- End Block Title -->	
	
		<div class="container">
			<div class="row">	
				<div class="wrapper-contacts">		
					<div class="contact_form">
						<div class="row">
							<div class="wrapper-contacts-icons">	
								<div class="col-xs-4 wow fadeInRight" data-wow-duration="1s" data-wow-delay="300ms">	
									<i class="fa fa-map-marker"></i>
									<div class=""  style="color:gray"><?php echo $address;?></div>
									<div class="" style="color:gray"><?php echo $city;?></div>
								</div>								
								<div class="col-xs-4 wow fadeInRight" data-wow-duration="1s" data-wow-delay="450ms">	
									<i class="fa fa-mobile-phone"></i>
									<div class="" style="color:gray"><?php echo $workhours;?></div>
									<div class="" style="color:gray"><?php echo $contact;?></div>
								</div>
								<div class="col-xs-4 wow fadeInRight" data-wow-duration="1s" data-wow-delay="600ms">	
									<i class="fa fa-envelope-o"></i>
									<div class="" style="color:gray">Feel Free to Email Us</div>
									<div class="" style="color:gray"><?php echo $email;?></div>
								</div>								
								
							</div>								
						</div>								
						<div class="row wow fadeInRight" data-wow-duration="1s" data-wow-delay="800ms">
							<!-- Start contact-form -->	
							<form id="contact-form" method="post" action="#">
								<div class="col-lg-6 col-sm-6">				
									<div class="form-group">
										<input type="text" name="name" class="form-control" placeholder="Your name">
									</div>
									<div class="form-group">
										<input type="email" name="email" class="form-control" placeholder="Your email address">
									</div>
									<div class="form-group">
										<input type="text" name="subject" class="form-control" placeholder="Subject">
									</div>
								</div>
								<div class="col-lg-6 col-sm-6">				
									<div class="form-group">
										<textarea  name="message" class="form-control" placeholder="Your message" rows="8"></textarea>
									</div>
									<div id="output"></div>
									<input type="submit" class="" value="Submit">
								</div>
							</form>
							<!-- End contact-form -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    </section>
    
    
     <section class="section-wrapper" id="reservation.php">
	

	
		<!-- Block Title -->	
		<div class="element-title">			
			<div class="row">	 		
				<div class="container">
					<div class="section-title wow fadeInDown" data-wow-duration="1s" data-wow-delay="300ms">			
						<h1 style="background-color:#ae8a46"><a href="reservation.php"><strong>Make A Reservation</strong></a></h1>							
					</div>	
                </div>
            </div>
        </div>
        
    </section>
    
    
<?php include ("footer.php"); ?>
    
    <a href="#" class="scroll-up"><i class="fa fa-arrow-up"></i></a>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/retina.min.js"></script>
	<script src="js/jquery.easing.min.js"></script>
	<script src="js/wow.min.js"></script>	
	<script src="js/waypoints.min.js"></script>	
	<script src="js/jquery.countTo.js"></script>
	<script src="js/jquery.mixitup.min.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>	
	<script src="js/jquery.knob.min.js"></script>	
	<script src="js/jquery.validate.min.js"></script>
	<script src="js/custom.js"></script>	

    </body>
</html>
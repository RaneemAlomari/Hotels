<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" /> <!-- control caching -->
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />
    <title>Hotel Search</title>

    <!-- load stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">  <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">                <!-- Font Awesome -->
    <link rel="stylesheet" href="css/bootstrap.min.css">                                      <!-- Bootstrap style -->
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
    <link rel="stylesheet" type="text/css" href="css/datepicker.css"/>
    <link rel="stylesheet" href="css/tooplate-style.css">                                   <!-- Templatemo style -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->
</head>

    <body>
       
            <div class="tm-section tm-bg-img" id="tm-section-1">
                <div class="tm-bg-white ie-container-width-fix-2">
                    <div class="container ie-h-align-center-fix">
                        <div class="row">
                            <div class="col-xs-12 ml-auto mr-auto ie-container-width-fix">
                                <form action="index.php" method="get" class="tm-search-form tm-section-pad-2">
                                    <div class="form-row tm-search-form-row">
                                        <div class="form-group tm-form-element tm-form-element-100">
                                            <i class="fa fa-map-marker fa-2x tm-form-element-icon"></i>
                                            <input name="city" type="text" class="form-control" id="inputCity" placeholder=" your destination...">
                                        
										</div>
                                        <div class="form-group tm-form-element tm-form-element-50">
                                            <i class="fa fa-calendar fa-2x tm-form-element-icon"></i>
                                            <input name="check-in" type="text" class="form-control" id="inputCheckIn" placeholder="Trip Start Date">
                                        </div>
                                        <div class="form-group tm-form-element tm-form-element-50">
                                            <i class="fa fa-calendar fa-2x tm-form-element-icon"></i>
                                            <input name="check-out" type="text" class="form-control" id="inputCheckOut" placeholder="Trip End Date">
                                        </div>
                                    </div>
                                    
                                        <div class="form-group tm-form-element tm-form-element-2">                                            
                                            <select name="lengthOfStay" class="form-control tm-select" id="lengthOfStay">
                                                <option value="">Length of stay</option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">17</option>
                                            </select>
                                            
                                        </div>
										<div class="form-group tm-form-element tm-form-element-100">
                                            <input name="MinStarRate" type="text" class="form-control" id="MinStarRate" placeholder=" Min Star Rating">
                                            <input name="MaxStarRate" type="text" class="form-control" id="MaxStarRate" placeholder=" Max Star Rating">
                                        
										</div>
										<div class="form-group tm-form-element tm-form-element-100">
                                            <input name="MinTotalRate" type="text" class="form-control" id="MinTotalRate" placeholder=" Min Total Rating">
                                            <input name="MaxTotalRate" type="text" class="form-control" id="MaxTotalRate" placeholder=" Max Total Rating">
                                        
										</div>
										
                                        
                                        <div class="form-group tm-form-element tm-form-element-2">
                                            <button type="submit" class="btn btn-primary tm-btn-search"  >Check Availability</button>
                                        </div>
                                      </div>
                                      
                                </form>
								
                            </div>                        
                        </div>      
                    </div>
                </div>                  
            </div>
            
			    </div>
            </div>

			
            <div class="tm-section-2">
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
						<?php
						
$shortName=$_GET["city"];
$lengthOfStay=$_GET["lengthOfStay"];
$flag=true;

$url='https://offersvc.expedia.com/offers/v2/getOffers?scenario=deal-finder&page=foo&uid=foo&productType=Hotel';


  $json = file_get_contents($url); 
  $arr = json_decode( $json, TRUE );
  
  if($shortName != "" || $lengthOfStay != "")
  {
  foreach($arr as $element)
  { $elementCount = count($element);
  foreach($element as $e)
  {
	  if(is_array($e))
	  {
	  for($count=0;$count<=4;$count++)
	  {
		  if(isset($e[$count]))
		  {
	  if( $e[$count]["destination"]["city"]==$shortName || $e[$count]["offerDateRange"]["lengthOfStay"]==$lengthOfStay )
	  {
		  
		   echo '<div class="tm-section tm-section-pad tm-bg-gray" id="tm-section-4">';
                echo '<div class="container">';
                   echo ' <div class="row">';
                        echo '<div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">';
                           echo ' <div class="tm-article-carousel"> ';                           
                              echo '  <article class="tm-bg-white mr-2 tm-carousel-item">';
                                  echo ' <img src="'.$e[$count]["hotelInfo"]["hotelImageUrl"].'" alt="Image" class="img-fluid">';
                                   echo ' <div class="tm-article-pad">';
                                     echo'   <header><h3 class="text-uppercase tm-article-title-2">'.$e[$count]["hotelInfo"]["localizedHotelName"].'</h3></header>';
                                      echo'  <p>'.$e[$count]["hotelInfo"]["hotelCity"].'</p>';
                                       echo ' <a href="#" class="text-uppercase btn-primary tm-btn-primary">Get More Info.</a>';
                                   echo ' </div>';                                
                               echo ' </article> ';                   
                                
                                
                            echo '</div>  ';  
                       echo ' </div>';
                        
                                
                          echo '  </div> ';                           
                      echo '  </div>';
                   echo ' </div>';
             
		
	  }
	  else if(!$flag)
	  {
		  echo "No Match Found ";
	  }
		  }
	  }
	  }
  }
  }
  }           
 
?>
                            </div>                
                    </div>
                </div>        
            </div>
            
                        

</body>
</html>


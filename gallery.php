<?php
session_start();
	include "header.php";
?>
<html>
<head>
	<title>Галерея</title>
	<script type="text/javascript" src="js/slider.js"></script>
	  <link href="css/slider.css" rel="stylesheet" type="tex/css">
	  <script>
$(window).load(function() {
	$('.blueberry').blueberry();
});
</script>


</head>
<body>
	 <script>
$(document).ready(function(){
    $(".main").removeClass('active');
       $(".ency").removeClass('active');
          $(".gall").addClass('active');
    $(".new").removeClass('active');
});

  </script>


	<?php
	unset($_SESSION['page']);

	?>
	<div class='main_backg'>
<div class="container main_platform"> 

		
<div id="doc">
  <div id="content">
<h3 class="main_page_text">Галерея  Solar System</h3>
<!-- slider Solar System -->

    <div class="blueberry">
      <ul class="slides">
        <li><img src="images/earth.jpg" /></li>
         <li><img src="images/earth1.jpg" /></li>
          <li><img src="images/planet.jpg" /></li>
           <li><img src="images/sun.jpg" /></li>
      </ul>
    </div>

<img src="images/earth.jpg" alt="" class="img-thumbnail">
<img src="images/earth1.jpg" alt="" class="img-thumbnail">
<img src="images/planet.jpg" alt="" class="img-thumbnail">
<img src="images/sun.jpg" alt="" class="img-thumbnail">
<img src="images/planet1.jpg" alt="" class="img-thumbnail">
<img src="images/planet2.jpg" alt="" class="img-thumbnail">
<img src="images/planet3.jpg" alt="" class="img-thumbnail">





  </div>
</div>


</div>

	</div>
	<?php
include "footer.php";
	 ?>

</body>
</html>

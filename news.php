<?php
session_start();
	include "header.php";
?>
<html>
<head>
	<title>Новости</title>
</head>
<body>
	  <script>
$(document).ready(function(){
    $(".main").removeClass('active');
       $(".ency").removeClass('active');
          $(".gall").removeClass('active');
    $(".new").addClass('active');
});

  </script>
	<style>
.alert-danger {
opacity: 0.7;
top: 56px;
width: 100%;
position: absolute;
color: #a94442;
background-color: #f2dede;
border-color: #ebccd1;
}
.news_pic {
width: 185px;
height: 140px;
margin-top: 15px;
display: inline-block;
vertical-align: top;
}
.data_line span {
display: inline-block;
color: fff;
margin-top: 30px;
width: 595px;
}
.news_1{
	margin-bottom: 10px;
float: right;
}
.title_news_coll{
	color: rgb(47, 82, 112);
}

	</style>
	<?php
	unset($_SESSION['page']);

	?>
	<div class='main_backg'>
<div class="container main_platform"> 
<div id="doc">
<div class="item_news">
                        <div class="title_line">
                            <a href="some_article.php"><div class="title_news"><h3 class="title_news_coll">Космическая миссия Rosetta достигла своей кульминации</h3></div></a>
                            <div class="time_news"></div>
                        </div>
                        <div class="data_line">
                            <img class="news_pic" src="images/Separation_large.jpg">
                            <span style="width: 72%;">
Европейское космическое агентство сообщило об успешной посадке зонда Philae на комету 67P/Чурюмова-Герасименко. 
Зонд отделился от аппарата Rosetta днем 12 ноября (по московскому времени). 
Rosetta же покинула Землю 2 марта 2004 и более десяти лет летела к комете. Основная цель 
миссии — исследование эволюции ранней Солнечной системы. В случае успеха самый амбициозный 
проект ЕКА может стать своего рода розеттским камнем не только астрономии, но и технологий.
                            </span>
                        </div>
                        <div class="more_line">
                           
                            <div class="comments_news">
                               
                                <a class="btn btn-primary1 btn-primary news_1" href="some_article.php">
                                    <div id="more_btn">+ Читать полностью</div>
                                </a>
                            </div>
                        </div>
                    </div>
</div>
		
</div>

	</div>
	<?php
//include "footer.php";
	 ?>

</body>
</html>

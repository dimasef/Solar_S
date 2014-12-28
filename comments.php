<?php
   session_start();
   echo "<div id =\"usname\">$_SESSION[log]</div>";
    ?>
    <html>
    <head>
    <style type="text/css">
   
.comments span {
  font-family: Tahoma;
               }
 #usname {
    display: none;
        }   
        textarea{
          opacity: 0.8;
margin-top: 100px;
        }         
      

    </style>
    </head>
    <body>
    <br>
    <?php
if (!empty($_SESSION['log']))
      echo"
 <form method=\"post\" style='
    margin-bottom: 0px;'>
  <textarea id=\"comment_send\" class='form-control' rows=\"5\" style='
    margin-left: 10%;
    margin-bottom: 0%;
    width: 81%;
'></textarea><br>
  <button class='btn btn-success' id=\"button\" style=\"
    margin-left: 84%;
    margin-bottom: 10px;\">Отправить</button>";
  else echo "<div class='alert alert-danger'  role='alert' style=\"
    margin-top: 120;
    width: 81%;
    margin-left: 10%;
  
\"> Чтобы видеть и оставлять комментарии вы должны войти на сайт!</div>";
  ?>
   <script>
       var ar_title = document.getElementById('title').innerHTML;
     var button = document.getElementById('button');
      xmlhttp1 = new XMLHttpRequest();
  button.addEventListener('click', function() 
  {
       var comment = document.getElementById('comment_send').value.replace(/<[^>]+>/g,'');
   if(comment === '') 
   {
    alert('Нельзя отправить пустой комментарий!');
    return false;
   }
   var username = document.getElementById('usname').innerHTML;
   xmlhttp1.open('post', 'set_comment.php', true);
   xmlhttp1.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
   xmlhttp1.send("login=" + username + "&title=" + ar_title + "&comm=" + encodeURIComponent(comment));
  });
  //--------------------------------------------------------------------------------------------- 
   var count=0;
   function getComments() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open('post', 'get_comments.php', true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.send('count=' + count + '&title_n=' + ar_title);
    xmlhttp.onreadystatechange = function() {
     if(xmlhttp.readyState == 4) {
      if(xmlhttp.status == 200) {
       var data = xmlhttp.responseText;
       if(data != "empty") {
        data = JSON.parse(data);
        for(var i = 0; i < data.length; i++) {
         var parent = document.getElementsByTagName('body')[0];
         var elem = document.createElement('div');
         elem.className = 'comments';
         parent = parent.appendChild(elem);
         elem = document.createElement('span');
         parent.appendChild(elem);
         var text = data[i].name;
         var textNode = document.createTextNode(text);
         elem.appendChild(textNode);
         parent.appendChild(elem);
         elem = document.createElement('div');
         elem.className = 'comments1';
         parent.appendChild(elem);
         newimg_path = data[i].img;
         new_img = document.createElement("img");
         new_img.setAttribute("src",newimg_path);
         new_img.setAttribute("width",40);
         new_img.setAttribute("height",50);
         elem.appendChild(new_img);

         parent.appendChild(elem);
         elem = document.createElement('div');
         elem.className = 'comment1';
         parent.appendChild(elem);
         text = data[i].comment;
         textNode = document.createTextNode(text);
         elem.appendChild(textNode);

         parent.appendChild(elem);
         elem = document.createElement('div');
         elem.className = 'comment';
         parent.appendChild(elem);
         text = data[i].date;
         textNode = document.createTextNode(text);
         elem.appendChild(textNode);

         
         var max = data[i].id;
        }
        count = max;
       }
      }
     }
    };
    setTimeout(function() {
     getComments();
    }, 3000);
   }
   </script>


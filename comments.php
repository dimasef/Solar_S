   <?php
   session_start();
   echo "<div id =\"usname\">$_SESSION[log]</div>";
    ?>
    <html>
    <head>
    <style type="text/css">
    .comments {
  border: 1px solid green;
  width: 300px;
  text-align: center;
  border-radius: 5px;
  margin: 0 auto 10px;
              }
.comments span {
  font-family: Tahoma;
               }
 #usname {
    display: none;
        }              
    </style>
    </head>
    <body>
    <br>
    <?php
if (!empty($_SESSION['log']))
      echo"
 <form method=\"post\"><span>Комментарий</span><br>
  <textarea id=\"comment_send\" cols=\"30\" rows=\"10\"></textarea><br>
  <button id=\"button\">Отправить</button>";
  else echo "<div class='alert alert-danger' role='alert'>Чтобы видеть и оставлять комментарии вы должны войти на сайт!</div>";
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
         elem = document.createElement('hr');
         parent.appendChild(elem);
         elem = document.createElement('div');
         elem.className = 'comments';
         parent.appendChild(elem);
         newimg_path = data[i].img;
         new_img = document.createElement("img");
         new_img.setAttribute("src",newimg_path);
         new_img.setAttribute("width",40);
         new_img.setAttribute("height",50);
         elem.appendChild(new_img);
        elem = document.createElement('hr');
         parent.appendChild(elem);
         elem = document.createElement('div');
         elem.className = 'comment';
         parent.appendChild(elem);
         text = data[i].date;
         textNode = document.createTextNode(text);
         elem.appendChild(textNode);
         elem = document.createElement('hr');
         parent.appendChild(elem);
         elem = document.createElement('div');
         elem.className = 'comment';
         parent.appendChild(elem);
         text = data[i].comment;
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
</body>
   </html>
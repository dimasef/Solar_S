<?php
session_start();
?>
<html>
<head>
	<title>Главная</title>
		<script src="js/three.min.js"></script>
    <script src="js/FirstPersonControls.js"></script>
</head>
<body>
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
	</style>
	<?php
	unset($_SESSION['page']);
	include "header.php";
	?>

	<div class='main_backg'>

<div class="container main_platform"> 
	<h2 class='main_page_text'>О Системе Solar System</h2>
	<div class="text_about_system">
<p>
Наша система Solar System позволяет пользователям путешествовать по Солнечной системе не от ходя от компютеров при помощи нового мощного 
 веб симулятора Galactic complex hadronsub system который создает точную 3Д модель солничной системы
 с возможностью путешествовать и иследовать каждую планету. По мимо симулятора  Galactic complex hadronsub system наша система содержит 
 огромный архив данных о каждом небасном теле в приделах нашей солничной системы.
</p>
	</div>
<script>
    var go_Planet;
    var Rotation_planet_stop = false;
    function Start()
    {
      camera.position.z = 95300;
      Rotation_planet_stop = false;
    }

 function showPlanetMercury()
    {
      go_Planet = 1;
      Rotation_planet_stop = true;
    }
 function showPlanetVenus()
    {
      go_Planet = 2;
      Rotation_planet_stop = true;
    }
 function showPlanetEarth()
    {
      go_Planet = 3;
      Rotation_planet_stop = true;
    }
 function showPlanetMars()
    {
      go_Planet = 4;
      Rotation_planet_stop = true;
    }
 function showPlanetJupiter()
    {
      go_Planet = 5;
      Rotation_planet_stop = true;
    }
 function showPlanetSaturn()
    {
      go_Planet = 6;
      Rotation_planet_stop = true;
    }
 function showPlanetUranus()
    {
      go_Planet = 7;
      Rotation_planet_stop = true;
    }
 function showPlanetNeptune()
    {
      go_Planet = 8;
      Rotation_planet_stop = true;
    }

	var scene, camera, render, container, controls;

    container = document.createElement('div');
    document.body.appendChild(container);


    camera = new THREE.PerspectiveCamera(45,window.innerWidth/window.innerHeight,1,10000000);
    camera.position.z = 95300;
    scene = new THREE.Scene();


    var ambient = new THREE.AmbientLight(0xFFE0E0);

    var light;

    light = new THREE.PointLight(0xffffff,1.4,240000)
    light.position.set(0,0,0);
    light.castShadow = true;
    light.shadowMapWidth = 2048;
    light.shadowMapHeight = 2048;
    scene.add(light);

//Звезды ==================================================================
    var starsGeometry = new THREE.Geometry();
    var starsMat = new THREE.ParticleBasicMaterial({color:0x999999,opacity:0, size:1, sizeAttenuation:false});
    var stars;

    for(var i=0;i<45000; i++){
        var vertex = new THREE.Vector3();
        vertex.x = Math.random()*2-1;
        vertex.y = Math.random()*2-1;
        vertex.z = Math.random()*2-1;
        vertex.multiplyScalar(3000);
        starsGeometry.vertices.push(vertex);
    }
    stars = new THREE.ParticleSystem(starsGeometry,starsMat);
    stars.scale.set(100,100,100);
    scene.add(stars);

    var starsGeometry2 = new THREE.Geometry();
    var starsMat2 = new THREE.ParticleBasicMaterial({color:0xf5f5f5,opacity:0, size:1, sizeAttenuation:false});
    var stars2;

    for(var i=0;i<10000; i++){
        var vertex = new THREE.Vector3();
        vertex.x = Math.random()*2-1;
        vertex.y = Math.random()*2-1;
        vertex.z = Math.random()*2-1;
        vertex.multiplyScalar(3000);
        starsGeometry2.vertices.push(vertex);
    }
    stars2 = new THREE.PointCloud(starsGeometry2,starsMat2);
    stars2.scale.set(70,150,120);
    scene.add(stars2);


//Солнце ==================================================================
    var sun, sun_geon, sun_mat;
    sun_geon = new THREE.SphereGeometry(5000,85,85);
    var texture = new THREE.ImageUtils.loadTexture('texture/Sun.jpg');
    texture.anisotropy = 8;
    sun_mat = new THREE.MeshPhongMaterial({map: texture, emissive: 0xffffff});
    sun = new THREE.Mesh(sun_geon,sun_mat);
    scene.add(sun);

 //Меркурий ===============================================================
    var Mercury, Mercury_geon, Mercury_mat;
    Mercury_geon = new THREE.SphereGeometry(30,20,20);
    var texture1 = new THREE.ImageUtils.loadTexture('texture/Mercury.jpg');
    texture1.anisotropy = 8;
    Mercury_mat = new THREE.MeshPhongMaterial({map: texture1});
    Mercury = new THREE.Mesh(Mercury_geon,Mercury_mat);
    scene.add(Mercury);

 //Венера ===============================================================
    var Venus, Venus_geon, Venus_mat;
    Venus_geon = new THREE.SphereGeometry(60,25,25);
    var texture2 = new THREE.ImageUtils.loadTexture('texture/Venus.jpg');
    texture2.anisotropy = 8;
    Venus_mat = new THREE.MeshPhongMaterial({map: texture2, emissive: 0xffffff});
    Venus = new THREE.Mesh(Venus_geon,Venus_mat);
    Venus.castShadow = true;
    scene.add(Venus);

//Земля ===================================================================
    var Earth, earth_geon, earth_mat;
    earth_geon = new THREE.SphereGeometry(60,25,25);
    var texture3 = new THREE.ImageUtils.loadTexture('texture/Earth.jpg');
    texture3.anisotropy = 8;
    earth_mat = new THREE.MeshPhongMaterial({map: texture3});
    Earth = new THREE.Mesh(earth_geon,earth_mat);
    Earth.castShadow = true;
    scene.add(Earth);

 //Марс ===================================================================
    var Mars, Mars_geon, Mars_mat;
    Mars_geon = new THREE.SphereGeometry(37,25,25);
    var texture4 = new THREE.ImageUtils.loadTexture('texture/Mars.jpg');
    texture4.anisotropy = 8;
    Mars_mat = new THREE.MeshPhongMaterial({map: texture4});
    Mars = new THREE.Mesh(Mars_geon,Mars_mat);
    Mars.castShadow = true;
    scene.add(Mars);

 //Юпитер ==================================================================
    var Jupiter, Jupiter_geon, Jupiter_mat;
    Jupiter_geon = new THREE.SphereGeometry(500,40,40);
    var texture5 = new THREE.ImageUtils.loadTexture('texture/Jupiter.jpg');
    texture5.anisotropy = 8;
    Jupiter_mat = new THREE.MeshPhongMaterial({map: texture5, emissive: 0x000000});
    Jupiter = new THREE.Mesh(Jupiter_geon,Jupiter_mat);
    Jupiter.castShadow = true;
    scene.add(Jupiter);

 //Сатурн ==================================================================
    var Saturn, Saturn_geon, Saturn_mat;
    Saturn_geon = new THREE.SphereGeometry(330,40,40);
    var texture6 = new THREE.ImageUtils.loadTexture('texture/Saturn.jpg');
    texture6.anisotropy = 8;
    Saturn_mat = new THREE.MeshPhongMaterial({map: texture6});
    Saturn = new THREE.Mesh(Saturn_geon,Saturn_mat);
    Saturn.castShadow = true;
    scene.add(Saturn);
    var Ring_geon = new THREE.Geometry();
    var Ring_mat = new THREE.ParticleBasicMaterial({color: 0x3A3A3A, opacity:0.3,soze:0.6,sizeAttenuation: false});
    for(var i =0; i<30000; i++){
        var vertex = new THREE.Vector3();
        vertex.x = Math.sin(Math.PI/180*i)*(950-i/100);
        vertex.y = Math.random()*10;
        vertex.z = Math.cos(Math.PI/180*i)*(950-i/100);
        Ring_geon.vertices.push(vertex);
    }
    var Ring = new THREE.ParticleSystem(Ring_geon,Ring_mat);
    Ring.castShadow = true;
    scene.add(Ring);

 //Уран ==================================================================
    var Uranus, Uranus_geon, Uranus_mat;
    Uranus_geon = new THREE.SphereGeometry(150,40,40);
    var texture7 = new THREE.ImageUtils.loadTexture('texture/Uranus.jpg');
    texture7.anisotropy = 8;
    Uranus_mat = new THREE.MeshPhongMaterial({map: texture7});
    Uranus = new THREE.Mesh(Uranus_geon,Uranus_mat);
    Uranus.castShadow = true;
    scene.add(Uranus);

//Нептун ==================================================================
    var Neptune, Neptune_geon, Neptune_mat;
    Neptune_geon = new THREE.SphereGeometry(120,40,40);
    var texture8 = new THREE.ImageUtils.loadTexture('texture/Neptune.jpg');
    texture8.anisotropy = 8;
    Neptune_mat = new THREE.MeshPhongMaterial({map: texture8});
    Neptune = new THREE.Mesh(Neptune_geon,Neptune_mat);
    Neptune.castShadow = true;
    scene.add(Neptune);

//=================================================================

    render = new THREE.WebGLRenderer();
    render.setSize(window.innerWidth,window.innerHeight);
    container.appendChild(render.domElement);
    var t = 0;
    var y = 0;
    
    animate();

    function animate(){

        requestAnimationFrame(animate);

        // controls.update(0.005);
         sun.rotation.y +=0.001;

         Mercury.rotation.y +=0.004;
         Venus.rotation.y +=0.001;
         Earth.rotation.y +=0.001;
         Mars.rotation.y +=0.001;
         Jupiter.rotation.y +=0.001;
         Saturn.rotation.y +=0.001;
         Uranus.rotation.y +=0.001;
         Neptune.rotation.y +=0.001;
         Ring.rotation.y -=0.001;
         Ring.position.x = Saturn.position.x;
         Ring.position.z = Saturn.position.z;

         if(Rotation_planet_stop == false){
         Mercury.position.x = Math.sin(t*0.2)*12000;
         Mercury.position.z = Math.cos(t*0.2)*12000;

 
         Venus.position.x = Math.sin(t*0.1)*20200;
         Venus.position.z = Math.cos(t*0.1)*20200;

       
         Earth.position.x = Math.sin(t*0.08)*30500;
         Earth.position.z = Math.cos(t*0.08)*33500;

    
         Mars.position.x = Math.sin(t*0.06)*398200;
         Mars.position.z = Math.cos(t*0.06)*398200;

         Jupiter.position.x = Math.sin(t*0.08)*47200;
         Jupiter.position.z = Math.cos(t*0.08)*47200;

 
         Saturn.position.x = Math.sin(t*0.05)*(-57200);
         Saturn.position.z = Math.cos(t*0.05)*(-57200);

        
         Uranus.position.x = Math.sin(t*0.03)*65200;
         Uranus.position.z = Math.cos(t*0.03)*65200;

        
         Neptune.position.x = Math.sin(t*0.01)*(-80200);
         Neptune.position.z = Math.cos(t*0.01)*(-80200);

        // camera.position.y = 8000;
         camera.lookAt(sun.position);
     }
     else
     {
        if(Rotation_planet_stop){
            switch(go_Planet)
            {
                case 1:
            if(camera.position.z>Mercury.position.z)
            {
                camera.position.z-=100;
                camera.lookAt(Mercury.position);
            }
            if(camera.position.x<Mercury.position.x-300){
                camera.position.x+=20;
            }
            if(camera.position.y<Mercury.position.y-300){
                camera.position.y+=20;
            }
            break;
             case 2:
            if(camera.position.z>Venus.position.z)
            {
                camera.position.z-=100;
                camera.lookAt(Venus.position);
            }
            if(camera.position.x<Venus.position.x-300){
                camera.position.x+=20;
            }
            break;
            case 3:
            if(camera.position.z>Earth.position.z)
            {
                camera.position.z-=100;
                camera.lookAt(Earth.position);
            }
            if(camera.position.x<Earth.position.x-300){
                camera.position.x+=20;
            }
            break;
            case 4:
            if(camera.position.z>Mars.position.z)
            {
                camera.position.z-=100;
                camera.lookAt(Mars.position);
            }
            if(camera.position.x<Mars.position.x-300){
                camera.position.x+=20;
            }
            break;
            case 5:
            if(camera.position.z>Jupiter.position.z)
            {
                camera.position.z-=100;
                camera.lookAt(Jupiter.position);
            }
            if(camera.position.x<Jupiter.position.x-1400){
                camera.position.x+=20;
            }
            break;
            case 6:
            if(camera.position.z>Saturn.position.z)
            {
                camera.position.z-=100;
                camera.position.y = 400;
                camera.lookAt(Saturn.position);
            }
            if(camera.position.x<Saturn.position.x-300){
                camera.position.x+=40;
            }
            break;
            case 7:
            if(camera.position.z>Uranus.position.z)
            {
                camera.position.z-=100;
                camera.lookAt(Uranus.position);
            }
            if(camera.position.x<Uranus.position.x-600){
                camera.position.x+=20;
            }
            break;
            case 8:
            if(camera.position.z>Neptune.position.z)
            {
                camera.position.z-=100;
                camera.lookAt(Neptune.position);
            }
            if(camera.position.x<Neptune.position.x-300){
                camera.position.x+=20;
            }
            break;
        }
    }
     }

        
        t+=Math.PI/180*2
        render.render(scene,camera);
        
    }
   
    

	</script>
		<a href="#" class="btn btn-primary btn_top_1">Развернуть Galactic complex hadronsub system</a>
</div>

	</div>

</body>
</html>

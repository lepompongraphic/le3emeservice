<html>
<head>
 
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false">
</script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/
jquery.min.js"></script>
 
</head>
<body>
 
 
<input type="text" id="adresse" value="saisissez votre adresse a geolocaliser" />
<input type="button" onclick="geolocalise()" value="geolocaliser" />
Latitude : <input type="text" id="lat" value="" />
Longitude : <input type="text" id="lng" value="" />
 
<div id="answer">Réponse de l'appel AJAX :</div>
 
 
 
<script type="text/javascript">
 
 /* Déclaration des variables globales */
 var geocoder = new google.maps.Geocoder();
 var addr, latitude, longitude;
 
 /* Fonction chargée de géolocaliser l'adresse */
 function geolocalise(){
  /* Récupération du champ "adresse" */
  addr = document.getElementById('adresse').value;
  /* Tentative de géocodage */
  geocoder.geocode( { 'address': addr}, function(results, status) {
   /* Si géolocalisation réussie */
   if (status == google.maps.GeocoderStatus.OK) {
    /* Récupération des coordonnées */
    latitude = results[0].geometry.location.lat();
    longitude = results[0].geometry.location.lng();
    /* Insertion des coordonnées dans les input text */
    document.getElementById('lat').value = latitude;
    document.getElementById('lng').value = longitude;
    /* Appel AJAX pour insertion en BDD */
    var sendAjax = $.ajax({
     type: "POST",
     url: 'affichage.php',
     data: 'lat='+latitude+'&lng='+longitude+'&adr='+addr,
     success: handleResponse
    });
   }
   function handleResponse(){
    $('#answer').get(0).innerHTML = sendAjax.responseText;
   }
  });
 }
 
</script>
 
</body>
</html>

<?php
 header('Content-type: text/html; charset=ISO-8859-1');
 if(isset($_POST['lat']) && isset($_POST['lng'])){
  $lat = addslashes($_POST['lat']);
  $lng = addslashes($_POST['lng']);
  $adr = addslashes($_POST['adr']);
  $db = mysql_connect("localhost", "root", "");
  $select = mysql_select_db("google", $db);
  mysql_query('INSERT INTO ma_table (lat,lng,adr)
               VALUES ("'.$lat.'","'.$lng.'","'.$adr.'")');
  echo 'Vos coordonnees ont bien été inserees en base de donnees.';
 }else
   echo 'Probleme rencontre dans les valeurs passees en parametres';
?>

<script type="text/javascript">
var addr = [<?php echo $adr ; ?>] ;
for (var i = 0; i < 4; i++){
 function geolocalise(){
 geocoder.geocode( { 'address': addr[i]}, function(results, status) {
//...
</script>

*/
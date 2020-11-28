<?= $this->Html->script('http://maps.google.com/maps/api/js?sensor=true'); ?>
<?= $this->Html->script('http://maps.google.com/maps/api/js?key=AIzaSyCZQoG3hICXoodL_tn1IpX3bxtgiHFUpoA&sensor=true'); ?>

<?php
$map_options = array(
        "id"         => "map_canvas",
        "width"      => "1029px",
        "height"     => "1200px",
        "type"       => "TERRAIN",
        "localize"   => false,
        "zoom"       => 10,
        "address"    => "Recife,Imbiribeira, PE",
        "marker"     => true,
        "infoWindow" => true,
        "zoom"       => 13
      );

?>

<?php $icon =  "http://" . $_SERVER['HTTP_HOST'] . $this->request->webroot . "img/hospital-placeholder.png"; ?>
<?= $this->GoogleMap->map($map_options); ?>

<?php

  $aux = 0;
  foreach ($units as $unit) {
    $aux = 1;
    $name        = $unit['name'];
    $address     = $unit['address'];
    $phone       = $unit['phone'];
    $latitude    = str_replace(",",".",$unit['latitude']);
    $longitude   = str_replace(",",".",$unit['longitude']);
    $specialties = "";
    $aux2 = 0;
    foreach ($unit['specialties'] as $specialty) {
      $specialties .= $specialty['name'];
      $aux2 += $aux2;
      $specialties .= (!empty($unit['specialties'][$aux2])) ? ", " : "";
    }
    // pr($unit);die;
    // pr($unit['specialties'][$aux2]);die;
    $content = "<h4>" . $name . "</h4><br><strong>ENDEREÇO: </strong>" . $address . "<br><strong>TELEFONE(s):</strong>" . $phone . "<br><strong>ESPECIALIDADE(s):</strong> " . $specialties;

    $marker_options = array(
        'showWindow'      => true,
        'windowText'      => $content,
        'markerTitle'     => $name,
        'markerIcon'      => $icon,
        'draggableMarker' => false
      );
     echo  $this->GoogleMap->addMarker("map_canvas", $aux, array("latitude" => $latitude, "longitude" => $longitude),$marker_options);
      $aux += 1;
  }

?>

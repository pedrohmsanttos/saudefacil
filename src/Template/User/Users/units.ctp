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
        "address"    => "Recife, PE",
        "marker"     => true,
        "infoWindow" => true,
        "zoom"       => 13
      );

?>


<?= $this->GoogleMap->map($map_options); ?>

<?php
$marker_options = array(
    'showWindow' => true,
    'windowText' => '<h4>US 123 CS PROFESSOR CESAR MONTEZUMA</h4><br><strong>ENDEREÇO: </strong> AV CAIS DO APOLO, 925/ 1o ANDAR <br><strong>TELEFONE(s):</strong> (81) 3355-4420<br><strong>ESPECIALIDADE(s):</strong> Odontologia, Pediatria',
    'markerTitle' => 'US 123 CS PROFESSOR CESAR MONTEZUMA',
    'markerIcon' => 'http://localhost/saudefacil/img/hospital-placeholder.png',
    'draggableMarker' => false
  );
 ?>
<?= $this->GoogleMap->addMarker("map_canvas", 1, array("latitude" => -8.054086729, "longitude" => -34.87234867),$marker_options); ?>
<?= $this->GoogleMap->addMarker("map_canvas", 2, array("latitude" => -8.004098911, "longitude" => -34.89691814)); ?>

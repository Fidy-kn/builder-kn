<?php
	/*== Flexible Carte Google ==*/
  $location = get_sub_field('map');
?>

  <div class="container-fluid p-0">
    <?= $custom_title; ?>
    
    <?php if( $location && !is_admin()): ?>
    <div class="map__container"></div>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=<?php echo get_field('google_maps', 'options') ?>&callback=initMap"></script>
    <script type="text/javascript">
        function initMap() {
            var macc = {lat: <?= $location['lat']; ?>, lng: <?= $location['lng']; ?>};
            var map = new google.maps.Map( document.querySelector('.map__container'), {zoom: 16, center: macc});
            var marker = new google.maps.Marker({position: macc, map: map});
        }
    </script>
    <?php else : ?>
      <p style="text-align: center;">L'aperçu de la map est désactivée dans le visualiseur pour économiser le nombre de requêtes Google.</p>
    <?php endif; ?>
  </div>

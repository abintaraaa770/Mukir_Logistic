<?php include 'inc/header.php'; ?>

<?php
$lat = $_GET['lat'] ?? '-8.409518';
$lng = $_GET['lng'] ?? '115.188919';
?>

<section class="container mx-auto py-10">

<h2 class="text-3xl font-bold text-center text-blue-700 mb-6">
  Live Tracking
</h2>

<div class="bg-white p-6 rounded shadow">

  <iframe 
    src="https://maps.google.com/maps?q=<?=$lat?>,<?=$lng?>&z=12&output=embed"
    width="100%" height="400">
  </iframe>

</div>

</section>

<?php include 'inc/footer.php'; ?>
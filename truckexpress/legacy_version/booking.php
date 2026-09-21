<?php include 'inc/header.php'; ?>

<section class="container mx-auto max-w-xl bg-white p-8 mt-10 rounded shadow">
  <h2 class="text-3xl font-bold text-center text-blue-700 mb-8">Booking Truk + Sopir</h2>

  <form id="whatsappForm" class="space-y-4">
    <input type="text" id="name" placeholder="Nama Perusahaan / Kontak" required class="w-full p-3 border rounded">
    <input type="text" id="phone" placeholder="No. Telepon" required class="w-full p-3 border rounded">
    <input type="text" id="pickup" placeholder="Lokasi Pengambilan" required class="w-full p-3 border rounded">
    <input type="text" id="dropoff" placeholder="Lokasi Tujuan" required class="w-full p-3 border rounded">
    <input type="number" id="volume" placeholder="Volume Barang (m³)" required class="w-full p-3 border rounded">
    <input type="date" id="date" required class="w-full p-3 border rounded">
    <button type="submit" class="w-full bg-blue-700 text-white py-3 rounded font-semibold hover:bg-blue-800 transition">
      Kirim via WhatsApp
    </button>
  </form>
</section>

<script>
const form = document.getElementById('whatsappForm');
form.addEventListener('submit', function(e){
    e.preventDefault();
    const name = encodeURIComponent(document.getElementById('name').value);
    const phone = encodeURIComponent(document.getElementById('phone').value);
    const pickup = encodeURIComponent(document.getElementById('pickup').value);
    const dropoff = encodeURIComponent(document.getElementById('dropoff').value);
    const volume = encodeURIComponent(document.getElementById('volume').value);
    const date = encodeURIComponent(document.getElementById('date').value);

    const waNumber = "6281234567890"; // Ganti nomor WhatsAppmu

    const message = `Halo Mukir Logistics,%0A%0ASaya ingin booking truk:%0ANama/Perusahaan: ${name}%0ANo. Telepon: ${phone}%0ALokasi Pengambilan: ${pickup}%0ALokasi Tujuan: ${dropoff}%0AVolume Barang: ${volume} m³%0ATanggal Pengiriman: ${date}%0A%0ATerima kasih.`;

    window.open(`https://wa.me/${waNumber}?text=${message}`, '_blank');
});
</script>

<?php include 'inc/footer.php'; ?>
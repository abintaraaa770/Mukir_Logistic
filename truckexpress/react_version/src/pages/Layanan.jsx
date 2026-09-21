import React from 'react';

const Layanan = () => {
  const servicesList = [
    {
      title: "Cold Chain Logistics",
      desc: "Layanan logistik rantai dingin end-to-end untuk menjaga kualitas produk makanan, minuman bersuhu khusus, dan hasil laut. Suhu dipertahankan secara konstan.",
      icon: "❄️"
    },
    {
      title: "Distribusi Farmasi",
      desc: "Pengiriman obat-obatan dan vaksin yang membutuhkan penanganan khusus dan kontrol suhu ketat untuk memenuhi standar keamanan medis tingkat tinggi.",
      icon: "💊"
    },
    {
      title: "Sewa Harian / Bulanan",
      desc: "Kami menawarkan fleksibilitas penyewaan truk pendingin secara harian maupun kontrak bulanan khusus untuk kebutuhan intensitas tinggi di B2B.",
      icon: "📅"
    },
    {
      title: "Pengiriman Antar Kota",
      desc: "Layanan ekspedisi terintegrasi untuk pendistribusian lintas provinsi dengan rute terjadwal dan pelacakan armada real-time yang presisi.",
      icon: "🗺️"
    }
  ];

  return (
    <div className="page-container page-layanan">
      <div className="container">
        <div className="section-header animate-fade-up">
          <h2 className="section-title">Layanan <span className="text-gradient">Unggulan</span> Kami</h2>
          <p className="section-subtitle">Solusi logistik berpendingin yang dirancang untuk menjaga kualitas bisnis Anda dari titik awal hingga tujuan akhir.</p>
        </div>

        <div className="services-grid mt-4">
          {servicesList.map((srv, index) => (
            <div 
              key={index} 
              className="service-detail-card animate-fade-up" 
              style={{ animationDelay: `${(index + 1) * 100}ms` }}
            >
              <div className="service-icon">{srv.icon}</div>
              <h3>{srv.title}</h3>
              <p>{srv.desc}</p>
              <ul className="service-features">
                <li><span className="check">✓</span> Suhu Terpantau 24/7</li>
                <li><span className="check">✓</span> Armada Premium Terawat</li>
                <li><span className="check">✓</span> Sopir Tersertifikasi</li>
              </ul>
            </div>
          ))}
        </div>
        
        <div className="text-center mt-5 mb-5 animate-fade-up delay-400">
          <a href="/booking" className="btn btn-accent btn-wide mt-4">Pesan Layanan Sekarang</a>
        </div>
      </div>
    </div>
  );
};

export default Layanan;

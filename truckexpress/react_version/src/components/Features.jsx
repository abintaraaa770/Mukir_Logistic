import React from 'react';

const Features = () => {
  const features = [
    {
      icon: "🚛",
      title: "Truk Termo/AC Modern",
      desc: "Menjaga barang dengan spesifikasi suhu khusus tetap segar dan aman selama perjalanan jauh."
    },
    {
      icon: "👨‍✈️",
      title: "Sopir Profesional",
      desc: "Tim driver kami bersertifikasi, sangat berpengalaman, dan dilatih untuk standar keamanan tertinggi."
    },
    {
      icon: "⚡",
      title: "Layanan Ekstra Cepat",
      desc: "Kecepatan dan ketepatan waktu pengiriman sangat diandalkan untuk industri skala besar."
    },
    {
      icon: "🌐",
      title: "Tracking Real-time",
      desc: "Sistem pemantauan canggih memungkinkan Anda melacak posisi barang 24/7."
    }
  ];

  return (
    <section id="layanan" className="features">
      <div className="container">
        <div className="section-header animate-fade-up">
          <h2 className="section-title">Kenapa Memilih <span className="text-gradient">Mukir Logistics?</span></h2>
          <p className="section-subtitle">Kami menyediakan ekosistem logistik modern untuk memenuhi standar paling ketat dari bisnis Anda.</p>
        </div>

        <div className="features-grid">
          {features.map((feat, index) => (
            <div 
              key={index} 
              className="feature-card animate-fade-up" 
              style={{ animationDelay: `${(index + 1) * 100}ms` }}
            >
              <div className="feature-icon">{feat.icon}</div>
              <h3>{feat.title}</h3>
              <p>{feat.desc}</p>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
};

export default Features;

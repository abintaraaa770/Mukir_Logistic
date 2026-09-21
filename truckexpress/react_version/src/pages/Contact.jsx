import React from 'react';

const Contact = () => {
  return (
    <div className="page-container page-contact">
      <div className="container">
        <div className="section-header animate-fade-up">
          <h2 className="section-title">Hubungi <span className="text-gradient">Kami</span></h2>
          <p className="section-subtitle">Punya pertanyaan seputar layanan kami? Tim representatif Mukir Logistics siap sedia membantu Anda.</p>
        </div>

        <div className="contact-wrapper mt-4">
          <div className="contact-info animate-fade-up delay-100">
            <div className="info-item">
              <div className="info-icon">📍</div>
              <div>
                <h3>Kantor Pusat</h3>
                <p>Jl. Jend. Sudirman No. 123, SCBD, Jakarta Selatan, 12190</p>
              </div>
            </div>
            
            <div className="info-item">
              <div className="info-icon">📞</div>
              <div>
                <h3>Telepon</h3>
                <p>+62 21 8888 9999<br/>+62 812 3456 7890 (WhatsApp)</p>
              </div>
            </div>
            
            <div className="info-item">
              <div className="info-icon">✉️</div>
              <div>
                <h3>Email</h3>
                <p>hello@mukirlogistics.id<br/>support@mukirlogistics.id</p>
              </div>
            </div>
            
            <div className="info-item">
              <div className="info-icon">⏰</div>
              <div>
                <h3>Jam Operasional</h3>
                <p>Senin - Jumat: 08.00 - 18.00 WIB<br/>Layanan Tracking & Support: 24/7</p>
              </div>
            </div>
          </div>
          
          <div className="contact-action animate-fade-up delay-200">
            <div className="action-card">
              <h3>Ingin Repon Cepat?</h3>
              <p>Tim support kami sedia membalas dalam hitungan menit lewat WhatsApp bisnis kami.</p>
              <a href="https://wa.me/6281234567890?text=Halo%20Mukir%20Logistics%2C%20saya%20punya%20pertanyaan." target="_blank" rel="noreferrer" className="btn btn-accent mt-3">Chat via WhatsApp</a>
            </div>
            
            <div className="action-card mt-3">
              <h3>Butuh Kerja Sama Bisnis?</h3>
              <p>Konsultasikan kebutuhan logistik jangka panjang perusahaan Anda bersama ahli kami.</p>
              <a href="mailto:hello@mukirlogistics.id" className="btn btn-outline mt-3">Kirim Email B2B</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Contact;

import React from 'react';
import { Link } from 'react-router-dom';
import heroImg from '../assets/hero_truck.png';

const Hero = () => {
  return (
    <section id="beranda" className="hero">
      <div className="hero-bg">
        <img src={heroImg} alt="Modern Refrigerated Truck" />
      </div>
      <div className="hero-overlay"></div>
      
      <div className="container hero-content animate-fade-up">
        <div className="hero-badge">Logistik Premium</div>
        <h1>Sewa Truk Termo/AC <br /> <span className="text-gradient">& Sopir Profesional</span></h1>
        <p className="delay-100 animate-fade-up">
          Layanan pengiriman barang sensitif suhu untuk industri besar. Aman, terpercaya, melayani rute dalam kota maupun antar kota. Booking cepat dari platform kami.
        </p>
        <div className="hero-actions delay-200 animate-fade-up">
          <Link to="/booking" className="btn btn-accent">Booking Sekarang</Link>
          <Link to="/layanan" className="btn btn-outline">Pelajari Lebih Lanjut</Link>
        </div>
      </div>
    </section>
  );
};

export default Hero;

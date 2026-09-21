import React from 'react';
import { Link } from 'react-router-dom';

const Cta = () => {
  return (
    <section className="cta">
      <div className="container cta-content animate-fade-up">
        <h2>Siap Melayani Skala Industri</h2>
        <p>Gabung dengan ribuan partner bisnis yang telah mempercayakan pengiriman mereka pada ekosistem Mukir Logistics.</p>
        <Link to="/booking" className="btn btn-accent" style={{ fontSize: '1.2rem', padding: '1rem 3rem' }}>Mulai Pengiriman Hari Ini</Link>
      </div>
    </section>
  );
};

export default Cta;

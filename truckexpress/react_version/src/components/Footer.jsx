import React from 'react';

const Footer = () => {
  return (
    <footer id="kontak" className="footer">
      <div className="container">
        <h3 className="text-gradient" style={{ fontFamily: 'Outfit', fontSize: '2rem', marginBottom: '1rem'}}>
          Mukir Logistics
        </h3>
        <p style={{ color: 'var(--text-muted)' }}>
          Jl. Logistik Utama No. 99, Jakarta. <br/>
          &copy; {new Date().getFullYear()} Mukir Logistics. Hak Cipta Dilindungi.
        </p>
      </div>
    </footer>
  );
};

export default Footer;

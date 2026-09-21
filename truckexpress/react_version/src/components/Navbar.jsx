import React, { useState, useEffect } from 'react';
import { Link, useLocation } from 'react-router-dom';

const Navbar = () => {
  const [scrolled, setScrolled] = useState(false);
  const location = useLocation();

  useEffect(() => {
    const handleScroll = () => {
      setScrolled(window.scrollY > 50);
    };
    window.addEventListener('scroll', handleScroll);
    return () => window.removeEventListener('scroll', handleScroll);
  }, []);

  return (
    <nav className={`navbar ${scrolled ? 'scrolled' : ''}`}>
      <div className="container nav-content">
        <Link to="/" className="logo">
          <span className="logo-icon">❅</span> Mukir Logistics
        </Link>
        <ul className="nav-links">
          <li><Link to="/" className={location.pathname === '/' ? 'active' : ''}>Beranda</Link></li>
          <li><Link to="/layanan" className={location.pathname === '/layanan' ? 'active' : ''}>Layanan</Link></li>
          <li><Link to="/contact" className={location.pathname === '/contact' ? 'active' : ''}>Kontak</Link></li>
        </ul>
        <Link to="/booking" className="btn btn-primary" style={{ display: 'none' }}>
          Booking
        </Link>
      </div>
    </nav>
  );
};

export default Navbar;

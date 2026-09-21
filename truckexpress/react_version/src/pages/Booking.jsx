import React, { useState } from 'react';

const Booking = () => {
  const [formData, setFormData] = useState({
    name: '',
    phone: '',
    origin: '',
    destination: '',
    truckType: 'Thermo 4 Roda',
    date: ''
  });

  const handleChange = (e) => {
    setFormData({ ...formData, [e.target.name]: e.target.value });
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    
    // Format message for WhatsApp
    const message = `Halo Mukir Logistics, saya ingin melakukan booking pengiriman:%0A%0A` +
      `*Nama*: ${formData.name}%0A` +
      `*Nomor HP*: ${formData.phone}%0A` +
      `*Alamat Asal*: ${formData.origin}%0A` +
      `*Alamat Tujuan*: ${formData.destination}%0A` +
      `*Tipe Truk*: ${formData.truckType}%0A` +
      `*Tanggal Pengiriman*: ${formData.date}%0A%0A` +
      `Mohon info lebih lanjut. Terima kasih!`;
      
    // Owner WA number
    const waNumber = '6281234567890'; // User can change this later
    const waUrl = `https://wa.me/${waNumber}?text=${message}`;
    
    window.open(waUrl, '_blank');
  };

  return (
    <div className="page-container page-booking">
      <div className="container animate-fade-up">
        <div className="section-header">
          <h2 className="section-title">Form <span className="text-gradient">Booking</span></h2>
          <p className="section-subtitle">Isi form di bawah ini dan kami akan memproses pengiriman Anda melalui WhatsApp dengan cepat.</p>
        </div>
        
        <div className="booking-card">
          <form className="booking-form" onSubmit={handleSubmit}>
            <div className="form-group">
              <label htmlFor="name">Nama Lengkap / Perusahaan</label>
              <input type="text" id="name" name="name" value={formData.name} onChange={handleChange} required placeholder="Masukkan nama Anda atau perusahaan" />
            </div>
            
            <div className="form-group">
              <label htmlFor="phone">Nomor HP/WhatsApp</label>
              <input type="tel" id="phone" name="phone" value={formData.phone} onChange={handleChange} required placeholder="Contoh: 081234567890" />
            </div>
            
            <div className="form-row">
              <div className="form-group">
                <label htmlFor="origin">Alamat Penjemputan (Asal)</label>
                <textarea id="origin" name="origin" value={formData.origin} onChange={handleChange} required placeholder="Detail alamat asal pengiriman"></textarea>
              </div>
              
              <div className="form-group">
                <label htmlFor="destination">Alamat Tujuan</label>
                <textarea id="destination" name="destination" value={formData.destination} onChange={handleChange} required placeholder="Detail alamat tujuan pengiriman"></textarea>
              </div>
            </div>
            
            <div className="form-row">
              <div className="form-group">
                <label htmlFor="truckType">Jenis Truk / Layanan</label>
                <select id="truckType" name="truckType" value={formData.truckType} onChange={handleChange}>
                  <option value="Thermo 4 Roda">Thermo 4 Roda</option>
                  <option value="Thermo 6 Roda">Thermo 6 Roda</option>
                  <option value="Fuso Pendingin">Fuso Pendingin</option>
                  <option value="Truk Khusus Farmasi">Truk Khusus Farmasi (Suhu Ketat)</option>
                </select>
              </div>
              
              <div className="form-group">
                <label htmlFor="date">Tanggal Pengiriman</label>
                <input type="date" id="date" name="date" value={formData.date} onChange={handleChange} required />
              </div>
            </div>
            
            <button type="submit" className="btn btn-accent btn-wide mt-4">Kirim</button>
          </form>
        </div>
      </div>
    </div>
  );
};

export default Booking;

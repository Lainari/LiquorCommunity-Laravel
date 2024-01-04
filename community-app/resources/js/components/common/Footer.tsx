import React from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css';
import 'footer.css';

const Footer: React.FC = () => {
  return (
    <footer className="footer-container">
      <hr />
      <h4 className="footer-title">Join Social Network</h4>
      <div className="social-icons">
        <a href="https://www.instagram.com/jsk_mera/" target="_blank" rel="noreferrer">
          <i className="fab fa-instagram fa-3x"></i>
        </a>
        <a href="https://discord.gg/ZQXauzNAZY" target="_blank" rel="noreferrer">
          <i className="fab fa-discord fa-3x"></i>
        </a>
        <a href="https://github.com/Lainari" target="_blank" rel="noreferrer">
          <i className="fab fa-github fa-3x"></i>
        </a>
      </div>
    </footer>
  );
};

export default Footer;
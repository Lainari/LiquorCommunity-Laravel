import React from 'react';
import { Link } from 'react-router-dom';
import '../header.css';
import 'bootstrap/dist/css/bootstrap.min.css';

const Header: React.FC = () => {
  const [isLoggedIn, setIsLoggedIn] = React.useState(false);
  const [isAdmin, setIsAdmin] = React.useState(false);
  const logoSrc = '/image/whisky-whiskey-svgrepo-com.svg';

  const logout = (event: React.MouseEvent<HTMLAnchorElement, MouseEvent>) => {
    event.preventDefault();
    // 로그아웃 로직 구현
  };

  return (
    <header className="header-container">
      <div className="header">
        <Link to="/" className="text-decoration-none text-body">
          <div className="d-flex align-items-center">
            <img className="logo" src="/image/whisky-whiskey-svgrepo-com.svg" alt="logo" />
            <h2 className="title">WhiskyCommunity</h2>
          </div>
        </Link>
      </div>
      {/* 나머지 코드는 생략 */}
    </header>
  );
};

export default Header;
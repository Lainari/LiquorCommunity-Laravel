import React from "react";
import jwt from 'jsonwebtoken';
import { NavLink } from "react-router-dom";
import { User } from '../../interface/user';
import 'header.css';
import 'bootstrap/dist/css/bootstrap.min.css';

const Header = () => {
  const token = localStorage.getItem('token'); 
  let user: User | null = null;
  if (token) {
    // 토큰을 디코드하여 사용자 정보를 얻음
    user = jwt.decode(token) as User;
  }

  return (
    <header className="header-container">
      <link rel="stylesheet" href="header.css" />
      <div className="header">
        <NavLink to="/" className="text-decoration-none text-body">
          <div className="d-flex align-items-center">
            <img className="logo" src="whisky-whiskey-svgrepo-com.svg" alt="logo" />
            <h2 className="title">WhiskyCommunity</h2>
          </div>
        </NavLink>
      </div>
      <div className="nav-container">
        <nav className="navbar navbar-expand-lg rounded-3" style={{ backgroundColor: "#cc732d" }}>
          <div className="container-fluid">
            <div className="collapse navbar-collapse" id="navbarSupportedContent">
              <ul className="navbar-nav me-auto mb-2 mb-lg-0">
                <li className="nav-item me-3">
                  <NavLink className="nav-link active" to="/">홈페이지 소개</NavLink>
                </li>
                <li className="nav-item dropdown me-3">
                  <NavLink className="nav-link dropdown-toggle" to="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    위스키
                  </NavLink>
                  <ul className="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><NavLink className="dropdown-item" to="/whisky/info">정보</NavLink></li>
                    <li><NavLink className="dropdown-item" to="/whisky/review">리뷰</NavLink></li>
                  </ul>
                </li>
                <li className="nav-item dropdown me-3">
                  <NavLink className="nav-link dropdown-toggle" to="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    마이페이지
                  </NavLink>
                  <ul className="dropdown-menu" aria-labelledby="navbarDropdown">
                    {user ?
                      <>
                        {user.isAdmin &&
                          <li><NavLink className="dropdown-item" to="/manager/approve">게시글 승인</NavLink></li>
                        }
                        <li><NavLink className="dropdown-item" to="/" onClick={(e) => { e.preventDefault(); /* 로그아웃 함수 */ }}>로그아웃</NavLink></li>
                        <li><NavLink className="dropdown-item" to="/mypage/info">내정보</NavLink></li>
                      </>
                      :
                      <li><NavLink className="dropdown-item" to="/mypage/signin">로그인</NavLink></li>}
                  </ul>
                </li>
              </ul>
              <form className="d-flex" role="search" method="post" action="/whisky/search">
                <input className="form-control me-2" type="search" placeholder="위스키명으로 검색" aria-label="Search" name="query" />
                <button className="btn btn-warning" type="submit">Search</button>
              </form>
            </div>
          </div>
        </nav>
      </div>
    </header>
  );
};

export default Header;
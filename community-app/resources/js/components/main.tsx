import React from 'react';
import './css/main.css';
import Header from './common/Header';
import Footer from './common/Footer';

const mainImage = './image/main/KakaoTalk_20231026_193719601.jpg';

const MainPage: React.FC = () => {
    return (
        <html lang="ko">
        <head>
            <meta charSet="UTF-8"/>
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
            <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
            <title>위스키 커뮤니티</title>
        </head>
        <body>
            <Header />
            <div className="main-body container">
                <div className="row align-items-center m-1">
                    <div className="col-6 text-left">
                        <h2 className="page-intro">What is WhiskyCommunity?</h2>
                        <br/>
                        <p className="page-intro-content">
                            이 곳, 위스키 커뮤니티(WhiskyCommunity)는 <br/>
                            세계 어느 술이면 다 좋은 애주가들이 <br/>
                            자신이 아는 위스키의 정보를 공유하고 <br/>
                            혼자서 탐구하거나 여럿이 즐길 수 있는 <br/>
                            주류 문화 커뮤니티 사이트입니다.
                        </p>
                        <button className="btn btn-info" onClick={() => window.location.href='/whisky/info'}>
                            위스키 보러가기
                        </button>
                    </div>
                    <div className="col-6">
                        <img src={mainImage} alt="main_image" className="img-fluid rounded-3"/>
                    </div>
                </div>
            </div>
            <Footer />
        </body>
        </html>
    );
};

export default MainPage;

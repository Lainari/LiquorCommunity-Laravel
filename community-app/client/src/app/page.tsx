import React from 'react';
import { NextPage } from 'next';
import Image from 'next/image';
import RootLayout from './layout';

const Home: NextPage = () => {
  return (
    <RootLayout>
      <div className="container mx-auto">
        <div className="flex justify-between my-4">
          <div className="w-1/2">
            <h2 className="text-2xl">What is WhiskyCommunity?</h2>
            <p className="my-4">
              이 곳, 위스키 커뮤니티(WhiskyCommunity)는 <br />
              세계 어느 술이면 다 좋은 애주가들이 <br />
              자신이 아는 위스키의 정보를 공유하고 <br />
              혼자서 탐구하거나 여럿이 즐길 수 있는 <br />
              주류 문화 커뮤니티 사이트입니다.
            </p>
            <button className="btn btn-info">위스키 보러가기</button>
          </div>
          <div className="w-1/2">
            이미지 들어갈 곳
          </div>
        </div>
      </div>
    </RootLayout>
  );
};

export default Home;
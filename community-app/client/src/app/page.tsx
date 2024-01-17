'use client';

import React, { useEffect, useState } from 'react';
import { NextPage } from 'next';
import Image from 'next/image';
import RootLayout from './layout';
import { getAdminNickname } from '../services';

const Home: NextPage = () => {
  const [adminNickname, setAdminNickname] = useState('');

  useEffect(() => {
    getAdminNickname().then(data => setAdminNickname(data));
  }, []);

  return (
    <RootLayout>
      <div className="container mx-auto">
        <div className="flex justify-between my-4">
          <div className="w-1/2">
            <h2 className="text-2xl">What is WhiskyCommunity?</h2>
            <p className="my-4">
              데이터 베이스 확인
            </p>
          </div>
          <div className="w-1/2">
            관리자 명 : {adminNickname}
          </div>
        </div>
      </div>
    </RootLayout>
  );
};

export default Home;
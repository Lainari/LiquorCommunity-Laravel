// 'use client';

import React, { useEffect, useState } from 'react';
import { NextPage } from 'next';
import Image from 'next/image';
import RootLayout from './layout';
// import { getAdminNickname } from '../services';

const Home: NextPage = () => {
  // const [adminNickname, setAdminNickname] = useState('');

  // useEffect(() => {
  //   getAdminNickname().then(data => setAdminNickname(data));
  // }, []);

  return (
    <>
      <h2 className='mb-3 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-4xl lg:text-5xl'>Welcome to WhiskyCommunity</h2>
      Hello, User!
    </>
  );
};

export default Home;
'use client';

import {useEffect, useState} from 'react';
import Image from 'next/image';
import userAPI from '../api/user';
import {UserData} from '@/app/interfaces/api/user';

const MyPage = () => {
  const [userData, setUserData] = useState<UserData | null>(null);
  const handleGetUserInfo = async () => {
    const userData = await userAPI.getUserId();
    const userInfo = await userAPI.getUserInfo(userData.user.id);
    setUserData(userInfo.user);
  };

  useEffect(() => {
    handleGetUserInfo();
  }, []);

  return (
    <div className="bg-white w-1/2 rounded-lg my-4">
      <p className="my-6 text-3xl text-center font-bold">My Page</p>
      {userData && (
        <div className="flex justify-center mt-10">
          <div className="border border-gray-300 rounded-full overflow-hidden mr-10">
            <Image
              src={userData.profile}
              alt={'profile'}
              width={200}
              height={200}
              className="p-6"
            />
          </div>
          <div className="flex flex-col justify-center">
            <div className="mb-4">
              <p className="text-2xl font-bold">Name: {userData.name}</p>
            </div>
            <div>
              <p className="text-2xl font-bold">Email: {userData.email}</p>
            </div>
          </div>
        </div>
      )}
    </div>
  );
};

export default MyPage;

'use client';

import {useEffect, useState} from 'react';
import Image from 'next/image';
import userAPI from '../api/user';
import {UserData} from '@/app/interfaces/api/user';
import ProfileEditModal from './ProfileEditModal';

const MyPage = () => {
  const [userData, setUserData] = useState<UserData | null>(null);
  const [isLoading, setIsLoading] = useState<boolean>(true);
  const [modalIsOpen, setModalIsOpen] = useState<boolean>(false);

  const handleGetUserInfo = async () => {
    setIsLoading(true);
    const userData = await userAPI.getUserId();
    const userInfo = await userAPI.getUserInfo(userData.user.id);
    setUserData(userInfo.user);
    setIsLoading(false);
  };

  const handleOpenModal = () => {
    setModalIsOpen(true);
  };

  useEffect(() => {
    handleGetUserInfo();
  }, []);

  return (
    <div className="bg-white w-1/2 rounded-lg my-4">
      <p className="my-6 text-3xl text-center font-bold">My Page</p>
      {isLoading ? (
        <div className="mt-20 flex justify-center items-center">
          <Image
            src={'/images/loading.gif'}
            alt={'loading'}
            width={200}
            height={200}
          />
        </div>
      ) : (
        userData && (
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
                <p className="text-2xl font-bold text-center">
                  Name: {userData.name}
                </p>
              </div>
              <div className="mt-2 mb-4">
                <p className="text-2xl font-bold text-center">
                  Email: {userData.email}
                </p>
              </div>
              <div className="flex justify-center items-center mt-2">
                <div
                  className="mx-6 flex justify-center items-center border rounded-lg w-32 h-12 bg-sky-400 cursor-pointer"
                  onClick={handleOpenModal}
                >
                  <p className="text-xl">Edit Profile</p>
                </div>
                <div className="mx-6 flex justify-center items-center border rounded-lg w-44 h-12 bg-rose-400 cursor-pointer">
                  <p className="text-xl">Delete Account</p>
                </div>
              </div>
            </div>
          </div>
        )
      )}
      <ProfileEditModal
        modalIsOpen={modalIsOpen}
        setModalIsOpen={setModalIsOpen}
        image={userData?.profile}
        id={userData?.id}
        currentName={userData?.name}
        currentEmail={userData?.email}
      />
    </div>
  );
};

export default MyPage;

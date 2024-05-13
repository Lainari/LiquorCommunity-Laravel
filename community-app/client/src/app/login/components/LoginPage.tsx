'use client';

import Image from 'next/image';
import loginRequest from '@/app/api/loginRequest';
import loginPageImages from '/public/images/login';

const LoginPage = () => {
  const handleGoogleLogin = () => {
    loginRequest();
  };

  return (
    <div className="mt-4 w-1/2 flex items-center bg-white rounded-lg shadow border mb-4">
      <div className="p-6 space-y-4 flex-1">
        <div className="mb-10">
          <p className="text-3xl text-center font-bold leading-tight tracking-tight text-gray-900">
            Sign in to your account
          </p>
          <p className="text-center font-bold text-gray-400">
            You can enjoy to use social signin, Join us!
          </p>
        </div>
        <div className="flex justify-center mb-4">
          <Image
            className="flex sm:max-w-md rounded-lg shadow border md:mt-0 xl:p-0"
            src={loginPageImages.pub}
            width={500}
            height={500}
            alt="LoginImage"
          />
        </div>
        <div className="flex justify-center">
          <div
            className="w-3/4 text-white bg-black hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mt-10"
            onClick={handleGoogleLogin}
          >
            Sign in with Google
          </div>
        </div>
      </div>
    </div>
  );
};

export default LoginPage;

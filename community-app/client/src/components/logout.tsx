'use client';

import {LogoutRequest} from '@/services';

export default function Logout() {
  const handleLogout = async () => {
    const response = await LogoutRequest();

    if (response.status >= 200 && response.status < 300) {
      alert('로그아웃 성공');
    } else {
      alert('로그아웃 실패 : 서버 에러');
      console.log(Error);
    }
  };
  return (
    <button
      className="text-xl text-black hover:text-gray-500"
      onClick={() => {
        if (window.confirm('Do you want to sign out?')) {
          handleLogout();
        }
      }}
    >
      Logout
    </button>
  );
}

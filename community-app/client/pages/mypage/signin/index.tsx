import React, { useState } from 'react';
import Link from 'next/link';
import Head from 'next/head';

function SignInPage() {
  const [id, setId] = useState('');
  const [password, setPassword] = useState('');
  const [message, setMessage] = useState(null);

  const handleSubmit = (event) => {
    event.preventDefault();
  };

  return (
    <div>
      <Head>
        <title>로그인</title>
        <link rel="stylesheet" href="/path/to/signin.css" />  // 전역 CSS를 사용하는 경우
      </Head>
      <div>
        <form onSubmit={handleSubmit}>
          <div>
            <label htmlFor="id">아이디</label>
            <input type="text" id="id" name="id" required onChange={(e) => setId(e.target.value)} />
          </div>
          <div>
            <label htmlFor="password">비밀번호</label>
            <input type="password" id="password" name="password" required onChange={(e) => setPassword(e.target.value)} />
          </div>
          <input type="submit" value="로그인" />
        </form>
        <p>
          <Link href="/mypage/signup">아직 계정이 없으신가요?</Link>
        </p>
        {message && (
          <div>
            {message}
          </div>
        )}
      </div>
    </div>
  );
}

export default SignInPage;
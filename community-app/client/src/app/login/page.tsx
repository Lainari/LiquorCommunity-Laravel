'use client';
import {useEffect} from 'react';
import LoginPage from './components/LoginPage';

const Login = () => {
  const handleGoogleLogin = () => {
    window.location.href = 'http://localhost:8000/login';
  };

  useEffect(() => {
    const loginButton = document.getElementById('googleLoginButton');
    if (loginButton) {
      loginButton.addEventListener('click', handleGoogleLogin);

      return () => {
        loginButton.removeEventListener('click', handleGoogleLogin);
      };
    } else {
      return;
    }
  }, []);

  return (
    <>
      <LoginPage />
    </>
  );
};

export default Login;

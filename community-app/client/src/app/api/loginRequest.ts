import loginHref from './loginHref';

const loginRequest = () => {
  const res = loginHref('/login');

  return res;
};

export default loginRequest;

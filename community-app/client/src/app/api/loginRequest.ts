import req from './apiUtils';

const loginRequest = () => {
  const res = req('/login');

  return res;
};

export default loginRequest;

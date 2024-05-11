import req from '../apiUtils';

const postUserLogout = async () => {
  const response = await req('/user', 'POST');
  return response;
};

export default postUserLogout;

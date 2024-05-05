import req from '../apiUtils';

const getUserInfo = async () => {
  const response = await req('/user', 'GET');
  return response.data;
};

export default getUserInfo;

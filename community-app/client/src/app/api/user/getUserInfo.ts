import req from '../apiUtils';

const getUserInfo = async (id: number) => {
  const response = await req(`/user/${id}`, 'GET');
  return response.data;
};

export default getUserInfo;

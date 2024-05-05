import req from '../apiUtils';

const getUserId = async () => {
  const response = await req('/userId', 'GET');
  return response.data;
};

export default getUserId;

import req from './apiUtils';

const getJWT = async () => {
  const res = await req('/token', 'GET');
  return res.data;
};

export default getJWT;

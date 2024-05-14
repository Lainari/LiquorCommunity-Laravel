import req from '../apiUtils';

const getPosts = async () => {
  const response = await req('/whisky', 'GET');
  return response.data;
};

export default getPosts;

import req from '../apiUtils';

const deleteUser = async (id: number) => {
  const response = await req(`/user/${id}`, 'DELETE');
  return response;
};

export default deleteUser;

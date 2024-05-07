import req from '../apiUtils';

const patchUserProfile = async (id: number, data: FormData) => {
  data.append('_method', 'PATCH');

  const res = await req(`/user/${id}`, 'POST', data);
  return res;
};

export default patchUserProfile;

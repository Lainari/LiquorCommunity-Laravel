import deleteUser from './deleteUser';
import getUserId from './getUserId';
import getUserInfo from './getUserInfo';
import patchUserProfile from './patchUserProfile';
import postUserLogout from './postUserLogout';

const userAPI = {
  deleteUser,
  getUserId,
  getUserInfo,
  patchUserProfile,
  postUserLogout,
};

export default userAPI;

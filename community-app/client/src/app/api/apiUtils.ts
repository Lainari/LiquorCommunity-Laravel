import axios from 'axios';
import getJWT from './getJWT';
import Cookies from 'js-cookie';

export const BASE_URL = 'http://localhost:8000/api';

const req = async (
  location: string,
  method: RequestInit['method'],
  data: BodyInit | null | undefined = undefined
) => {
  let token;
  if (location !== '/token') {
    const jwtResponse = await getJWT();
    token = jwtResponse.hasJwtSession;
  }
  const headers: {Authorization?: string; 'X-Xsrf-Token'?: string} = token
    ? {Authorization: `Bearer ${token}`}
    : {};
  if (method !== 'GET') {
    const csrfToken = Cookies.get('XSRF-TOKEN');
    headers['X-Xsrf-Token'] = csrfToken;
  }

  const res = await axios({
    url: BASE_URL + location,
    method,
    data,
    headers,
    withCredentials: true,
  });

  return res;
};

export default req;

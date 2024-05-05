import axios from 'axios';

export const BASE_URL = 'http://localhost:8000/api';

const req = async (
  location: string,
  method: RequestInit['method'],
  data: BodyInit | null | undefined = undefined
) => {
  const res = await axios({
    url: BASE_URL + location,
    method,
    data,
    withCredentials: true,
  });

  return res;
};

export default req;

import axios from 'axios';

axios.defaults.withCredentials = true;
axios.defaults.xsrfCookieName = 'XSRF-TOKEN';
axios.defaults.xsrfHeaderName = 'X-CSRF-TOKEN';

export default async function logoutRequest() {
  const response = await axios.post(
    'http://localhost:8000/logout',
    {},
    {
      withCredentials: true,
    }
  );

  console.log(response);

  return response;
}

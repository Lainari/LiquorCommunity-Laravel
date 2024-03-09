import axios from 'axios';
import {deleteCookie} from 'cookies-next';

axios.defaults.withCredentials = true;
axios.defaults.xsrfCookieName = 'XSRF-TOKEN';
axios.defaults.xsrfHeaderName = 'X-CSRF-TOKEN';

export default async function logoutRequest() {
  const response = await axios.post('http://localhost:8000/logout', {
    withCredentials: true,
  });

  console.log(response);

  if (response.status >= 200 && response.status < 300) {
    deleteCookie('laravel_session');
    deleteCookie('XSRF-TOKEN');

    window.location.href = 'http://localhost:3000';
  }

  return response;
}

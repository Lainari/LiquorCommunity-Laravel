import axios from 'axios';

axios.defaults.withCredentials = true;
axios.defaults.xsrfCookieName = 'XSRF-TOKEN';
axios.defaults.xsrfHeaderName = 'X-CSRF-TOKEN';

const logoutRequest = async () => {
  const response = await axios.post('http://localhost:8000/logout', {
    withCredentials: true,
  });

  console.log(response);

  if (response.status >= 200 && response.status < 300) {
    window.location.href = 'http://localhost:3000';
  }

  return response;
};

export default logoutRequest;

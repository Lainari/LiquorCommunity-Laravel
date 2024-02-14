async function getCsrfToken() {
  const response = await fetch('http://localhost:8000/csrf-cookie');
  const data = await response.json();
  return data.csrfToken;
}

export default async function logoutRequest() {
  const csrfToken = await getCsrfToken();
  const response = await fetch('http://localhost:8000/logout', {
    method: 'POST',
    headers: {
      'X-CSRF-Token': csrfToken,
    },
    credentials: 'include',
  });

  console.log(response);

  return response;
}

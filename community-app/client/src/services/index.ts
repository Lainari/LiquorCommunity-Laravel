export const getAdminNickname = async () => {
    const response = await fetch('http://localhost:8000/api/admin/nickname');
    const data = await response.json();
    return data;
  };
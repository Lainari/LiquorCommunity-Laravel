import req from '../apiUtils';

interface PostCreatePostProps {
  formData: FormData;
}

const postCreatePost = async ({formData}: PostCreatePostProps) => {
  const response = await req('/whisky', 'POST', formData);
  return response.data;
};

export default postCreatePost;

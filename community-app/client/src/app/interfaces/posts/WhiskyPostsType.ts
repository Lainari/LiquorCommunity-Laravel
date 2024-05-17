interface WhiskyPostsType {
  id: number;
  title: string;
  images: {path: string}[];
  content: string;
  user_id: number;
}

export default WhiskyPostsType;

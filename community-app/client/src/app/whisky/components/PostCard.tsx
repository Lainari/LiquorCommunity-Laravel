'use client';

import {useState, useEffect} from 'react';
import whiskyAPI from '@/app/api/whisky';
import {WhiskyPostsType} from '@/app/interfaces/posts';

const PostCard = () => {
  const [posts, setPosts] = useState<WhiskyPostsType[]>([]);
  const getPosts = async () => {
    const response = await whiskyAPI.getPosts();
    setPosts(response.data);
  };
  useEffect(() => {
    getPosts();
  }, posts);

  if (!posts || posts.length === 0) {
    return (
      <div className="text-center">
        <div className="bg-gray-200 px-6 py-8 rounded-md">
          <p className="text-xl text-gray-500">No posts in this Page</p>
        </div>
      </div>
    );
  } else {
    return (
      <div>
        {posts.map(post => (
          <div key={post.id}>
            <h2>{post.title}</h2>
            <p>{post.content}</p>
          </div>
        ))}
      </div>
    );
  }
};

export default PostCard;

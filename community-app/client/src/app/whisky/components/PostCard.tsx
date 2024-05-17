'use client';

import {useState, useEffect} from 'react';
import Image from 'next/image';
import whiskyAPI from '@/app/api/whisky';
import {WhiskyPostsType} from '@/app/interfaces/posts';

const PostCard = () => {
  const [posts, setPosts] = useState<WhiskyPostsType[]>([]);
  const getPosts = async () => {
    const response = await whiskyAPI.getPosts();
    setPosts(response);
  };
  useEffect(() => {
    getPosts();
  }, []);

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
            <p className="text-2xl">{post.title}</p>
            <Image
              src={post.images[0].path}
              alt={post.title}
              width={30}
              height={30}
            />
            <p>{post.content}</p>
          </div>
        ))}
      </div>
    );
  }
};

export default PostCard;

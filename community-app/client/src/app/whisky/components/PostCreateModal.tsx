'use client';

import {useEffect, useState} from 'react';
import Image from 'next/image';
import whiskyAPI from '@/app/api/whisky';
import {WhiskyCreateModalProps} from '@/app/interfaces/posts';
import {UserData} from '@/app/interfaces/api/user';
import postIcons from '@/../public/svgs/posts';
import userAPI from '@/app/api/user';

interface PostFormData {
  title: string;
  content: string;
  image: File | null;
  region: string;
  alcohol: number;
  material: string;
  user_id: number;
}

const PostCreateModal = ({isOpen, onClose}: WhiskyCreateModalProps) => {
  const [userData, setUserData] = useState<UserData>();
  const [form, setForm] = useState<PostFormData>({
    title: '',
    content: '',
    image: null,
    region: '',
    alcohol: 0,
    material: '',
    user_id: 0,
  });

  const getUserId = async () => {
    const userData = await userAPI.getUserId();
    const userInfo = await userAPI.getUserInfo(userData.user.id);
    setUserData(userInfo.user);
  };

  const handleChange = (
    event: React.ChangeEvent<HTMLInputElement | HTMLTextAreaElement>
  ) => {
    const {id, value} = event.target;
    setForm(prevForm => ({...prevForm, [id]: value}));
  };

  const handleImageChange = (event: React.ChangeEvent<HTMLInputElement>) => {
    const files = event.target.files;
    if (files && files.length > 0) {
      setForm(prevForm => ({...prevForm, image: files[0]}));
    }
  };

  const handleModalClose = () => {
    onClose();
  };

  const handlePostCreate = async () => {
    const formData = new FormData();
    formData.append('title', form.title);
    formData.append('content', form.content);
    formData.append('region', form.region);
    formData.append('alcohol', form.alcohol.toString());
    formData.append('material', form.material);
    if (userData) {
      formData.append('user_id', userData.id.toString());
    }
    if (form.image) {
      formData.append('images', form.image);
    }
    try {
      await whiskyAPI.postCreatePost({formData});
      alert('Post created successfully');
      handleModalClose();
    } catch (error) {
      console.error(error);
    }
  };

  useEffect(() => {
    getUserId();
  }, []);

  useEffect(() => {
    if (userData) {
      setForm(prevForm => ({...prevForm, userId: userData.id}));
    }
  }, [userData]);

  if (!isOpen) {
    return null;
  }

  return (
    <div className="fixed inset-0 flex items-center justify-center z-50 bg-black/50">
      <div className="bg-white rounded-lg shadow-lg w-2/5 h-5/6 p-6 overflow-auto">
        <h2 className="text-3xl text-center font-bold mb-4">
          Create Whisky Post
        </h2>
        <div className="space-y-4">
          <div className="mt-6">
            <p className="block text-xl font-bold mb-1">Title</p>
            <input
              id="title"
              value={form.title}
              onChange={handleChange}
              className="p-1 ps-3 border rounded-md w-full"
              placeholder="Enter the title"
            />
          </div>
          <div className="grid w-full items-center gap-4">
            <div className="space-y-2">
              <h3 className="text-lg font-semibold">Upload an Image</h3>
              <p className="text-gray-500 dark:text-gray-400">
                Drag and drop or click to select an image file.
              </p>
            </div>
            <div className="relative flex h-32 w-full cursor-pointer items-center justify-center rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 transition-colors hover:border-gray-400 ">
              <input
                className="absolute inset-0 z-10 h-full w-full cursor-pointer opacity-0"
                type="file"
                onChange={handleImageChange}
              />
              <div className="pointer-events-none z-0 flex flex-col items-center gap-2">
                <Image
                  className="h-8 w-8 text-gray-400 group-hover:text-gray-500"
                  src={postIcons.upload}
                  alt={'uploadIcon'}
                  width={32}
                  height={32}
                />
                <p className="text-sm text-gray-500">
                  Drag and drop or click to upload
                </p>
              </div>
            </div>
          </div>
          <div>
            <p className="text-md font-bold">Region</p>
            <input
              id="region"
              type="text"
              className="p-1 ps-3 border rounded-md w-full"
              placeholder="Enter the Region"
              onChange={handleChange}
              value={form.region}
            />
          </div>
          <div>
            <p className="text-md font-bold">Alcohol</p>
            <input
              id="alcohol"
              type="text"
              className="p-1 ps-3 border rounded-md w-full"
              placeholder="Enter the Alcohol"
              onChange={handleChange}
              value={form.alcohol}
            />
          </div>
          <div>
            <p className="text-md font-bold">Material</p>
            <input
              id="material"
              type="text"
              className="p-1 ps-3 border rounded-md w-full"
              placeholder="Enter the Material"
              onChange={handleChange}
              value={form.material}
            />
          </div>
          <div className="mt-2">
            <p className="block text-md font-bold mb-1">Content</p>
            <textarea
              id="content"
              className="p-1 ps-3 border rounded-md w-full"
              placeholder="Enter the content"
              rows={5}
              value={form.content}
              onChange={handleChange}
            />
          </div>
          <div className="flex justify-end gap-2">
            <button className="px-4 py-2" onClick={handleModalClose}>
              Cancel
            </button>
            <button
              className="px-4 py-2"
              type="button"
              onClick={handlePostCreate}
            >
              Create Post
            </button>
          </div>
        </div>
      </div>
    </div>
  );
};

export default PostCreateModal;

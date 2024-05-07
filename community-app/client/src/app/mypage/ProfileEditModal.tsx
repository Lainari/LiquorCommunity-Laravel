import Image from 'next/image';
import {ChangeEvent, useState} from 'react';
import userAPI from '../api/user';
import ProfileEditModalProps from '../interfaces/user/ProfileEditModal';

const ProfileEditModal = ({
  modalIsOpen,
  setModalIsOpen,
  image,
  id,
  currentName,
  currentEmail,
}: ProfileEditModalProps) => {
  const [name, setName] = useState(currentName);
  const [email, setEmail] = useState(currentEmail);
  const [profileImage, setProfileImage] = useState<File | null>(null);
  const [previewImage, setPreviewImage] = useState(image);

  const handleCloseModal = () => {
    setModalIsOpen(false);
  };

  const handleImageChange = (e: ChangeEvent<HTMLInputElement>) => {
    if (e.target.files && e.target.files.length > 0) {
      const file = e.target.files[0];
      setProfileImage(file);
      setPreviewImage(URL.createObjectURL(file));
    }
  };

  const handleEditProfile = async () => {
    if (!name || !email) {
      alert('Please fill in all fields');
      return;
    }

    const formData = new FormData();
    formData.append('name', name);
    formData.append('email', email);
    if (profileImage) {
      formData.append('image', profileImage);
    }
    console.log(formData.get('name'));
    console.log(formData.get('email'));
    console.log(formData.get('image'));
    try {
      await userAPI.patchUserProfile(Number(id), formData);
      handleCloseModal();
      alert('성공');
    } catch (error) {
      console.error(error);
    }
  };

  return (
    modalIsOpen && (
      <div className="fixed inset-0 z-50 flex justify-center items-center bg-gray-500 bg-opacity-50">
        <div className="relative bg-white p-4 rounded-lg w-1/2 h-3/4">
          <h2 className="text-3xl font-bold mb-2 text-center">Edit Profile</h2>
          <div className="flex justify-center">
            <div className="flex items-center w-[200px] h-[200px]">
              {!previewImage ? (
                <Image
                  src={image || ''}
                  alt="Profile preview"
                  width={200}
                  height={200}
                />
              ) : (
                <Image
                  src={previewImage}
                  alt="Profile preview"
                  width={200}
                  height={200}
                />
              )}
            </div>
          </div>
          <input
            className="w-full p-2 mt-2 border-2 border-gray-300 rounded-md"
            type="file"
            onChange={handleImageChange}
          />
          <input
            className="w-full p-2 mt-2 border-2 border-gray-300 rounded-md"
            type="text"
            placeholder="Name"
            value={name}
            onChange={e => setName(e.target.value)}
          />
          <input
            className="w-full p-2 mt-2 border-2 border-gray-300 rounded-md"
            type="email"
            placeholder="Email"
            value={email}
            onChange={e => setEmail(e.target.value)}
          />
          <div className="flex justify-between mt-20 mx-4">
            <div
              className="w-1/2 mx-2 flex justify-center items-center p-2 cursor-pointer bg-blue-500 text-white rounded-md"
              onClick={handleEditProfile}
            >
              Edit
            </div>
            <div
              className="w-1/2 mx-2 flex justify-center items-center p-2 cursor-pointer bg-gray-300 text-white rounded-md"
              onClick={handleCloseModal}
            >
              Close
            </div>
          </div>
        </div>
      </div>
    )
  );
};

export default ProfileEditModal;

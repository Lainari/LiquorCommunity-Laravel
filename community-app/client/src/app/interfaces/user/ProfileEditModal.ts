interface ProfileEditModalProps {
  modalIsOpen: boolean;
  setModalIsOpen: (isOpen: boolean) => void;
  image?: string;
  id?: number;
  currentName?: string;
  currentEmail?: string;
}

export default ProfileEditModalProps;

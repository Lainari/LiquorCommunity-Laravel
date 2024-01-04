export interface User {
    id: number;
    user_id: string;
    nickname: string;
    password: string;
    birthday: Date;
    isAdmin: boolean;
    created_at?: Date;
    updated_at?: Date;
  }
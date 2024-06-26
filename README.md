# LiquorCommunity-Laravel

## プロジェクト紹介
- Laravelで開発したウェブサイトです
- ここから私の趣味、お酒のレビューを見ることができます🤗！
- 会員たちはサインインしなくてもページを見ることができますが、作成はできません🙇‍♂️。

## 技術
- Laravel（フールスタック）
- Javascript

## 変更点（After 2024年05月）
>フロントエンドフレームワークのNext.jsが追加されました。<br>
>ログイン方法がローカルとグーグルソーシャルログインもできます。
- Laravel（バックエンド） + Next.js（フロントエンド）
- Google Social Login

## インストール方法
1. phpとcomposerが要ります。
2. composer installの命令でセットしてください。
3. env.exampleファイルをenvでファイル名を変更してください。
4. php artisan key:generate、暗号keyのデータをもらってください。
5. php artisan migrate, DBを作成します。
6. php artisan db:seed, adminプロフィールを作ります。
7. php artisan jwt:secret, JWT tokenができます。
8. php artisan storage:link, イメージを呼びます。
9. 後は楽しんでください！

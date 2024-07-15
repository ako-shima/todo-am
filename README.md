# Project Management Todo App

## 概要

「Project Management Todo App」は、チームプロジェクトを効率的に管理するためのTodoアプリです。ユーザーがプロジェクトのタスクを整理し、進捗を追跡するのに役立ちます。

## 主な機能

- **ユーザーログイン**・**登録**：セキュアな認証システム
- **マイページ**：ユーザーのプロフィールを管理し、パスワードの再設定が可能
- **ユーザー投稿関連**：CRUD（作成・読み込み・更新・削除）
- **画像投稿**：タスクに関連する画像のアップロード
- **コメント投稿・削除**：タスクに対するコメント機能
- **完了済タスク一覧表示**：完了したタスクのリスト表示
- **検索機能**：タスクの検索機能
- **並び替え機能**：タスクの並び替え機能

## 開発環境

- **Laravel** 10.x
- **Tailwind CSS**
- **Bootstrap**

## 制作期間

- 3週間

## アプリの起動方法

1. リポジトリをクローンします：

    ```sh
    git clone https://github.com/ako-shima/project-management-todo-app.git
    cd project-management-todo-app
    ```

2. 必要なパッケージをインストールします：

    ```sh
    composer install
    npm install
    ```

3. 環境設定ファイルを作成し、必要な設定を行います：

    ```sh
    cp .env.example .env
    php artisan key:generate
    ```

4. データベースのマイグレーションを実行します：

    ```sh
    php artisan migrate
    ```

5. 開発サーバーを起動します：

    ```sh
    php artisan serve
    npm run dev
    ```

6. ブラウザでアプリケーションにアクセスします：

    ```
    http://localhost:8000
    ```


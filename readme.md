Daily Astro
======

提供每日星座運勢（資料來源：[click108 星座](http://astro.click108.com.tw/)），須先註冊會員，登入後即可觀看。


註：DB seeder 有提供一組 demo 帳號 (email: `demo@localhost`, password: `demo` )



環境需求
------

採 Laravel 5.5 開發，其需求限制請見 [官方文件](https://laravel.com/docs/5.5/installation#installation)



功能描述
------

1. 會員相關
    * 註冊
    * 登入
    * 忘記密碼
    * Google 登入

2. 撈取 [click108 星座](http://astro.click108.com.tw/) 當日星座運勢
    * 透過 Laravel 提供的 Task Scheduling，每小時執行 artisan command: `fetch:daily-astro`



開發環境初始化
------

### 安裝套件

```
$ composer install
```

### 於根目錄下，若沒有 `.env` 就複製 `.env.example` 另存為 `.env`

```
$ test -f .env || cp .env.example .env
```

### 產生 `APP_KEY`

```
$ php artisan key:generate
```

### DB migration and seeding

```
$ php artisan migrate --seed
```

### 手動撈取當日星座運勢

```
$ php artisan fetch:daily-astro
```

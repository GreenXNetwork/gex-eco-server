# gex-eco-server
The centralized back-end server of GreenX Ecosystem

Demo project:
1. composer install
2. php artisan migrate
3. php artisan passport:install

    - Make sure that there are 2 files (oauth-private.key and oauth-public.key) under __/storage__ .
        ```js
        oauth-private.key
        oauth-public.key
        ```
    - Copy the newly created Secrets to __.env__ .
        ```js
        PERSONAL_CLIENT_ID=1
        PERSONAL_CLIENT_SECRET=KPdGK6mX9P4R0kZJyO7gxBAln6oWHbNhP5Qdi7X0
        PASSWORD_CLIENT_ID=2
        PASSWORD_CLIENT_SECRET=gFrGfx5ehydtjqeEsDb8CwzrGG7edVJL6gx96Pqq
        ```
    - These 2 two new clients should present in db, table oauth_client. Otherwise, we get 'Client authentication failed' with '(code: 4)'.


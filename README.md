# Functionality
The home page contains a form that collects the e-mail address that the customer needs to enter. 
A database that has only unique addresses, without repetitions, keeps the data, which are then listed.
# Installation
1. composer install
2. composer update
3. npm install
4. npm run dev
5. Copy .env.example to .env
6. php artisan key:generate
7. php artisan storage:link
8. Update .env file:
- APP_NAME=
- APP_URL=http://localhost
- ASSET_URL=http://localhost
- APP_DOMAIN=
- MySQL Credentials
9. php artisan migrate:fresh --seed

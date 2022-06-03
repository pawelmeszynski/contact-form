# Functionality
The page is divided into 3 subpages. Firstly add email to database, next all email's are listed. The site has been diversified with editing and deleting records from the database. 
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

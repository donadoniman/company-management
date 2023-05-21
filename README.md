######  LAREVEL DEVELOPER TEST #######

In order to progress in the job application, the company is asking programmers to complete a short test. 

There is no time limit involved and would prefer submission via a git repo. 
Basic, project to manage companies and their employees. Must be original work.

    • Basic Laravel Auth with Vue: ability to log in as administrator 
    • Use database seeds to create first user with email admin@admin.com and password “password” CRUD functionality (Create / Read / Update / Delete) for two menu items: Companies and Employees. 
    • Companies DB table consists of these fields: Name (required), email, logo (minimum 100×100), website Employees DB table consists of these fields: First name (required), last name (required), Company (foreign key to Companies), email, phone Use database migrations to create those schemas above 
    • Use database seeds to create at least 10 initial companies 
    • Store companies logos in storage/app/public folder and make them accessible from public 
    • Use basic Laravel resource controllers with default methods – index, create, store etc. 
    • Use Laravel’s validation function, using 
    • Request classes 
    • Use Laravel’s pagination for showing Companies/Employees list, 10 entries per page 
    • Create authentication without using Laravel fortify. 

    • Email notification: send email whenever new company is entered (use Mailgun or Mailtrap) Testing with phpunit

##### Run Application  #####

# Setup .env with .env.example and do the database configuration details.

# install need packages
npm install

# database tables migrations
php artisan migrate

# Run seeders to populate the database with initial data
php artisan db:seed

# Run phpUnit Test
php artisan test

# To Compile your Vue.js components and generate the necessary JavaScript and CSS files.
npm run dev

# To Run Laravel Application
php artisan serve







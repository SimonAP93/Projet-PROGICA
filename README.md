# Installation

### Run commands in terminal
- git clone https://github.com/SimonAP93/Projet-PROGICA.git
- composer update
- npm install
- ##### Verify file .env
    - modify DATABASE_URL if necessary

- php bin/console doctrine:database:create
- php bin/console doctrine:migration:migrate
- php bin/console doctrine:fixtures:load

# Launch Site

### Run commands
- ### new terminal
    - php -S localhost:8000 -t public
- ### new terminal
    - npm run dev-server

        **(WebPack for frontend)**

- ### new terminal
    - maildev

        **(SMTP server for testing contact mails)**

# Visit site
- in browser type

    - localhost:8000
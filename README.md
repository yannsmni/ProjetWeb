# ProjetWeb
## Requirements

To run this website, you need PHP and composer. This website use also mysql so you need a mysql server. In addition to that you need maildev and you can install it with the command ` npm install maildev`. To create accounts and to use all the essential parts of the website, you also need the API.

## Run

To run this website, you have to launch the command ` composer update`. This command will install all the required packages. After that you can setup the database with the commands ` php bin/console doctrine:database:create`, ` php bin/console doctrine:migrations:migrate` and ` php bin/console doctrine:fixtures:load`.

After that you can run the website with the command ` php bin/console server:run`.
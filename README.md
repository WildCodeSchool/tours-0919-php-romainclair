### Prerequisites

1. Check composer is installed
2. Check yarn & node are installed

### Install

1. Clone this project
2. Run `composer install`
3. Run `yarn install`
4. Run `cp .env.local .env`
5. Modify `DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name` with the username and password of mysql/mariadb and change the name of database with the one you want.
6. Run ` php bin/console doctrine:database:create`
7. Run `php bin/console make:migration`
8. Run `php bin/console doctrine:migration:migrate`
9. Run `php bin/console doctrine:fixtures:load`

### Working

1. Run `symfony server:start` to launch your local symfony server
2. Run `yarn run dev --watch` to launch your local server for assets

### Testing

1. Run `./bin/phpcs` to launch PHP code sniffer
2. Run `./bin/phpstan analyse src --level max` to launch PHPStan
3. Run `./bin/phpmd src text phpmd.xml` to launch PHP Mess Detector
3. Run `./bin/eslint assets/js` to launch ESLint JS linter
3. Run `./bin/sass-lint -c sass-linter.yml` to launch Sass-lint SASS/CSS linter

## Built With

* [Symfony](https://github.com/symfony/symfony)
* [GrumPHP](https://github.com/phpro/grumphp)
* [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer)
* [PHPStan](https://github.com/phpstan/phpstan)
* [PHPMD](http://phpmd.org)
* [ESLint](https://eslint.org/)
* [Sass-Lint](https://github.com/sasstools/sass-lint)
* [Travis CI](https://github.com/marketplace/travis-ci)


# Acerca

"MercaTodo is an e-commerce platform built using the [Laravel](https://laravel.com/) framework as a study project of the Junior PHP Developer School offered by[Evertec](https://www.evertecinc.com/). It includes the following features:"

- Product and category management.
- User administration with their roles and permissions.
- Shopping cart.
- Order management for customers.

## Requirements
- PHP 8.0+ `required`
- MYSQL 5.7+ `required`


## Installation

- Clone the repository:
```bash
$ git clone https://github.com/CamiloCardenasMesa/merca_todo.git
```
- Enter the repository folder:
```bash
$ cd merca_todo
```
- If you want to access the entire development history, use the command:
```bash
$ git fetch --all
```
- Install PHP dependencies through the package manager. [composer](https://getcomposer.org/download/):
```bash
$ composer install
```
- Install NodeJS dependencies using the package manager [npm](https://nodejs.org/es/):
```bash
$ npm install
```
## Configuration

- Copy the .env.example file to .env and env.testing, and then add each environment variable:
`DB_USERNAME` Database username.  
`DB_PASSWORD` Database Password.  
`MAIL_USERNAME` Mailtrap username for testing.  
`MAIL_PASSWORD` Mailtrap password for testing.  
`MAIL_FROM_ADDRESS` Syste Email.  
`LOGIN_PLACETOPAY` Login of [PlaceToPay](https://docs-gateway.placetopay.com/docs/webcheckout-docs/ZG9jOjQxMjU1Njc-autenticacion).  
`TRANKEY_PLACETOPAY` PlaceToPay Secret Key.  
`BASEURL_PLACETOPAY` PlaceToPay Base URL.

- Generate the application key:
```bash
$ php artisan key:generate
```
- Migrate and seed the database:
```bash
$ php artisan migrate --seed
```
- Create the connection between the public and storage directories:
```bash
$ php artisan storage:link
```
- Generate keys for API authentication:
```bash
$ php artisan passport:keys
```
- Run the application tests to verify if the installation and configuration were done correctly:
```bash
$ php artisan test
```
## Contributions

You can make your contributions through pull requests. For significant changes, please create an ISSUE first.  

Make sure to update the tests accordingly.

## License

**MercaTodo**  is a project under the MIT license. [MIT license](https://opensource.org/licenses/MIT).
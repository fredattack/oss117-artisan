# Oss117-cli-ts

This Artisan tool is designed for fans and enthusiasts of the OSS 117 series, providing a simple and interactive way to retrieve memorable quotes from the beloved French spy films. If no options are provided, a command prompt lets you refine your search. Develop with Laravel, it offers various options for users to explore quotes, including fetching random quotes, filtering by specific characters.

## Features
+ Random Quotes: Get a random OSS 117 quote with a simple command.
+ Number return: Get a number of random quotes with a simple command. 
+ Character Filter: Retrieve quotes from your favorite characters.
+ Flexible: Supports multiple parameters for tailored quote retrieval.

## Installation

Provide instructions on how to install your CLI tool. Typically, this will involve cloning the repository and installing dependencies. If your project is published to npm, include those instructions as well.

```bash
git remote add origin https://github.com/fredattack/oss117-artisan.git
cd oss117-artisan
composer install
npm install 
cp .env.example .env
php artisan key:generate
```

## Usage

### Random Quote
```bash
php artisan oss117:quote
```
If no options are provided, a command prompt will allow you to refine your search.

### Fetch X Random Quotes
number attribute is an integer, default is 1
```bash
php artisan oss117:quote --number=X
```

### Fetch Random Quote of Character Hubert Bonisseur de La Bath

use character alias in lowercase
```bash
php artisan oss117:quote --character=hubert
```

### Fetch List of Characters
```bash
php artisan oss117:quote --characters
```

## Contribution

If you would like to contribute to this project, please open an issue or a pull request. We welcome any feedback or suggestions for improvement.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

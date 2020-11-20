# Simple Laravel Role Base Access Control

## Table of contents

-   [Installation](#installation)
-   [Usage](#usage)
-   [Compiles and hot-reloads for development](#compiles-and-hot-reloads-for-development)
-   [Compiles and minifies for production](#compiles-and-minifies-for-production)
-   [License](#License)

## Installation

```
* Download/Clone the repository
* run composer install
* run cp .env.example .env
* update your db config
* then run php artisan migrate --seed
```

## Usage

-   add authorize to your controller. Example :

```
public function index()
{
    $this->authorize('index-users');

    ...
}
```

## License

[MIT License](LICENSE).

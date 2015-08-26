# Sweet Flasher

[![Test Status](https://img.shields.io/travis/fungku/sweet-flasher.svg?style=flat-square)](https://travis-ci.org/fungku/sweet-flasher)
[![Release](https://img.shields.io/packagist/v/fungku/sweet-flasher.svg?style=flat-square)](https://packagist.org/packages/fungku/sweet-flasher)
![License](https://img.shields.io/packagist/l/fungku/sweet-flasher.svg?style=flat-square)

Simple, sweet flash messages.

Currently supports Laravel and (maybe) Symfony.

## Install

Install with composer like any sane developer.

### Composer

```bash
composer require "fungku/sweet-flasher: ~0.1@dev"
```

#### Laravel

For Laravel apps, add the Service Provider class to `config/app.php` services array:

```php
    Fungku\SweetFlasher\Providers\SweetFlasherLaravelServiceProvider::class,
```

#### Symfony

For Symfony, try the [`SymfonySessionFlasher`](https://github.com/fungku/sweet-flasher/blob/master/src/SessionFlasher/SymfonySessionFlasher.php).
I don't actually know how Symfony works, I was just trying to provide an example.

If you do know, please help me out here.

## Usage

##### Laravel:

Inject it

```php
use Fungku\SweetFlasher\FlashMessage;

class MyController extends Controller
{
    public function store(FlashMessage $flashMessage)
    {
        // save ...
        
        $flashMessage->success("Nicely done");
        
        return response();
    }
}
```

Or if you are a lazy piece of crap use the helper function `flash()`:

```php
// Default info message
flash("This is a default info message");

// Other usages like:
// flash->{$level}($message, $title, $confirm_button_text)

flash()->success("This is a success message");

flash()->error("Some error!");

flash()->warning("Some Warning!", "Uh oh!");
```

##### Symfony (maybe):

```php
use Fungku\SweetFlasher\FlashMessage;

class MyController
{
    private $flash;
    
    public function __construct(FlashMessage $flash)
    {
        $this->flash = $flash;
    }
    
    public function doAction()
    {
        // .. do action
           
        $this->flash->success('You did it!');
    }
}
```

##### Everybody else:

You can do it.

##### *Notes*

This is nearly a fork of [laracasts/flash](https://github.com/laracasts/flash)

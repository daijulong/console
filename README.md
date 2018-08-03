# Console

A simple, lightweight console for php

[中文版本](README_CN.md) 

## Require

- php: >= 5.4

## Install

Via Composer

```php
$  composer require daijulong/console
```

composer.json

```php
"daijulong/console": "^1.0"
```


## Usage

### Output

Create a console instance

```php
$console = \Daijulong\Console\Console::instance();
```

Print a message at the console

```php
$console->text('I am a message!');
```

Print a message with a foreground color and a background color

```php
$console->text('I am a message with red foreground color and yellow background color.', 'red', 'yellow');
```

> You can get all supported colors from ```Daijulong\Console\Color\Foreground::class``` and ```Daijulong\Console\Color\Background::class``` .

Print a message in a shortcut

```php
$console->success('I am a success message.');
```

> This will print a line of green text. Other similar methods are ```error```, ```warning```, ```alert``` and more.

### Input

Ask a question and get the answer

```php
$name = $console->ask('Who are you?');
```

> You can use second parameter as the default value. If there are third parameter equal to ```true``` , the answer can not be empty, even if the default value is set.

Often, you just need to answer yes or no.

```php
$bool = $console->yesOrNo('Are you going to give me your money?');
```

> The console will be kept asking until you answer yes or no. Similarly, if any, the second parameter is the default value.

Coloring string

```php
$console->colored('I am a message with red foreground color and yellow background color.', 'red', 'yellow');
```

> Similar to ```text```, it does not output directly, which is very useful in displaying a variety of styles in a piece of content.

# License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
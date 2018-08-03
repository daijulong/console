# Console

适用于 PHP 语言的一个简单、轻量的控制台输入、输出工具

[English](README.md)

## 环境要求

- php: >= 5.4

## 安装

通过 Composer

```php
$  composer require daijulong/console
```

composer.json

```php
"daijulong/console": "^1.0"
```


## 使用

### 输出

创建控制台实例

```php
$console = \Daijulong\Console\Console::instance();
```

在控制台打印一条信息

```php
$console->text('这是一条信息！');
```

在控制台打印一条带有颜色和背景色的信息

```php
$console->text('这是一条红色文字、黄色背景的信息。', 'red', 'yellow');
```

> 可以从 ```Daijulong\Console\Color\Foreground::class``` 和 ```Daijulong\Console\Color\Background::class``` 中查看所有支持的颜色。

快捷地打印一条信息

```php
$console->success('这是一条成功提示信息。');
```

> 这将打印出一个绿色文字的信息，类似的，不妨试一下其他的方法，如 ```error```, ```warning```, ```alert``` 等（不只是这些哦）。

### 输入

询问并获取答案

```php
$name = $console->ask('你谁呀？');
```

> 如果有第二个参数，它将作为默认值。如果有第三个参数，且等于 ```true``` ，则答案不能为空（即使设置了默认值）。 

如果只需要回答“yes”或“no”

```php
$bool = $console->yesOrNo('把你的钱给我花花好不好啊？');
```

> 控制台将一直提问下去，直到回答“yes”或“no”。如果有第二个参数，它将作为默认值。

给指定字符串添加颜色

```php
$console->colored('这是一条红色文字、黄色背景的信息。', 'red', 'yellow');
```

> 类似于 ```text``` ，只是不直接输出，这在一段内容中需要显示多种样式时非常有用。

# License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
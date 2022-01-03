# yii2-clipboardjs

An easy way to use [Clipboardjs](https://clipboardjs.com/) in your project. Clipboardjs is a javascript only way to copy text to the clipboard.


## Installation

Install this extension via [composer](http://getcomposer.org/download). Add this line to your project’s composer.json

```php
"metola/yii2-clipboardjs" : "*"
```

## Usage

```php
//Button to copy text
<?= \metola\ClipboardJs\ClipboardJsWidget::widget([
    'text' => "Hello World",
    // 'label' => 'Copy to clipboard',
    // 'htmlOptions' => ['class' => 'btn'],
    // 'tag' => 'button',
]) ?>

//Button to copy text from input id
<?= \metola\ClipboardJs\ClipboardJsWidget::widget([
    'inputId' => "#input-url",
    // 'cut' => false, // Cut the text out of the input instead of copy?
    // 'label' => 'Copy to clipboard',
    // 'htmlOptions' => ['class' => 'btn'],
    // 'tag' => 'button',
]) ?>

```

## Just the Asset?

Yes, you can use just the asset. ```php \metola\ClipboardJs\ClipboardJsAsset::register($view)``` It will auto init anything with the "clipboard-js-init" class.

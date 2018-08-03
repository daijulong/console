<?php

namespace Daijulong\Console;

use Daijulong\Console\Color\Background;
use Daijulong\Console\Color\Foreground;

class Console
{
    protected static $instance;

    protected function __construct()
    {

    }

    protected function __clone()
    {

    }

    /**
     * get instance
     *
     * @return
     */
    public static function instance()
    {
        if (!(static::$instance instanceof static)) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    /**
     * @param string $text
     */
    public function line($text)
    {
        $this->text($text);
    }

    /**
     * @param string $text
     */
    public function info($text)
    {
        $this->text($text, 'green');
    }

    /**
     * @param string $text
     */
    public function success($text)
    {
        $this->text($text, 'green');
    }

    /**
     * @param string $text
     */
    public function failure($text)
    {
        $this->text($text, 'white', 'red');
    }

    /**
     * @param string $text
     */
    public function error($text)
    {
        $this->text($text, 'white', 'red');
    }

    /**
     * @param string $text
     */
    public function warning($text)
    {
        $this->text($text, 'yellow');
    }

    /**
     * @param string $text
     */
    public function comment($text)
    {
        $this->text($text, 'yellow');
    }

    /**
     * @param string $text
     */
    public function alert($text)
    {
        $decorate_line = str_pad('', strlen($text) + 12, '*');
        $text_line = '*     ' . $text . '     *' . PHP_EOL;
        $this->text($decorate_line . PHP_EOL . $text_line . $decorate_line, 'yellow');
    }

    /**
     * @param string $question
     * @param string $default
     * @param bool $must
     * @return null
     */
    public function ask($question, $default = '', $must = false)
    {
        $answer = '';
        $ask_times = 0;
        while ($answer == '' && ($ask_times < 1 || $must == true)) {
            $ask_times++;
            $this->text($question);
            echo '>';
            $handle = fopen('php://stdin', 'r');
            $answer = trim(fgets($handle)) ?: ($must ? '' : $default);
        }

        return $answer;
    }

    /**
     * @param string $question
     * @param null $default
     * @return bool
     */
    public function yesOrNo($question, $default = null)
    {
        $input = '';
        while (!in_array($input, ['yes', 'no', 'y', 'n'])) {
            $input = strtolower($this->ask($question . ' [yes/no]', $default));
        }
        return in_array($input, ['yes', 'y']);
    }

    /**
     * @param int $count
     */
    public function blankLine($count = 1)
    {
        echo str_pad('', $count, PHP_EOL);
    }

    /**
     * @param string $text
     */
    public function text($text, $foreground_color = '', $background_color = '')
    {
        echo $this->colored($text, $foreground_color, $background_color) . PHP_EOL;
    }

    /**
     * @param string $text
     * @param string $foreground_color
     * @param string $background_color
     * @return string
     * @throws \ReflectionException
     */
    public function colored($text, $foreground_color = '', $background_color = '')
    {
        $colors = [
            Foreground::getColor($foreground_color),
            Background::getColor($background_color),
        ];
        $colors_prefix = implode('', $colors);
        return $colors_prefix . $text . ($colors_prefix ? "\033[0m" : '');
    }
}

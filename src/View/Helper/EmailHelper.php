<?php
namespace App\View\Helper;

use Cake\View\Helper;

class emailHelper extends Helper
{
    public function e($value)
    {
        return h(str_replace(';', ':', $value));
    }
}

<?php

namespace App\Controllers\Validator;

use App\Controllers\BaseController;

class BaseValidator extends BaseController
{
    static protected function required(string $attr): string
    {
        return "$attr Harus Diisi";
    }

    static protected function maxLength(int $length): string
    {
        return "Panjang Karakter Maksimal $length Karakter";
    }

    static protected function unique(string $attr): string
    {
        return "$attr Telah Ada, Masukkan $attr Yang Lain";
    }
}

<?php

namespace App\Controllers\Validator;

class ItemValidator
{
    static private function required(string $attr): string
    {
        return "$attr Harus Diisi";
    }

    static private function maxLength(int $length): string
    {
        return "Panjang Karakter Maksimal $length Karakter";
    }

    static private function validator(): array
    {
        return
            [
                'item_category'     => [
                    'rules'         => 'required|max_length[40]',
                    'errors'        => [
                        'required'      => self::required('Kategori Barang'),
                        'max_length'    => self::maxLength(40)
                    ]
                ],

                'item_type' => [
                    'rules'         => 'required|max_length[40]',
                    'errors'        => [
                        'required'      => self::required('Jenis Barang'),
                        'max_length'    => self::maxLength(40)
                    ]
                ],

                'item_name' => [
                    'rules'         => 'required|max_length[40]',
                    'errors'        => [
                        'required'      => self::required('Nama Barang'),
                        'max_length'    => self::maxLength(40)
                    ]
                ]
            ];
    }

    static public function getValidator()
    {
        return self::validator();
    }
}

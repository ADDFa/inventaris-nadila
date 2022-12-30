<?php

namespace App\Controllers\Validator;

use App\Controllers\Validator\BaseValidator;

class ItemValidator extends BaseValidator
{
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

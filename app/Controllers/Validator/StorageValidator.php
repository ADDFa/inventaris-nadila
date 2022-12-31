<?php

namespace App\Controllers\Validator;

class StorageValidator extends BaseValidator
{
    static private function validator(): array
    {
        return [
            'qty'   => [
                'rules'     => 'required|is_natural_no_zero',
                'errors'    => [
                    'required'  => self::required('Jumlah Barang Disimpan'),
                    'is_natural_no_zero' => 'Kuantitas Harus Lebih Dari 0'
                ]
            ],

            'item_price' => [
                'rules'     => 'required|is_natural_no_zero',
                'errors'    => [
                    'required'  => self::required('Jumlah Barang Disimpan'),
                    'is_natural_no_zero' => 'Harga Barang Tidak Valid'
                ]
            ],

            'item_brand' => [
                'rules'     => 'required|max_length[40]',
                'errors'    => [
                    'required'  => self::required('Jumlah Barang Disimpan'),
                    'max_length'    => self::maxLength(40)
                ]
            ],

            'item_condition' => [
                'rules'     => 'required|max_length[40]',
                'errors'    => [
                    'required'  => self::required('Jumlah Barang Disimpan'),
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

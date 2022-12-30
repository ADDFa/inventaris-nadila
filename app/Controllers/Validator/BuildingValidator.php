<?php

namespace App\Controllers\Validator;

use App\Controllers\Validator\BaseValidator;
use CodeIgniter\Files\File;

class BuildingValidator extends BaseValidator
{
    static private function validator(): array
    {
        return
            [
                'building_name'          => [
                    'rules'     => 'required|max_length[40]',
                    'errors'    => [
                        'required'      => self::required('Nama Gedung'),
                        'max_length'    => self::maxLength(40)
                    ]
                ],
                'building_size'          => [
                    'rules'     => 'required|max_length[40]',
                    'errors'    => [
                        'required'      => self::required('Ukuran Gedung'),
                        'max_length'    => self::maxLength(40)
                    ]
                ],
                'building_registration_date'          => [
                    'rules'     => 'required',
                    'errors'    => [
                        'required'      => self::required('Tanggal Pendaftaran')
                    ]
                ]
            ];
    }

    static public function getValidator()
    {
        return self::validator();
    }
}

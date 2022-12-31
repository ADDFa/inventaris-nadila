<?php

namespace App\Controllers\Validator;

class RoomValidator extends BaseValidator
{
    static private function validator(?bool $oldName): array
    {
        $validation = [
            'building_id' => [
                'rules'             => 'required',
                'errors'            => [
                    'required'      => self::required('Gedung')
                ]
            ],
            'room_capacity' => [
                'rules'             => 'required|max_length[11]',
                'errors'            => [
                    'required'      => self::required('Kapasitas Ruangan')
                ]
            ],
            'room_size' => [
                'rules'             => 'required|max_length[20]',
                'errors'            => [
                    'required'      => self::required('Ukuran Ruangan'),
                    'max_length'    => self::maxLength(40)
                ]
            ],
            'description'           => [
                'rules'             => 'required|max_length[40]',
                'errors'            => [
                    'required'      => self::required('Deskripsi'),
                    'max_length'    => self::maxLength(40)
                ]
            ]
        ];

        if (!$oldName) {
            $validation += [
                'room_name' => [
                    'rules'             => 'required|max_length[40]|is_unique[rooms.room_name]',
                    'errors'            => [
                        'required'      => self::required('Nama Ruangan'),
                        'max_length'    => self::maxLength(40),
                        'is_unique'     => self::unique('Nama Ruangan')
                    ]
                ]
            ];
        }

        return $validation;
    }

    static public function getValidator(?bool $oldName = null): array
    {
        return self::validator($oldName);
    }
}

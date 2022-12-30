<?php

namespace App\Controllers\Helper;

class Messages
{
    static private string $data = '';

    static public function setName(string $name)
    {
        self::$data = $name;
    }

    static private function insert(): array
    {
        return [
            'status'    => 'success',
            'message'   => "Data " . self::$data . " Berhasil Ditambahkan"
        ];
    }

    static public function getInsert(): array
    {
        return self::insert();
    }

    static private function update()
    {
        return [
            'status'    => 'success',
            'message'   => "Data " . self::$data . " Berhasil Diubah"
        ];
    }

    static public function getUpdate()
    {
        return self::update();
    }

    static private function delete()
    {
        return [
            'status'    => 'success',
            'message'   => "Data " . self::$data . " Berhasil Dihapus"
        ];
    }

    static public function getDelete()
    {
        return self::delete();
    }
}

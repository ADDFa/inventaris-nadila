<?php

namespace App\Models;

class BaseModel
{
    static private string $keys = '';
    static private string $vals = '';
    static private int $loop = 1;

    static public function getKeysVals(array $data): object
    {
        $length = count($data);
        foreach ($data as $key => $data) {
            self::$keys .= self::$loop < $length ? "$key, " : $key;
            self::$vals .= self::$loop < $length ? "'$data', " : "'$data'";

            self::$loop++;
        }

        return (object) [
            'keys'  => self::$keys,
            'vals'  => self::$vals
        ];
    }

    static public function getValsUpdate(array $data): string
    {
        $length = count($data);
        foreach ($data as $key => $data) {
            self::$vals .= self::$loop < $length ? "$key = '$data', " : "$key = '$data'";

            self::$loop++;
        }

        return self::$vals;
    }
}

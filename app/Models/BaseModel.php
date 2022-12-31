<?php

namespace App\Models;

class BaseModel
{
    static public function getKeysVals(array $data): object
    {
        $keys = '';
        $vals = '';
        $loop = 1;

        $length = count($data);
        foreach ($data as $key => $data) {
            $keys .= $loop < $length ? "$key, " : $key;
            $vals .= $loop < $length ? "'$data', " : "'$data'";

            $loop++;
        }

        return (object) [
            'keys'  => $keys,
            'vals'  => $vals
        ];
    }

    static public function getValsUpdate(array $data): string
    {
        $vals = '';
        $loop = 1;

        $length = count($data);
        foreach ($data as $key => $data) {
            $vals .= $loop < $length ? "$key = '$data', " : "$key = '$data'";

            $loop++;
        }

        return $vals;
    }
}

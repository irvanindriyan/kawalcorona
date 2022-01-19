<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Model;

class FunctionHelpers extends Model
{
    public static function responResult($data, $code) 
    {
        $result['code'] = $code;

        if ($code == '200') {
            $status = 'success';
        } else if ($code == '500') {
            $status = 'errors';
        } else {
            $status = 'warnings';
        }
        
        $result['status'] = $status;

        if (is_array($data)) {
            $result['data'] = $data;
        } else if (is_object($data)) {
            $result['data'] = $data;
        } else {
            if($data != '' || $data != null) {
                $result['message'] = $data; 
            }
        }

        return $result;
    }

    public static function resOK($data) 
    {
        return self::responResult($data, 200);
    }

    public static function resError($data, $code = 422) 
    {
        return self::responResult($data, $code);
    }

    public static function resErrorValidation($data) 
    {
        $arrError = $data->errors();

        $i = 0;
        foreach ($arrError as $key => $value) {
            if ($i == 0) {
                $message = $arrError[$key];
            }

            $i++;
        }

        return self::resError($message[0], $data->status);
    }
}

<?php

namespace App\Traits;

trait HttpResponses
{
    protected function success($data, $code = 200, $message = null)
    {
        return response()->json([
            'status' => 'success',
            'data' => $data,
            'message' => $message
        ], $code);
    }

    protected function error($data, $code , $message = null)
    {
        return response()->json([
            'status' => 'error',
            'data' => $data,
            'message' => $message
        ], $code);
    }
}



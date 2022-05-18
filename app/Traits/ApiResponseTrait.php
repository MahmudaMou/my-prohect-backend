<?php

namespace App\Traits;


trait ApiResponseTrait
{
    protected function successWithPayload($message, $data)
    {
        $payload = [
            'code' => 200,
            'app_message' => 'successful',
            'user_message' => $message,
            'data' => $data
        ];
        return response()->json($payload, 200);
    }

    public function successWithOutPayload($message)
    {
        $payload = [
            'code' => 200,
            'app_message' => 'successful',
            'user_message' => $message,
        ];
        return response()->json($payload, 200);
    }

    public function unSuccess($message)
    {
        $payload = [
            'code' => 500,
            'app_message' => 'Unsuccessful',
            'user_message' => $message,
        ];
        return response()->json($payload, 200);
    }

}

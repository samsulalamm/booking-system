<?php

namespace App\Traits;

trait CommonUsageTrait
{
    public $successStatus = 200;
    public $errorStatus = 500;
    public function successResponse($msg, $data = null)
    {
        return response()->json(['message' => $msg, 'data' => $data], $this->successStatus);
    }
    public function errorResponse($msg)
    {
        return response()->json(['error' => $msg], $this->errorStatus);
    }
    public function getTotalPrice($msg)
    {
        return response()->json(['error' => $msg], $this->errorStatus);
    }
}

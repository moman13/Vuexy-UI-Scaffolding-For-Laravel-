<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Response;
class BaseControllerApi extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public  $CURRENT_USER;
    public function __construct()
    {

        $this->CURRENT_USER = auth('customers')->user();
    }
    public function sendResponse($result, $message)
    {
        ini_set('serialize_precision', -1);
        // return Response::json(ResponseUtil::makeResponse($message, $result));
        $contentJson=[
            'status' =>true,
            'msg' =>$message,
            'result' =>$result,

        ];

        return Response::json($contentJson);
    }

    /**
     * @param $result
     * @param $message
     * @return mixed
     */
    public function sendSuccessResponse($message)
    {

        $contentJson=[
            'status' =>false,
            'msg' =>$message,
            'result' =>[],

        ];

        return Response::json($contentJson);
    }

    /**
     * @param $error
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendError($error, $code = 404)
    {


        $contentJson=[
            'status' =>false,
            'msg' =>$error,
            'result' =>null,

        ];
        return Response::json($contentJson, $code);
    }

    public function is_multi(array $array):bool
    {
        return is_array($array[array_key_first($array)]);
    }
}

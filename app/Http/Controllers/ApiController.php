<?php

namespace App\Http\Controllers;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    /**
     * Undocumented function
     *
     * @param [type] $data
     * @param [type] $message
     * @param [type] $code
     * @return void
     */
    public function dataResponse($data , $message = null, $code = 200):JsonResponse
    {

        $success = [
            'status' => $code ? $code : 200,
            'message' => $message ? $message : 'success',

        ];

        $success = array_merge($success, ['data'=>['result'=>$data]]);

        return response()->json($success, $code);
    }

    
    /**
     * Undocumented function
     *
     * @param [type] $message
     * @param [type] $code
     * @return JsonResponse
     */
    public function successResponse($message = null, $code = null):JsonResponse
    {
        $success = [
            'status' => $code ? $code : 200,
            'message' => $message ? $message : 'success',
            'data'=>null
        ];

        return response()->json($success, 200);
    }

    /**
     * Undocumented function
     *
     * @param [type] $message
     * @param [type] $code
     * @return JsonResponse
     */
    public function errorResponse($message , $code):JsonResponse
    {
        $error = [
            'status' => $code,
            'message' => $message
        ];

        return response()->json($error, $code);
    }

    /**
     * Undocumented function
     *
     * @param [type] $message
     * @param [type] $code
     * @return void
     */
    public function errorResponseWithstatus($message , $code):JsonResponse
    {
        $error = [
            'status' => $code,
            'message' => $message
        ];

        return response()->json($error, $code);
    }


    /**
     * Undocumented function
     *
     * @param [type] $message
     * @param [type] $code
     * @return JsonResponse
     */
    public function errorResponseWithMessage($message , $code):JsonResponse
    {

      $res=[
            'status' => $code ? $code : 422, 
            'message'=>'Validation error', 
            'error' => [$message], 
            'data'=>null
        ];
        
        throw new HttpResponseException(response()->json($res
        , 422));
    }
    /**
     * Gera a paginação dos itens de um array ou collection.
    *
    * @param array|Collection      $items
    * @param int   $perPage
    * @param int  $page
    * @param array $options
    *
    * @return JsonResponse
    */
    public function paginateCollection($items,$key )
    {
    
        return $this->dataResponse([$key => $items
            ,'first_page_url' => $items->url(1),
            'from' => $items->firstItem(),
            'last_page' => $items->lastPage(),
            'last_page_url' => $items->url($items->lastPage()),
            'next_page_url' => $items->nextPageUrl(),
            'per_page' => $items->perPage(),
            'prev_page_url' => $items->previousPageUrl(),
            'to' => $items->lastItem(),
            'total' => $items->total(),]);
    
    }
}

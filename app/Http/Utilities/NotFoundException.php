<?php

namespace App\Http\Utilities;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Utilities\RestApiResponse as RestApiResponse;

class NotFoundException extends Exception
{
    private String $msg;   

    /**
     * Constructor
     */
    public function __construct(Exception $exception)
    {
        parent::__construct($exception->getMessage(), $exception->getCode(), $exception);
        $this->msg = $exception->getMessage();
    }
    
    /**
     * Report
     */
    public function report (){

    }

    /**
     * Render
     * @param Request $request
     * @return Response
     */
    public function render (Request $request): Response {
        return RestApiResponse::responseApi(404, $this->msg, null, 404);
    }
}
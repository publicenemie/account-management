<?php

namespace App\Http\Utilities;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Exception;

class ConflictException extends \Exception
{
    private String $msg;

    /**
     * Constructor
     */
    public function __construct(Exception $exception){
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
        return RestApiResponse::responseApi(409, $this->msg, null, 409);
    }
}


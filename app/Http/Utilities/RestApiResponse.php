<?php

namespace App\Http\Utilities;

use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;

class RestApiResponse {
    public static function paginate(LengthAwarePaginator $paginator) {
        return [
            'total' => $paginator->total(),
            'total_page' => null,
            'current_page' => $paginator->currentPage(),
            'per_page' => $paginator->perPage(),
            'total_current_page' => $paginator->count(),
            'last_page' => $paginator->lastPage(),
            'next_page' => $paginator->currentPage() + 1,
            'items' => $paginator->items(),
        ];
    }

    /**
     * Success
     * @param int $code
     * @param string $message
     * @param array $data
     * @return \Illuminate\Http\Response
     */
    public static function responseApi($code, $message, $data, $httpStatusCodde): Response {
        return response([
            'code' => $code,
            'message' => $message,
            'data' => $data
        ], $httpStatusCodde);
    }
}
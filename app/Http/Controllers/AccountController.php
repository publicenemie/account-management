<?php

namespace App\Http\Controllers;

use App\Http\Requests\Account\Create as CreateAccountRequest;
use App\Http\Requests\Account\Update as UpdateAccountRequest;
use App\Http\Requests\Account\Get as GetAccountRequest;
use Illuminate\Http\Request;
use App\Http\Services\Account as AccountService;
use App\Http\Utilities\RestApiResponse as RestApiResponse;

class AccountController extends Controller
{
    /**
     * Create
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create(CreateAccountRequest $request)
    {
        return RestApiResponse::responseApi(200, 'Account created successfully', AccountService::create($request->all()),201);
    }

    /**
     * Update one
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateOne(UpdateAccountRequest $request){
        return RestApiResponse::responseApi(200, 'Account updated successfully', AccountService::updateOne($request->id, $request->validated()), 200);
    }

    /**
     * Get
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function get(GetAccountRequest $request){
        return RestApiResponse::responseApi(200, 'Account fetched successfully', RestApiResponse::paginate(AccountService::list($request->per_page)), 200);
    }

    /**
     * Get one
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getOne(Request $request){
        return RestApiResponse::responseApi(200,'Account fetched successfully', AccountService::getOne($request->id), 200);
    }

    /**
     * Delete one
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteOne(Request $request){
        return RestApiResponse::responseApi(200, 'Account deleted successfully', AccountService::deleteOne($request->id), 200);
    }
}

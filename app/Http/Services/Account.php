<?php 

namespace App\Http\Services;

use App\Models\Account as AccountModel;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Http\Utilities\NotFoundException;
use Exception;

Class Account {
    /**
     * Create a new account
     * @param $account
     * @return AccountModel
     * @throws \Exception
     */
    public static function create($account): AccountModel {
        $account['password'] = Hash::make($account['password']);
        return AccountModel::create($account);
    }

    /**
     * Update one account
     * @param $id
     * @param $account
     * @return AccountModel
     * @throws \Exception
     */
    public static function updateOne($id, $account): AccountModel {
        $accountOld = AccountModel::find($id);
        if ($accountOld == null || $accountOld->is_deleted) 
            throw new NotFoundException(new Exception('Account not found'));
        $accountOld->fill($account);
        $accountOld->update();
        return $accountOld;
    }

    /**
     * List of accounts
     * @param $per_page
     * @return LengthAwarePaginator
     * @throws \Exception
     */
    public static function list($per_page): LengthAwarePaginator {
        return AccountModel::where('is_deleted', false)->paginate($per_page);
    }

    /**
     * Get one account
     * @param $id
     * @return AccountModel
     * @throws \Exception
     */
    public static function getOne($id): AccountModel {
        $account = AccountModel::find($id);
        if ($account == null || $account->is_deleted)
            throw new NotFoundException(new Exception('Account not found'));
        return AccountModel::find($id);
    }

    /**
     * Delete one account
     * @param $id
     * @return bool
     * @throws \Exception
     */
    public static function deleteOne($id): bool {
        $account = AccountModel::find($id);
        if ($account == null || $account->is_deleted)
            throw new NotFoundException(new Exception('Account not found'));
        $account->is_deleted = true;
        return $account->update();
    }
}
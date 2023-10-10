<?php

namespace App\Http\Libs;

use App\Models\Company;
use Exception;
use Illuminate\Support\Facades\DB;

class CompanyLib
{
    /**
     * Get list of resource by ascending order.
     * 
     * @return object
     */
    public function index(): object
    {
        return Company::orderBy('id', 'asc')->paginate(3);
    }

    /**
     * Store resource.
     * 
     * @return object
     */
    public function store($data): object
    {
        try {
            DB::beginTransaction();
            DB::commit();
            return Company::create($data);
        } catch (Exception $error) {
            report($error);
            DB::rollBack();
        };
    }

    /**
     * Update data.
     * 
     * @return void
     */
    public function update($data, $company): void
    {
        try {
            DB::beginTransaction();
            Company::where('id', $company->id)
                ->update([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'address' => $data['address']
                ]);
            DB::commit();
        } catch (Exception $error) {
            report($error);
            DB::rollBack();
        };
    }

    /**
     * Delete resource.
     * 
     * @return void
     */
    public function destroy($company): void
    {
        try {
            DB::beginTransaction();
            $company = Company::find($company);
            $company->each->delete();
            DB::commit();
        } catch (Exception $error) {
            report($error);
            DB::rollBack();
        };
    }
}

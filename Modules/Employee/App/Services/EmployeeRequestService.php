<?php

namespace Modules\Employee\App\Services;

use App\Services\Models\ServiceModel;
use Exception;
use Illuminate\Support\Facades\DB;
use Modules\Employee\App\Models\EmployeeRequest;
use Modules\Employee\App\Services\traits\EmployeeRequest\EmployeeRequestCache;
use Modules\Employee\App\Services\traits\EmployeeRequest\EmployeeRequestFields;
use Modules\Employee\App\Services\traits\EmployeeRequest\EmployeeRequestRelational;

class EmployeeRequestService extends ServiceModel
{
    use EmployeeRequestRelational, EmployeeRequestFields, EmployeeRequestCache;

    function modelClass(): EmployeeRequest
    {
        return new EmployeeRequest();
    }

    /**
     * @throws Exception
     */
    function createEmployee($name, $last_name, $skils, $file_resume)
    {
        DB::beginTransaction();

        try {

            $filePath = null;

            if ($file_resume) {
                $fileName = rand(0, 999) . time() . $file_resume->getClientOriginalName();
                $destinationPath = public_path() . '/upload/file_resume/';
                $file_resume->move($destinationPath, $fileName);
                $filePath = $destinationPath . $fileName;
            }

            $insertData = [
                'name'        => $name,
                'last_name'   => $last_name,
                'skils'       => $skils,
                'file_resume' => $filePath,
            ];

            $this->create($insertData);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}

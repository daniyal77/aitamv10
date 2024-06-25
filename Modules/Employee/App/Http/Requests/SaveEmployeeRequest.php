<?php

namespace Modules\Employee\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveEmployeeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name'        => 'required',
            'last_name'   => 'required',
            'skils'       => 'required',
            'file_resume' => 'required|mimes:pdf,docx',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}

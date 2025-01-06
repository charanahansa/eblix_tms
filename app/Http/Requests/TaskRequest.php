<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Support\Facades\Auth;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'task_date' => 'required|date',
            'title' => 'required|string|max:50',
            'description' => 'required|string|max:500',
            'due_date' => 'required|date',
            'user_id' => 'required|exists:users,id',
            'status_id' => 'required|in:pending,completed',
        ];
    }
}

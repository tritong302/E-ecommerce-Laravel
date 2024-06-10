<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|max:255',
            'email'=>'required|email',
            'phone'=>'required|max:10',
            'password'=>$this->getPasswordValidationRule(),

            'password_confirmation' => $this->getPasswordConfirmationValidationRule()

        ];
    }
    protected function getPasswordValidationRule()
    {
        // Kiểm tra xem trường password có được gửi từ form hay không
        if ($this->isMethod('PUT')) {
            return 'nullable|min:8'; // Nếu là phương thức PUT (cập nhật người dùng), thì trường password có thể null hoặc ít nhất 6 ký tự
        } else {
            return 'required|min:8|confirmed'; // Nếu không phải là phương thức PUT (tạo mới người dùng), thì trường password là bắt buộc và ít nhất 6 ký tự
        }
    }
    protected function getPasswordConfirmationValidationRule()
    {
        // Kiểm tra xem trường password đã được nhập hay chưa
        if ($this->input('password')) {
            return 'required|same:password'; // Nếu trường password đã được nhập, yêu cầu trường password_confirmation là bắt buộc và phải giống với trường password
        } else {
            return 'nullable'; // Nếu trường password chưa được nhập, không yêu cầu trường password_confirmation
        }
    }
    public function message():array{
    return [
           'name.required'=>'Name is required',
           'email.required'=>'Email is required',
           'email.email'=>'Invalid email',
           'phone.required'=>'Phone is required',
           'phone.int'=> 'Phone is number',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 8 characters long.',
            'password.confirmed' => 'Password confirmation does not match.',
           'password_confirmation.required' => 'Password confirmation is required.',
           'password_confirmation.min' => 'Password confirmation must be at least 8 characters long.',

    ];
    }
}

<?php

namespace App\Livewire\Backend\Customers;

use App\Models\Customer;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class EditCustomer extends Component
{
    public $customerId;
    public $name;
    public $username;
    public $email;
    public $phone;
    public $password;
    public $password_confirmation;
    public $country_key;
    public $user_status;

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'username' => ['nullable', 'string', 'max:255', Rule::unique('customers', 'username')->ignore($this->customerId)],
            'email' => ['nullable', 'email', 'max:255', Rule::unique('customers', 'email')->ignore($this->customerId)],
            'phone' => 'nullable|string|max:20',
            'password' => 'nullable|string|min:6|confirmed',
            'country_key' => 'nullable|string|max:10',
            'user_status' => 'required|in:1,2,3',
        ];
    }

    protected $messages = [
        'name.required' => 'Name is Required',
        'name.string' => 'Name must be a string',
        'name.max' => 'Name must not exceed 255 characters',

        'username.string' => 'Username must be a string',
        'username.max' => 'Username must not exceed 255 characters',
        'username.unique' => 'This username is already taken',

        'email.email' => 'Please provide a valid email address',
        'email.max' => 'Email must not exceed 255 characters',
        'email.unique' => 'This email is already registered',

        'phone.string' => 'Phone must be a string',
        'phone.max' => 'Phone must not exceed 20 characters',

        'password.string' => 'Password must be a string',
        'password.min' => 'Password must be at least 6 characters',
        'password.confirmed' => 'Password confirmation does not match',

        'country_key.string' => 'Country key must be a string',
        'country_key.max' => 'Country key must not exceed 10 characters',

        'user_status.required' => 'User Status is Required',
        'user_status.in' => 'User Status must be 1, 2, or 3',
    ];

    public function mount($id)
    {
        $customer = Customer::findOrFail($id);

        $this->customerId = $customer->id;
        $this->name = $customer->name;
        $this->username = $customer->username;
        $this->email = $customer->email;
        $this->phone = $customer->phone;
        $this->country_key = $customer->country_key;
        $this->user_status = $customer->user_status;
    }

    public function update()
    {
        $this->validate();

        try {
            $customer = Customer::findOrFail($this->customerId);

            $data = [
                'name' => $this->name,
                'username' => $this->username,
                'email' => $this->email,
                'phone' => $this->phone,
                'country_key' => $this->country_key,
                'user_status' => $this->user_status,
            ];

            // Only update password if provided
            if (!empty($this->password)) {
                $data['password'] = Hash::make($this->password);
            }

            $customer->update($data);

            session()->flash('success', 'Customer updated successfully');
            return redirect()->route('super_admin.customers-index');
        } catch (\Exception $e) {
            session()->flash('danger', 'Error updating customer: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.backend.customers.edit-customer');
    }
}

<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            // 'nikename' => $input['nikename'],
            // 'gender' => $input['gender'],
            'birthday' => $input['birthday'],
            // 'street' => $input['street'],
            // 'province' => $input['province'],
            'telephone' => $input['telephone'],
            // 'current_job' => $input['current_job'],
            // 'education' => $input['education'],
            // 'title' => $input['title'],
            // 'overview' => $input['overview'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
        $user->assignRole('user');
        return $user;
    }
}

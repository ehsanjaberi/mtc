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
            'CodePrsn' => ['required', 'string', 'max:20','unique:users'],
            'Fname' => ['required', 'string', 'max:30'],
            'Lname' => ['required', 'string', 'max:30'],
            'CodeNational' => ['required', 'string', 'max:10'],
            'username' => ['required', 'string','max:50', 'unique:users'],
            'password' => ['required', 'string','max:15'],
//            'password' => $this->passwordRules(),
        ])->validate();

        return User::create([
            'CodePrsn' => $input['CodePrsn'],
            'Fname' => $input['Fname'],
            'Lname' => $input['Lname'],
            'CodeNational' => $input['CodeNational'],
            'username' => $input['username'],
            'password' => Hash::make($input['password']),
        ]);
    }
}

<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($userid, array $input)
    {
        Validator::make($input, [
            'CodePrsn' => ['required', 'string', 'max:20'],
            'Fname' => ['required', 'string', 'max:30'],
            'Lname' => ['required', 'string', 'max:30'],
            'CodeNational' => ['required', 'string', 'max:10'],
            'username' => ['required', 'string','max:255',Rule::unique('users')->ignore($userid,'CodePrsn')],
            'password' => ['max:15'],
        ])->validate();
        if ($input['password'])
        {
            User::where('CodePrsn',$userid)->update([
                'CodePrsn' => $input['CodePrsn'],
                'Fname' => $input['Fname'],
                'Lname' => $input['Lname'],
                'CodeNational' => $input['CodeNational'],
                'username' => $input['username'],
                'password' => Hash::make($input['password']),
            ]);
        }
        else{
            User::where('CodePrsn',$userid)->update([
                'CodePrsn' => $input['CodePrsn'],
                'Fname' => $input['Fname'],
                'Lname' => $input['Lname'],
                'CodeNational' => $input['CodeNational'],
                'username' => $input['username'],
            ]);
        }
    }
}

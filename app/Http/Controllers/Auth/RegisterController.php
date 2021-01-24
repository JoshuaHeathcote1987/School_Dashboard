<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class RegisterController extends Controller
{

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = "/dashboard/user";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $role = "";
        $roles = DB::table('roles')->count();

        if(empty($roles)) 
        {
            $role = Role::create(['name' => 'admin']);
            $permission = Permission::create(['name' => 'adminAccess']);

            $role = Role::create(['name' => 'teacher']);
            $permission = Permission::create(['name' => 'teacherAccess']);
            
            $role = Role::create(['name' => 'parent']);
            $permission = Permission::create(['name' => 'parentAccess']);

            $role = Role::create(['name' => 'student']);
            $permission = Permission::create(['name' => 'studentAccess']);
        }

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        DB::table('user_details')
            ->updateOrInsert(
                ['user_id' => $user->id, 'address' => 'Manchester', 'telephone' => '+44'],
            );

        DB::table('images')
            ->updateOrInsert(
                ['user_id' => $user->id, 'url' => '/storage/img/user/user.png'],
            );
        
        // Convert string to numeric identifying 
        switch ($data['role']) 
        {
            case 'admin':
                $role = 1;
                break;
            case 'teacher':
                $role = 2;
                break;
            case 'parent':
                $role = 3;
                break;
            case 'student':
                $role = 4;
                break;
                                   
            default:
                $role = 4;
                break;
        }

        $user->assignRole('admin');

        // Creates database


        return $user;
    }
}

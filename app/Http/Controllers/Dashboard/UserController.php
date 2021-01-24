<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

use DB;

use App\Models\Image;
use App\Models\User;
use App\Models\UserDetails;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Http\Controllers\ImageController;
use App\Http\Controllers\UserDetailsController;


class UserController extends Controller
{
    // Update variables
    private $role;
    private $image;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::with(['roles', 'image', 'detail'])->get();
        $adminCount = DB::table('model_has_roles')->where('role_id', '=', 1)->count();
        $teacherCount = DB::table('model_has_roles')->where('role_id', '=', 2)->count();
        $parentCount = DB::table('model_has_roles')->where('role_id', '=', 3)->count();
        $studentCount = DB::table('model_has_roles')->where('role_id', '=', 4)->count();
        $roleTotal = $adminCount + $teacherCount + $parentCount + $studentCount;
        $data = array('users' => $users, 'adminCount' => $adminCount, 'teacherCount' => $teacherCount, 'parentCount' => $parentCount, 'studentCount' => $studentCount, 'roleTotal' => $roleTotal);
        return view('dashboard.users')->with('data', $data);
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'name' => 'required|max:35',
            'email' => 'required|max:50',
            'address' => 'max:100',
            'telephone' => 'max:25',
            'password' => 'required|max:20',
        ]);

        // Password validation
        if ($request->input('password') != $request->input('password-confirm')) {
            return redirect()->route('user.index')->withFail('Input passwords don\'t match, please try again.');
        }

        // Creates a new user
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        // Assign the user the selected role
        $user->assignRole($request->input('role'));

        // Enters the users details into the user_details table
        $user->detail()->create($request->only(['address', 'telephone']));

        // Try to pull the image to the server
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);
  
        $imageName = time().'.'.$request->image->extension();

        DB::table('images')->insert([
            'user_id' => $user->id,
            'url' => 'storage/img/user/'.$imageName
        ]);

        $request->image->move(public_path('storage/img/user'), $imageName);

        return redirect()->route('user.index')->withSuccess('User updated!');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
       
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'name' => 'required|max:35',
            'email' => 'required|max:50',
            'address' => 'max:100',
            'telephone' => 'max:25',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;

        $userDetails = UserDetails::where('user_id', $id)->first();

        if (!empty($request->address)) 
            $userDetails->address = $request->address;
        

        if (!empty($request->telephone)) 
            $userDetails->telephone = $request->telephone; 
        

        switch ($request->input('role')) {
            case 'admin':
                $this->role = 1;
                break;
            case 'teacher':
                $this->role = 2;
                break;
            case 'parent':
                $this->role = 3;
            case 'student':
                $this->role = 4;
            default:
                # code...
                break;
        }

        try {
            if(!empty($request->image))
            {
                $imageName = time().'.'.$request->image->extension();  
            
                $request->image->move(public_path('storage/img/user'), $imageName);
                
                // Finds the original images position in the database and write over it
                $this->image = Image::find($user->id);
                $this->image->url = 'storage/img/user/'.$imageName; 
                
                $this->image->save();
            }
        } catch (exception $e) {
            return redirect()->route('user.index')->withFail('User upload image!');
        }
        
        try {
            DB::table('model_has_roles')
            ->where('model_id', $id)
            ->update(['role_id' => $this->role]);

            $user->save();
            $userDetails->save();
        }
        catch (exception $e) 
        {
            return redirect()->route('user.index')->withFail('User failed to update!');
        }

        return redirect()->route('user.index')->withSuccess('User updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect()->route('user.index');
    }
}

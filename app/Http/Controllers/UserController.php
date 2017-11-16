<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class UserController extends Controller
{
    //---------------Sending all of the users to the Admin users blade

    public function showAll(){
      return view('admin.users.index')->with('Users' , User::all());
    }

    // Validating the request and adding a new user to the users table.

    public function store() {
      $this->validate(request(), [
        'name' => 'required|max:25',
        'email' => 'unique:users',
        'password' => 'required|max:25|min:4',
      ]);
      $User = new User;
      $User->name = request()->name;
      $User->email = request()->email;
      $User->password = bcrypt(request()->password);
      if(request()->is_admin){
        $User->is_admin = 1;
      }
      $User->save();
      Session::flash('success' , 'u made a new user');
      return redirect()->back();
    }

    //redirecting to a selected users edit page

    public function edit(User $id) {
      return view('admin.users.edit')->with('User' , $id);
    }

    //Validating and changing the edited user data

    public function update(User $id) {
      $this->validate(request(), [
        'name' => 'required|max:25',
      ]);
      if(!empty(request()->password)){
        $this->validate(request() , [
          'password' => 'max:25|min:4',
        ]);
      }
      if(!$id->email == request()->email){
        $this->validate(request(), [
          'email' => 'unique:users',
        ]);
      }
      $User = $id;
      $User->name = request()->name;

      $User->email = request()->email;
      $User->password = bcrypt(request()->password);
      if(request()->is_admin){
      $User->is_admin = 1;
      }else {
        $User->is_admin = 0;
      }
      $User->save();
      Session::flash('success' , 'u updated this user');
      return redirect()->route('users.all');
    }

    // Deleting a selected user

    public function delete(User $id) {
      $id->delete();
      Session::flash('delete' , 'U DELETED THIS USER');
      return redirect()->back();
    }

    // Sending the logged in user to is own Account page

    public function account() {
        $id = Auth::user()->id;
        $User = User::find($id);
        return view('myAccount')->with('User' , $User);
    }

    // Validating and setting the changed data to the logged in user's row
    public function edited() {
      $this->validate(request(), [
        'name' => 'required|max:25',
      ]);
      if(!request()->email == Auth::user()->email) {
        $this->validate(request(), [
          'email' => 'unique:users',
        ]);
      }
      if(!empty(request()->password)){
        $this->validate(request() , [
          'password' => 'max:25|min:4',
        ]);
      }
        $id = Auth::user()->id;
        $User = User::find($id);
        $User->name = request()->name;
        $User->email = request()->email;
        if(!empty(request()->password)){
            $User->password = bcrypt(request()->password);
        }
        $User->save();
        Session::flash('success' , 'U have Succesfully updated your profile');
        return redirect()->route('welcome');

    }

}

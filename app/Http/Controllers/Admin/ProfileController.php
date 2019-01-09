<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProfilesPost;
use App\Model\Profiles;

class ProfileController extends Controller
{
    public function index(Request $request, Profiles $profileModel)
    {
    	$data = [];
    	$message = $request->session()->get('addProfile');
    	$dataProfile = $profileModel->getAllDataProfile();

    	$data['mess'] = $message;
    	$data['info'] = $dataProfile;

    	return view('admin.profile.index',$data);
    }

    public function addView()
    {
    	return view('admin.profile.add');
    }

    public function handleAdd(StoreProfilesPost $request, Profiles $profileModel)
    {
    	// lay cac thong tin len tu form
    	$user = $request->input('fullname');
    	$nickname = $request->input('nickname');
    	$email = $request->input('email');
    	$phone = $request->input('phone');
    	$address = $request->input('address');
    	$date = $request->input('date');
    	$gender = $request->input('gender');
    	$single = $request->input('single');
    	$description = $request->input('description');
    	$avatarProfile = null;

    	// upload file
    	// kiem tra xem co ton tai file up len ko?
    	if($request->hasFile('avatar')){
    		// lay ten file luu tren may cua nguoi dung
    		$photoFile = $request->file('avatar');
    		$nameFile = $photoFile->getClientOriginalName();
    		if($nameFile){
    			$avatarProfile = $nameFile;
    			$photoFile->move('
    				', $nameFile);
    		}
    	}

    	// save data 
    	$saveData = [
    		'fullname' => $user,
    		'nickname' => $nickname,
    		'email' => $email,
    		'avatar' => $avatarProfile,
    		'phone' => $phone,
    		'address' => $address,
    		'birthday' => $date,
    		'gender' => $gender,
    		'single' => $single,
    		'status' => 1,
    		'description' => $description,
    		'created_at' => date('Y-m-d H:i:s'),
    		'updated_at' => null
    	];

    	$save = $profileModel->saveProfile($saveData);
    	if($save){
    		$request->session()->flash('addProfile',' add success');
    		return redirect()->route('admin.profile');
    	} else {
    		$request->session()->flash('addProfile',' add fail');
    		return redirect()->route('admin.formAddProfile');
    	}

    }


}

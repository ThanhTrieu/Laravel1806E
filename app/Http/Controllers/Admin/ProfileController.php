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
    			$photoFile->move('uploads/images', $nameFile);
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

    public function deleteProfile(Request $request, Profiles $profileModel)
    {
        if($request->ajax()){
            $id = $request->idProfile;
            $id = is_numeric($id) ? $id : 0;
            $del = $profileModel->deleteProfileById($id);
            $data = [];
            $data['mess'] = null;
            if($del){
                $data['mess'] = 'ok';
            }
            return response()->json($data);
        }
    }

    public function editProfile($id, Request $request, Profiles $profileModel)
    {
        $id = is_numeric($id) ? $id : 0;
        $infoProfile = $profileModel->getDataInfoProfileById($id);
        if($infoProfile){
            return view('admin.profile.edit')->with('info',$infoProfile);
        } else {
            return abort(404);
        }
    }

    public function handleEdit($id, StoreProfilesPost $request, Profiles $profileModel)
    {
        //validate form data
        // lay thong tin tu db ra
        $infoProfile = $profileModel->getDataInfoProfileById($id);
        if($infoProfile){
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
            $status = $request->input('status');
            $status = in_array($status, ['0','1']) ? $status : 0;

            $avatarProfile = $infoProfile['avatar'];
            // xu ly upload file
            // kiem tra xem co ton tai file up len ko?
            if($request->hasFile('avatar')){
                // lay ten file luu tren may cua nguoi dung
                $photoFile = $request->file('avatar');
                $nameFile = $photoFile->getClientOriginalName();
                if($nameFile){
                    $avatarProfile = $nameFile;
                    $photoFile->move('uploads/images', $nameFile);
                }
            }
            //update data
            $dataUpdate  = [
                'fullname' => $user,
                'nickname' => $nickname,
                'email' => $email,
                'avatar' => $avatarProfile,
                'phone' => $phone,
                'address' => $address,
                'birthday' => $date,
                'gender' => $gender,
                'single' => $single,
                'status' => $status,
                'description' => $description,
                'updated_at' => date('Y-m-d H:i:s')
            ];
            $up = $profileModel->updateProfileById($dataUpdate, $id);
            if($up){
                $request->session()->flash('addProfile',' Edit success');
                return redirect()->route('admin.profile');
            } else {
                return redirect()->route('admin.editProfile',[
                    'id'=>$id,
                    'state'=> 'fail'
                ]);
            }
        } else {
            return abort(404);
        }
    }

}

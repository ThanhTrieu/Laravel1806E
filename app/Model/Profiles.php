<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Profiles extends Model
{
    protected $table = 'profiles';

    private function changeDataToArray($data)
    {
    	return ($data) ? $data->toArray() : [];
    }

    public function getDataInfoProfileById($id)
    {
        $info = Profiles::find($id);
        return $this->changeDataToArray($info);
    }

    public function updateProfileById($data, $id)
    {
        $up = DB::table('profiles')
                ->where('id',$id)
                ->update($data);
        if($up){
            return true;
        }
        return false;
    }

    public function deleteProfileById($id)
    {
        $profile = Profiles::find($id);
        if($profile->delete()){
            return true;
        }
        return false;
    }

    public function saveProfile($data)
    {
    	$insert = DB::table('profiles')->insert($data);
    	if($insert){
    		return true;
    	}
    	return false;
    }

    public function getAllDataProfile()
    {
    	$data = Profiles::all();
    	return $this->changeDataToArray($data);
    }
}

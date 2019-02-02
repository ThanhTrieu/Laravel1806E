<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Model\Profiles;

class ResumeController extends BaseController
{
    public function index(Profiles $dbProfile)
    {
    	$infoPfile = $this->getDataInfoHeader($dbProfile, 1);
    	$data = [];
    	$data['info'] = $infoPfile;

    	return view('frontend.resume.index',$data);
    }
}

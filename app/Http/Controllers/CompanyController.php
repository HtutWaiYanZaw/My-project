<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PortfolioImage;

class CompanyController extends Controller
{
    public function getCompanyPage(){
        $portfolioImages = PortfolioImage::get();
        return view('cms.company')
            ->with('portfolioImages',$portfolioImages);
    }
}

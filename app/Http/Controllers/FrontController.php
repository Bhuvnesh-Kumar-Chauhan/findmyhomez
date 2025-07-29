<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;

class FrontController extends Controller
{
    public function index()
    {
        $home_sliders = Slider::all();
        $settings = \App\Models\Setting::first();
        return view('index',compact('home_sliders','settings'));
    }
    public function second()
    {
        return view('second');
    }
    public function third()
    {
        return view('third');
    }
    public function about()
    {
        return view('about');
    }
    public function contact()
    {
        return view('contact'); 
    }
    public function services()
    {
        return view('services');
    }
    public function properties()
    {
        return view('properties');
    }
    public function propertyDetail($id)
    {
        return view('property_detail', ['id' => $id]);
    }

    public function ourTeam()
    {
        return view('our_team');
    }
    public function blog()
    {
        return view('blog');
    }
    public function blogDetail($id)
    {
        return view('blog_detail', ['id' => $id]);
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        return view('search_results', ['query' => $query]);     
    }

    public function propertyList()
    {
        return view('property_listing');
    }
}

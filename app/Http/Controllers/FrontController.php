<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function index()
    {
        return view('index');
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
    public function blog()
    {
        return view('blog');
    }
    public function blogDetail($id)
    {
        return view('blog_detail', ['id' => $id]);
    }
    public function propertyDetail($id)
    {
        return view('property_detail', ['id' => $id]);
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        // Perform search logic here, e.g., querying the database
        return view('search_results', ['query' => $query]);     
    }
}

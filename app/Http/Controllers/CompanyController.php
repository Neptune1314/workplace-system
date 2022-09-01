<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use App\Models\User;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id, Company $company)
    {
        // return 'OК';
        // $company = Company::findOrFail($id);
        return view('companies.index', compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    public function logo(Request $request){
        $this->validate($request, [
            'logo' => 'required|mimes:jpg,bmp,png|max:20000',
        ]);

        $user_id = auth()->user()->id;
        if($request->hasFile('logo')){ // avatar гэдэг file байвал доорх функц ажиллана
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.'.$extension;
            $file->move('upload/logo/', $filename);
        }
        Company::where('user_id', $user_id)->update([
            'logo' => $filename
        ]);

        return redirect()->back()->with('MessageLogo', 'Компани лого зураг амжилттай шинэчлэгдлээ.');
    }
    public function coverphoto(Request $request){
        $this->validate($request, [
            'cover_photo' => 'required|mimes:jpg,bmp,png|max:20000',
        ]);
        
        $user_id = auth()->user()->id;
        // return '$request'
        // dd($request)

        if($request->hasFile('cover_photo')){
            $file = $request->file('cover_photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.'.$extension;
            $file->move('upload/coverphoto/', $filename);
        };
        Company::where('user_id', $user_id)->update([
            'cover_photo' => $filename
        ]);

        return redirect()->back()->with('MessageCoverPhoto', 'Компани нүүр зурагыг амжилттай шинэчлэгдлээ.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'address' => 'required',
            'phone' => 'required|numeric|min:8', //numeric Тоон утга байх ёстой
            'website' => 'required',
            'slogan' => 'required|min:20',
            'description' => 'required|min:20',
        ]);
        $user_id = auth()->user()->id;
        // return $user_id;
        Company::where('user_id', $user_id)->update([
            'address' => $request->address,
            'phone' => $request->phone,
            'website' => $request->website,
            'slogan' => $request->slogan,
            'description' => $request->description
        ]);
        return redirect()->back()->with('MessageCompany', 'Компанийн мэдээлэл амжилттай шинэчлэгдлээ.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}

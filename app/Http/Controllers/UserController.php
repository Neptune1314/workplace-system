<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Validation\Rules\File;

class UserController extends Controller
{

    

    public function index()
    {
        return view('profile.index');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'address' => 'required',
            'phone_number' => 'required|numeric|min:8', //numeric Тоон утга байх ёстой
            'experience' => 'required|min:20',
            'bio' => 'required|min:20',
        ]);
        $user_id = auth()->user()->id;
        // return $user_id;
        Profile::where('user_id', $user_id)->update([
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'experience' => $request->experience,
            'bio' => $request->bio
        ]);
        return redirect()->back()->with('Message', 'Хэрэглэгчийн мэдээлэл амжилттай шинэчлэгдлээ.');
    }

    public function coverletter(Request $request){
        $this->validate($request, [
            'cover_letter' => 'required|mimes:pdf,doc,docx|max:20000',
        ]);
        
        $user_id = auth()->user()->id;
        $cover = $request->file('cover_letter')->store('public/files');
        Profile::where('user_id', $user_id)->update([
            'cover_letter' => $cover
        ]);
        return redirect()->back()->with('MessageCoverLetter', 'Хэрэглэгчийн ажил байдлын тодорхойлолт амжилттай илгээгдлээ.');
    }
    public function resume(Request $request){
        $this->validate($request, [
            'resume' => 'required|mimes:pdf,doc,docx|max:20000',
        ]);
        $user_id = auth()->user()->id;
        $resume = $request->file('resume')->store('public/files');
        Profile::where('user_id', $user_id)->update([
            'resume' => $resume
        ]);
        return redirect()->back()->with('MessageResume', 'Хэрэглэгчийн ажлын анкет амжилттай илгээгдлээ.');
    }
    
    public function avatar(Request $request){
        $this->validate($request, [
            'avatar' => 'required|mimes:jpg,bmp,png|max:20000',
        ]);

        $user_id = auth()->user()->id;
        if($request->hasFile('avatar')){ // avatar гэдэг file байвал доорх функц ажиллана
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.'.$extension;
            $file->move('upload/avatar/', $filename);
        }
        Profile::where('user_id', $user_id)->update([
            'avatar' => $filename
        ]);

        return redirect()->back()->with('MessageAvatar', 'Хэрэглэгчийн профайл зураг амжилттай шинэчлэгдлээ.');
    }
}

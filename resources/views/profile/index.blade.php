@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-2">
            <img src="{{asset('assets/avatar/man.jpg')}}" width="100" alt="">
        </div>
        
            <div class="col-md-6">
                <form action="{{ route('user.profile.update')}}" method="post">
                    @csrf
                <div class="card">
                    <div class="card-header">Профайл мэдээлэл шинэчлэх</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Гэрийн хаяг</label>
                            <input type="text" name="address" value="{{ auth()->user()->profile->address}}" class="form-control" placeholder="">
                        </div>
    
                        <div class="form-group">
                            <label for="">Ажлын туршлага/Ажилсан байдал/</label>
                            <textarea name="experience" placeholder="{{ auth()->user()->profile->experience}}" class="form-control"></textarea>
                        </div>
    
                        <div class="form-group">
                            <label for="">Таны бусдаас ялгарах давуу тал</label>
                            <textarea name="bio" value="" class="form-control" placeholder="{{ auth()->user()->profile->bio}}"></textarea>
                        </div>
    
                        <div class="form-group">
                            <button class="btn btn-success">Шинэчлэх</button>
                        </div>
    
                    </div>
                </div>
            </form>
            @if (Session::has('Message'))
                <div class="alert alert-success">
                    {{ Session::get('Message')}}
                </div>
            @endif
            </div>
       
        
        <div class="col-md-4">
            
            <div class="card">
                <div class="card-header">Хэрэглэгчийн мэдээлэл</div>
                     <div class="card-body">
                      <p>Хэрэглэгчийн нэр: {{ auth()->user()->name}}</p>
                      <p>Хэрэглэгчийн нэр: {{ auth()->user()->email}}</p>
                      <p>Хэрэглэгчийн хаяг: {{ auth()->user()->profile->address}}</p>
                      <p>Хүйс: {{ auth()->user()->profile->gender}}</p>
                      <p>Ажлын туршлага: {{ auth()->user()->profile->experience}}</p>
                      <p>Таны бусдаас ялгарах давуу тал: {{ auth()->user()->profile->bio}}</p>
                      <p>Бүртгэгдсэн огноо: {{ auth()->user()->created_at}}</p>
                     </div>
                </div>

                <div class="card">
                    <div class="card-header">Хэрэглэгчийн ажил байдлын тодорхойлолт</div>
                         <div class="card-body">
                            <input type="file" class="form-control" name="cover_letter">
                            <button type="submit" class="btn btn-success float-right">Файл хуулах</button>
                         </div>
                    </div>

                    <div class="card">
                        <div class="card-header">Хэрэглэгчийн ажлын анкет</div>
                             <div class="card-body">
                                <input type="file" class="form-control" name="resume">
                                <button type="submit" class="btn btn-success float-right">Файл хуулах</button>
                             </div>
                        </div>
                        
                     </div>
                 </div>
                 
             </div>
             
    </div>
</div>
@endsection
<style>
    .float-right {
        float: right
    }
    .form-group {
        margin-bottom: 1rem
    }
</style>

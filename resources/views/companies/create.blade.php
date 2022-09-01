@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-3">

            @if (!empty(Auth::user()->company->logo)) {{--  --}}
                <img src="{{ asset('upload/logo')}}/{{ Auth::user()->company->logo}}" width="100" style="width: 100%" alt="">
            @else
                <img src="{{asset('assets/img/avatar/serwman1.jpg')}}" width="100" style="width: 100%" alt=""> 
        @endif
            

            <form action="{{ route('company.logo')}}" method="POST" enctype="multipart/form-data"> 
                @csrf
                <div class="card">
                    <div class="card-header">
                        Компани лого зургийг шинэчлэх
                    </div>
                    <div class="card-body">
                        <input type="file" class="form-control" name="logo">
                        <button type="submit" class="btn btn-success float-right">Шинэчлэх</button>
                        @if($errors->has('logo'))
                            <div class="error" style="color: red">
                                {{ $errors->first('logo') }}</div>
                            @endif
                    </div>
                </div>
            </form>
            @if (Session::has('MessageLogo'))
                <div class="alert alert-success">
                    {{ Session::get('MessageLogo')}}
                </div>
            @endif
        </div>
        
            <div class="col-md-5">
                <form action="{{ route('company.update')}}" method="post">
                    @csrf
                <div class="card">
                    <div class="card-header">Ажил олгогч компани мэдээлэл</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Компани хаяг</label>
                            <input type="text" name="address" value="{{ auth()->user()->company->address}}" class="form-control" placeholder="">
                            @if($errors->has('address'))
                            <div class="error" style="color: red">
                                {{ $errors->first('address') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Холбоо барих утасны дугаар</label>
                            <input type="text" name="phone" placeholder="{{ auth()->user()->company->phone}}" class="form-control" placeholder="">
                            @if($errors->has('phone'))
                            <div class="error" style="color: red">
                                {{ $errors->first('phone') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Веб сайт</label>
                            <input type="text" name="website" value="{{ auth()->user()->company->website}}" class="form-control" placeholder="">
                            @if($errors->has('website'))
                            <div class="error" style="color: red">
                                {{ $errors->first('website') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Мэдээ мэдээлэл</label>
                            <textarea name="slogan" class="form-control">{{auth()->user()->company->slogan}}</textarea>
                            @if($errors->has('slogan'))
                            <div class="error" style="color: red">
                                {{ $errors->first('slogan') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Тайлбар</label>
                            <textarea name="description" class="form-control" placeholder="{{ auth()->user()->company->description}}"></textarea>
                            @if($errors->has('description'))
                            <div class="error" style="color: red">
                                {{ $errors->first('description') }}</div>
                            @endif
                        </div>
    
                        <div class="form-group">
                            <button class="btn btn-success">Шинэчлэх</button>
                        </div>
    
                    </div>
                </div>
            </form>
            @if (Session::has('MessageCompany'))
                <div class="alert alert-success">
                    {{ Session::get('MessageCompany')}}
                </div>
            @endif
            </div>
       
        
        <div class="col-md-4">
            
            <div class="card">
                <div class="card-header">Ажил олгочын дэлгэрэнгүй мэдээлэл</div>
                     <div class="card-body">
                      <p>Компани нэр: {{ auth()->user()->company->cname}}</p>
                      <p>Хаяг: {{ auth()->user()->company->address}}</p>
                      <p>Утасны дугаар: {{ auth()->user()->company->phone}}</p>
                      <p>Веб сайт: {{ auth()->user()->company->website}}</p>
                      <p>Мэдээ, Мэдээлэл: {{ auth()->user()->company->slogan}}</p>
                      <p>Тайлбар: {{ auth()->user()->company->description}}</p>
                      {{-- <a href="{{ route('company.index', [$job->company->id, $job->company->slug]) }}">{{ $job->company->cname }} --}}
                        <a href="company/{{ Auth::User()->company->slug}}" >Компани худасруу шилжих</a>
                        
                    </a>
                     </div>
                </div>

                <div class="card">
                    <form action="{{ route('company.coverphoto')}} " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">Компани ковер зураг солих</div>
                        <div class="card-body">
                           <input type="file" class="form-control" name="cover_photo">
                           <button type="submit" class="btn btn-success float-right">Файл хуулах</button>
                           @if($errors->has('cover_photo'))
                            <div class="error" style="color: red">
                                {{ $errors->first('cover_photo') }}</div>
                            @endif
                        </div>
                   </div>
                </form>
                @if (Session::has('MessageCoverPhoto'))
                <div class="alert alert-success">
                    {{ Session::get('MessageCoverPhoto')}}
                </div>
                @endif
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
    .card {
        margin-bottom: 1rem
    }
    .btn {
        margin-top: 1rem
    }
    a{
        text-decoration: none !important;
    }
    a:hover{
        text-decoration: underline !important;
        color: #198754 !important;
    }
</style>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (Session::has('MessageJob'))
                     <div class="alert alert-success">
                         {{ Session::get('MessageJob')}}
                     </div>
                 @endif
                <div class="card">
                    <div class="card-header">Ажлын байр зарлах</div>
                    <div class="card-body">
                        <form action="{{ route('jobs.store') }}" method="POST">
                            @csrf
                                <div class="form-group">
                                    {{-- <label for="">Гарчиг</label> --}}
                                    <input type="text" name="title" id="" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="Гарчиг оруулах хэсэг">
                                    @if($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <textarea name="description" class="from-control {{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="Ажлын байрны талаарх мэдээлэл" style="width: 100%"></textarea>
                                    @if($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    {{-- <label for="">Гарчиг</label> --}}
                                    <input type="text" name="role" id="" class="form-control {{ $errors->has('role') ? ' is-invalid' : '' }}" placeholder="Ажлын байрны нэр">
                                    @if($errors->has('role'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('role') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <select name="category" class="form-control">
                                        {{-- @foreach (App\Models\Category::all() as $category)
                                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                                        @endforeach Энэ нь controller-р дамжуулахгүй өөр table-с өгөгдөл авхад ашиглах--}}
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                            
                                <div class="form-group">
                                    <textarea name="address" class="from-control {{ $errors->has('address') ? ' is-invalid' : '' }}" placeholder="Ажлын хаягаа оруулна уу?" style="width: 100%"></textarea>
                                    @if($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                
                                <div class="form-group">
                                    <input type="text" class="form-control {{ $errors->has('number_of_vacancy') ? ' is-invalid' : '' }}" name="number_of_vacancy" placeholder="Ажлын байрны зарлагдсан тоог оруулна уу?">
                                    @if($errors->has('number_of_vacancy'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('number_of_vacancy') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control {{ $errors->has('experience') ? ' is-invalid' : '' }}" name="experience" placeholder="Ажилтанд тавигдах ажлын байрны туршлагын талаар мэдээлэл оруулна уу?">
                                    @if($errors->has('experience'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('experience') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <select name="gender" class="form-control">
                                        <option value=""><--- Хүйс сонгох ---></option>
                                        <option value="male">Эрэгтэй</option>
                                        <option value="female">Эмэгтэй</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <select name="salary" class="form-control">
                                        <option value="тохиролцох боломжтой">Тохиролцоно</option>
                                        <option value="500000-600000">500000-600000</option>
                                        <option value="600000-700000">600000-700000</option>
                                        <option value="700000-800000">700000-800000</option>
                                        <option value="800000-900000">800000-900000</option>
                                        <option value="900000-1000000">900000-1000000</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <select name="type" class="form-control">
                                            <option value="fulltime">Орон тооны ажилтан</option>
                                            <option value="parttime">Цагийн ажилтан</option>
                                            <option value="casual">Орон тооны бус /Гэрээт ажилтан/</option>
                                    </select>
                                   
                                </div>

                                <div class="form-group">
                                    <input type="text" name="position" id="" class="form-control {{ $errors->has('position') ? ' is-invalid' : '' }}" placeholder="Ажилын үүргийн чиглэлийг бичиж өгнө үү?">
                                    @if($errors->has('position'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('position') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            
                                <div class="form-group ">
                                    <label for="status">Нийтлэх эсэх</label>
                                    <select name="status" class="form-control">
                                            <option value="1">Нийтлэх</option>
                                            <option value="0">Нийтлэхгүй</option>
                                    </select>
                                </div>
                            
                                <div class="form-group">
                                    {{-- <label for="">Гарчиг</label> --}}
                                    <input type="text" name="last_date" id="datepicker" class="form-control {{ $errors->has('last_date') ? ' is-invalid' : '' }}" placeholder="Ажлын байрны анкет хүлээн авах хугацаа">
                                    @if($errors->has('last_date'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('last_date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            
                                <div class="form-group">
                                    {{-- <label for="">Гарчиг</label> --}}
                                    <button type="submit" class="btn btn-primary">Ажлын байрны зар үүсгэх</button>
                                </div>
                     </form>
                     
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<style>
    .form-group {
        margin-bottom: 1rem;
    }
    label {
        margin-bottom: .5rem;
    }
</style>

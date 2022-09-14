@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(Session::has('MessageUpdateJob'))
                     <div class="alert alert-success">
                         {{ Session::get('MessageUpdateJob') }}
                     </div>
                 @endif
                <div class="card">
                    <div class="card-header">Ажлын байр засах</div>
                    <div class="card-body">
                        <form action="{{ route('jobs.update', [$job->id]) }}" method="POST">
                            @csrf
                                <div class="form-group">
                                    {{-- <label for="">Гарчиг</label> --}}
                                    <input type="text" name="title" id="" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="Гарчиг оруулах хэсэг" value="{{ $job->title }}">
                                    @if($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <textarea name="description" class="from-control {{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="Ажлын байрны талаарх мэдээлэл" style="width: 100%" value="{{ $job->description }}"></textarea>
                                    @if($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    {{-- <label for="">Гарчиг</label> --}}
                                    <input type="text" name="role" id="" class="form-control {{ $errors->has('role') ? ' is-invalid' : '' }}" placeholder="Ажлын байрны нэр" value="{{ $job->role }}">
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
                                        @endforeach  Энэ нь controller-р дамжуулахгүй өөр table-с өгөгдөл авхад ашиглах --}}
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $job->category_id ? 'selected' : ''}}>{{ $category->name }}</option>
                                            {{-- <option value="{{ $category->id }}" {{ $category->id == $job->category_id ? 'selected' : ''}}>{{ $category->name }} | {{ $job->category_id }}</option> --}}
                                        @endforeach
                                    </select>
                                    
                                </div>
                            
                                <div class="form-group">
                                    <textarea name="address" class="from-control {{ $errors->has('address') ? ' is-invalid' : '' }}" placeholder="Ажлын хаягаа оруулна уу?" style="width: 100%" value="{{ $job->address }}"></textarea>
                                    @if($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control {{ $errors->has('number_of_vacancy') ? ' is-invalid' : '' }}" name="number_of_vacancy" placeholder="Ажлын байрны зарлагдсан тоог оруулна уу?" value="{{ $job->number_of_vacancy }}">
                                    @if($errors->has('number_of_vacancy'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('number_of_vacancy') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control {{ $errors->has('experience') ? ' is-invalid' : '' }}" name="experience" placeholder="Ажилтанд тавигдах ажлын байрны туршлагын талаар мэдээлэл оруулна уу?" value="{{ $job->experience }}">
                                    @if($errors->has('experience'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('experience') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <select name="gender" class="form-control">
                                        <option value="male" {{ $job->gender == 'male' ? 'selected' : '' }}>Эрэгтэй</option>
                                        <option value="female" {{ $job->gender == 'female' ? 'selected' : '' }}>Эмэгтэй</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <select name="salary" class="form-control">
                                        <option value="тохиролцох боломжтой" {{ $job->salary == 'тохиролцох боломжтой' ? 'selected' : '' }}>Тохиролцоно</option>
                                        <option value="500000-600000" {{ $job->salary == '500000-600000' ? 'selected' : '' }}>500000-600000</option>
                                        <option value="600000-700000" {{ $job->salary == '600000-700000' ? 'selected' : '' }}>600000-700000</option>
                                        <option value="700000-800000" {{ $job->salary == '700000-800000' ? 'selected' : '' }}>700000-800000</option>
                                        <option value="800000-900000" {{ $job->salary == '800000-900000' ? 'selected' : '' }}>800000-900000</option>
                                        <option value="900000-1000000" {{ $job->salary == '900000-1000000' ? 'selected' : '' }}>900000-1000000</option>
                                    </select>
                                </div>
                            
                                <div class="form-group">
                                    <select name="type" class="form-control">
                                            <option value="fulltime" {{ $job->type == 'fulltime' ? 'selected' : '' }}>Орон тооны ажилтан </option>
                                            <option value="parttime" {{ $job->type == 'parttime' ? 'selected' : '' }}>Цагийн ажилтан</option>
                                            <option value="casual" {{ $job->type == 'casual' ? 'selected' : '' }}>Орон тооны бус /Гэрээт ажилтан/</option>
                                    </select>
                                   
                                </div>

                                <div class="form-group">
                                    <input type="text" name="position" id="" class="form-control {{ $errors->has('position') ? ' is-invalid' : '' }}" placeholder="Ажилын үүргийн чиглэлийг бичиж өгнө үү?" value="{{ $job->position }}">
                                    @if($errors->has('position'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('position') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            
                                <div class="form-group ">
                                    <label for="status">Нийтлэх эсэх</label>
                                    <select name="status" class="form-control">
                                            <option value="1" {{ $job->status == '1' ? 'selected' : '' }}>Нийтлэх</option>
                                            <option value="0" {{ $job->status == '0' ? 'selected' : '' }}>Нийтлэхгүй</option>
                                    </select>
                                </div>
                            
                                <div class="form-group">
                                    {{-- <label for="">Гарчиг</label> --}}
                                    <input type="text" name="last_date" id="datepicker" class="form-control {{ $errors->has('last_date') ? ' is-invalid' : '' }}" placeholder="Ажлын байрны анкет хүлээн авах хугацаа" value="{{ $job->last_date }}">
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

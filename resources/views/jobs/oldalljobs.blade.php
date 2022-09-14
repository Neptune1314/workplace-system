@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <form action="{{ route('alljobs') }}" method="get"> 
            @csrf
            <div class="form-inline">
                <div class="form-group ">
                    <label for=""></label>
                    <input type="text" name="title" class="form-control" placeholder="Хайх түлхүүр үг">
                </div>
                <div class="form-group ">
                    <label for=""></label>
                    <select name="type" class="form-control">
                        <option value="">Ажлын нөхцөл сонгох</option>
                        <option value="fulltime">Бүтэн цагийн ажилтан</option>
                        <option value="parttime">Цагийн ажилтан</option>
                        <option value="casual">Гэрээт ажилтан</option>
                    </select>
                </div>
                <div class="form-group ">
                    <label for=""></label>
                    <select name="category_id" class="form-control">
                        <option value="">Ангилал сонгох</option>
                        @foreach (App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach 
                    </select>
                </div>
                <div class="form-group ">
                    <label for=""></label>
                    <input type="text" name="address" class="form-control" placeholder="Хаяг">
                </div>
                <div class="form-group ">
                    <button type="submit" class="btn btn-outline-success">Хайх</button>
                </div>
            </div>
        </form>
       <h1>Ажлын байрны жагсаалт</h1>
       <table class="table">
        <thead>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </thead>
        <tbody>
            {{-- @for ($i = 0; $i<10; $i++) --}}
            @foreach ($jobs as $job)
            <tr>
                <td>
                    <img src="{{ asset('assets/img/avatar/man.jpg')}}" width="80" alt="">
                </td>
                <td>Position: {{ $job->position }}
                    <div>
                        <i class="fa fa-clock" aria-hidden="true"></i> Үндсэн ажилтан
                    </div>
                </td>
                <td><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Address: {{ $job->address}} </td>
                <td><i class="fa fa-globe" aria-hidden="true"></i> Date: {{$job->created_at->diffForHumans()}} </td>
                <td>
                    <a href="{{ route('jobs.show', [$job->id, $job->slug]) }}">
                    <button class="btn btn-success">Дэлгэрэнгүй</button></a>
                </td>
            </tr>
            {{-- @endfor --}}
            @endforeach
        </tbody>
       </table>
       {{-- {{ $jobs->links() }}  --}}
       {{ $jobs->appends(request()->except('page'))->links() }} 
    </div>
</div>

@endsection

<style>
    .fa{
        color: darkblue;
    }
    .card{
        margin-bottom: 24px
    }
    .card img{
        margin: 1rem 0rem 0rem 1rem;
    }
    .form-inline{
        display: flex;
        width: 100%
    }
    .form-group {
        margin-right: 1rem;
        width: 100%
    }
</style>

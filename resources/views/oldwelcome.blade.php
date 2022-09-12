@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
       <h1>Ажлын байрны жагсаалт</h1>
       <search-job-component></search-job-component>
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
    </div>
    <div>
        <a href="{{ route('alljobs') }}">
            <button class="btn btn-success btn-lg" style="width: 100%">Бүх ажлын байрыг харах</button>
        </a>
        
    </div>
    <h1>Онцлох ажил олгогчид (Компани)</h1>
</div>
<div class="container">
    <div class="row">
        @foreach ( $companies as $company)
        <div class="col-md-3">
            <div class="card">

                @if (!empty(Auth::user()->company->logo)) 
                <img src="{{ asset('upload/logo') }}/{{ $company->logo }}" class="card-img-top" alt="..." width="80">
                @else
                <img src="{{asset('upload/logo/company_defualt.png')}}" width="80" alt=""> 
                @endif

                <div class="card-body">
                  <h5 class="card-title">{{ $company->cname }}</h5>
                  <p class="card-text">{{ Str::limit($company->description, 60) }}</p>
                  <a href="{{ route('company.index', [$company->id, $company->slug]) }}" class="btn btn-primary">Дэлгэрэнгүй мэдээлэл</a>
                </div>

              </div>
        </div>
        @endforeach
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
    .badge-success{
        background: rgb(56, 156, 56);
    }
    .card-footer a{
        color: rgb(0, 0, 0);
        text-decoration: none;
    }
</style>

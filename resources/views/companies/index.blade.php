@extends('layouts.master')
@section('content')
<div id="app">
    <div class="album text-muted">
        <div class="container">
            @if(Session::has('message'))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif
            @if(Session::has('error-message'))
                <div class="alert alert-danger">{{ Session::get('error-message') }}</div>
            @endif
            <div class="row" id="app">
                <div class="title" style="margin-top: 20px;">
                    <h2></h2>
                </div>

                @if(empty($company->cover_photo))
                <img src="{{ asset('assets/img/cover/ccover.png') }}" style="width: 100%" alt="cover_photo">
                @else
                <img src="{{ asset('upload/coverphoto') }}/{{ $company->cover_photo }}" style="width: 100%" alt="cover_photo">
                @endif

                <div class="col-lg-12">
                    <div class=" mb-8 bg-white">
                        <!-- icon-book mr-3-->
                        <h3 class="h5 text-black mb-3"><i class="fa fa-book" style="color: blue;">&nbsp;</i>Дэлгэрэнгүй мэдээлэл <a href="#" data-toggle="modal" data-target="#exampleModal1"><i class="fa fa-envelope-square" style="font-size: 34px;float:right;color:green;"></i></a></h3>
                    </div>
                    <div class="company-desc">
                        @if(empty($company->logo))
                        <img src="{{ asset('assets/img/avatar/man.jpg')}}" width="100" alt="">
                        @else
                        <img src="{{ asset('upload/logo') }}/{{ $company->logo }}" style="width: 15%" alt="logo">
                        @endif
                        
                        <p>{{ $company->description }}</p>
                        <p>{{ $company->cname }}</p>
                        <p><strong>Slogan</strong> {{ $company->slogan }}</p>
                        <p>{{ $company->address }}</p>
                        <p>{{ $company->phone }}</p>
                        <p>{{ $company->website }}</p>
                    </div>
                </div>
                <table class="table">
                    <tbody>
                        {{-- @for ($i = 0; $i<10; $i++) --}}
                        @foreach ($company->jobs as $job)
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
        </div>
    </div>
</div>
@endsection
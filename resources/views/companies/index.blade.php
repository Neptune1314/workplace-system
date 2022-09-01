@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="company-profile">
                @if(empty(Auth::User()->company->cover_photo))
                <img src="{{ asset('assets/img/cover/ccover.png') }}" style="width: 100%" alt="cover_photo">
                @else
                <img src="{{ asset('upload/coverphoto') }}/{{ Auth::User()->company->cover_photo }}" style="width: 100%" alt="cover_photo">
                @endif
                <div class="company-desc">
                    @if(empty(Auth::User()->company->logo))
                    <img src="{{ asset('assets/img/avatar/man.jpg')}}" width="100" alt="">
                    @else
                    <img src="{{ asset('upload/logo') }}/{{ Auth::User()->company->logo }}" style="width: 15%" alt="logo">
                    @endif
                    
                    <p>{{ $company->description }}</p>
                    <p>{{ $company->cname }}</p>
                    <p><strong>Slogan</strong> {{ $company->slogan }}</p>
                    <p>{{ $company->address }}</p>
                    <p>{{ $company->phone }}</p>
                    <p>{{ $company->website }}</p>
                </div>
            </div>
        </div>
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
@endsection

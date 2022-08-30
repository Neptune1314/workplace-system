@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="company-profile">
                <img src="{{ asset('assets/cover/ccover.png') }}" style="width: 100%" alt="">
                <div class="company-desc">
                    <img src="{{ asset('assets/avatar/man.jpg')}}" width="100" alt="">
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
                        <img src="{{ asset('assets/avatar/man.jpg')}}" width="80" alt="">
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

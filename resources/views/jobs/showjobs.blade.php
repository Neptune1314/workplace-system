@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Компанийн үүсгэсэн ажлын байрны зарууд</div>
                    <div class="card-body">
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
                                        <button class="btn btn-success">Харах</button></a>
                                        
                                        <a href="{{ route('jobs.edit', [$job->id, $job->slug]) }}">
                                            <button class="btn btn-primary">Засах</button></a>
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
    </div>
@endsection
<style>
    .card-body a{
        text-decoration: none;
    }
    .card-body button {
        margin-bottom: .5rem
    }
</style>

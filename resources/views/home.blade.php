@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @foreach ($jobs as $job)
            <div class="card">
                <div class="card-header">{{ $job->title}}</div>
                <small style="width:200px; padding:.4rem" class="badge badge-primary">{{ $job->position }}
                </small>
                <div class="card-body">
                    {{ $job->description }}
                </div>
                <div class="card-footer">
                    <span class="btn btn-primary">
                        <a href="{{ route('jobs.show', [$job->id, $job->slug]) }}">Дэлгэрэнгүй</a>
                    </span>
                    <span class="float-right">Ажлын байрны зарлагдсан дуусах огноо: {{ $job->last_date }}</span>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</div>
@endsection
<style>
    .float-right {
        float: right;
    }
    .badge-primary{
        background: rgb(56, 156, 56);
    }
    .card-footer a{
        color: rgb(255, 255, 255);
        text-decoration: none;
    }
    .card-footer a:hover{
        color: #fff
    }
    .btn:hover {
        background: rgb(56, 156, 56) !important;
    }
</style>

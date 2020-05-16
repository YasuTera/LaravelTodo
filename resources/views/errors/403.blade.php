@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-offset-3 col-md-6">
                <div class="text-center">
                    <p>お探しのページへのアクセス権限がありません</p>
                    <a href="{{ route('home') }}" class="btn">
                        Home
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
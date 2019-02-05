@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="" action="{{URL::to('/store')}}" method="POST">
                        <input type="text" name="name" value=""><br>
                        <input type="email" name="email" value=""><br>
                        <input type="password" name="password" value=""><br>
                        <input type="hidden" name="_token" value="{{csrf_token()}}"><br>
                        <button type="submit" name="button">Register</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

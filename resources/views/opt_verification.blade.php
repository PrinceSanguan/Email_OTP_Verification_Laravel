@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3 class="mt-5 text-center text-warning" style="font-weight: bold;">Email Verification</h3>
          
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
            @endif
            @if(session()->has('invalid'))
            <div class="alert alert-success">
                {{ session()->get('invalid') }}
            </div>
            @endif
            <br />
            @if(session()->has('incorrect'))
            <div class="alert alert-success">
                {{ session()->get('incorrect') }}
            </div>
            @endif
            <!-- Modal -->
            <form action="{{ route('verifyotp')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Enter OTP</label>
                    <input type="number" name="token" class="form-control" placeholder="Enter token  ">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
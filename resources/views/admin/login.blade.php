@extends('admin.layout.app')
@section('content')
<div class="card bg-transparent border-0">
    <h5 class="card-header text-center">{{__('main.login.Name')}}</h5>
    <div class="card-body">
      <div class="d-flex align-items-center justify-content-center h-px-500">
        <form class="w-px-500 border rounded p-3 p-md-5" action="{{route('login-save')}}" method="POST">
          @csrf
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label" for="form-alignment-username">{{__('main.login.Email')}}</label>
            <div class="col-sm-9">
              <input type="email"  name="email" class="form-control" placeholder="john.doe" />
            </div>
          </div>
          <div class="row mb-3 form-password-toggle">
            <label class="col-sm-3 col-form-label" >{{__('main.login.Password')}}</label>
            <div class="col-sm-9">
              <div class="input-group input-group-merge">
                <input type="password" name="password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="form-alignment-password2" />
                <span class="input-group-text cursor-pointer" id="form-alignment-password2"><i class="bx bx-hide"></i></span>
              </div>
            </div>
          </div>
          <div class="d-grid">
            <input type="submit" class="btn btn-primary" value="{{__('main.login.Name')}}">
          </div>
        </form>
      </div>
    </div>
</div>
@endsection
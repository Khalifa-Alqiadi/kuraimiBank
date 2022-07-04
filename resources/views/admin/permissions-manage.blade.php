@extends('admin.layout.app')
@section('content')
@push('scripts_after')
  @include('script.control')
@endpush
    <x-table>
      <x-slot name="titleName">
        <div class="success"></div>
              {{__('main.permissions.Manage')}}
              @if(session('success'))
                  <x-alert>
                      <div class="show-success fs-4">{{session('success')}}</div>
                  </x-alert>
              @endif
      </x-slot> 
      <x-slot name="button">
        <button type="button" class="btn btn-primary me-sm-3 me-1 mt-3" data-bs-toggle="modal" data-bs-target="#RoleAdd"> {{__('main.Add')}} </button>
      </x-slot>  
      <x-slot name="tableThead">
          <tr>
            <td>{{__('main.Name')}}</td>
          </tr>
      </x-slot>  
      <x-slot name="tableTbody">
        <tbody class="table-border-bottom-0">
          @foreach ($roles as $role)
            <tr>
              <td>{{$role->name}}</td>
            </tr>
            <div class="modal fade" id="RoleAdd" tabindex="-1" aria-hidden="true">
              <x-model>
                  <x-slot name="titleModel">{{__('main.roles.Add_Role')}}</x-slot>
                  <x-slot name="model">
                      <form action="add-role" method="POST" id="permission-active" class="row g-3">
                        @csrf
                          <div class="col-md-12">
                            <input type="text" name="rolename" class="form-control" placeholder="{{__('main.roles.placeholder')}}">
                          </div>
                          @foreach (__('main.rolesAdd') as $keyRole => $name)
                            <div class="col-md-6">
                              <h4  class="grey my-3">{{$name}}</h4>
                              @foreach (__('main.operations') as $key => $item)
                                @foreach ($permissions as $permission)      
                                  @if ($key.'_'.$keyRole == $permission->name)
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <label for="">
                                            <input type="checkbox" name="permission[]" id="" value="{{$permission->name}}"> {{$item}} {{$name}}
                                          </label>
                                        </div>
                                      </div>
                                    </div>
                                  @endif
                                @endforeach                    
                              @endforeach
                            </div>
                          @endforeach                                  
                          <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1 mt-3">{{__('main.Submit')}}</button>
                            <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">{{__('main.Cancel')}}</button>
                          </div>
                      </form>
                  </x-slot>
              </x-model>
            </div>
          @endforeach
        </tbody>
      </x-slot> 
    </x-table>



@endsection
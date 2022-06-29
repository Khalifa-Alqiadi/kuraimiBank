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
      </x-slot>  
      <x-slot name="tableThead">
          <tr>
            <td>{{__('main.Name')}}</td>
            <td>{{__('main.Status')}}</td>
          </tr>
      </x-slot>  
      <x-slot name="tableTbody">
        <tbody class="table-border-bottom-0">
          @foreach ($permissions as $permission)
              <tr>
                <td>{{$permission->name}}</td>
                @if ($permission->is_active == 0)
                    <td><button type="button"  onclick="PermissionActive({{$permission->id}})"  class="badge -active border-0 bg-label-primary me-1" data-bs-toggle="modal" data-bs-target="#PermissionsActive">{{__('main.No_Active')}}</button></td>
                @else
                    <td><button type="button"  onclick="PermissionActive({{$permission->id}})"  class="badge -active border-0 bg-label-primary me-1" data-bs-toggle="modal" data-bs-target="#PermissionsActive">{{__('main.Active')}}</button></td>
                @endif
              </tr>
          @endforeach
        </tbody>
      </x-slot> 
    </x-table>

<div class="modal fade" id="PermissionsActive" tabindex="-1" aria-hidden="true">
  <x-model>
      <x-slot name="titleModel">{{__('main.Status_Edit')}}</x-slot>
      <x-slot name="model">
          <form action="permission-active" method="POST" id="permission-active" class="row g-3">
            @csrf
            <input type="hidden" name="permission_id" id="permission_id">
              <div class="col-12">
                <h1>{{__('main.Delete_Row')}}</h1>
              </div>
              <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary me-sm-3 me-1 mt-3">{{__('main.Submit')}}</button>
                <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">{{__('main.Cancel')}}</button>
              </div>
          </form>
      </x-slot>
  </x-model>
</div>
@endsection
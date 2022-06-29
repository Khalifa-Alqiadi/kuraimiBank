@extends('admin.layout.app')
@section('content')
@push('scripts_after')
      @include('script.control')
  @endpush
    <x-table>
      <x-slot name="titleName">
        <div class="success"></div>
              {{__('users.User_Title')}}
      </x-slot> 
      <x-slot name="button">
      </x-slot>  
      <x-slot name="tableThead">
          <tr>
            <td>{{__('main.Image')}}</td>
            <th>{{__('users.First_Name')}}</th>
            <th>{{__('users.Last_Name')}}</th>
            <th>{{__('users.Email')}}</th>
            <th>{{__('main.Status')}}</th>
            
            <th>{{__('users.Permissions')}}</th>
            <th>{{__('users.Phone')}}</th>
            <th>{{__('users.Gender')}}</th>
            <th>{{__('users.Address')}}</th>
          </tr>
      </x-slot>  
      <x-slot name="tableTbody">
        <tbody class="table-border-bottom-0">
          @foreach ($users as $user)
              <tr>
                <td>
                  <img src="{{asset('images/'. $user->image)}}" alt="">
                </td>
                <td>{{$user->first_name}}</td>
                <td>{{$user->last_name}}</td>
                <td>{{$user->email}}</td>
                @if ($user->is_active == 0)
                  <td><button type="button"  onclick="ServicesActive({{$user->id}})" value="" class="badge -active border-0 bg-label-primary me-1" data-bs-toggle="modal" data-bs-target="#ServicesActive">{{__('main.No_Active')}}</button></td>
                @else
                  <td><button type="button"  onclick="ServicesActive({{$user->id}})" value="" class="badge -active border-0 bg-label-primary me-1" data-bs-toggle="modal" data-bs-target="#ServicesActive">{{__('main.Active')}}</button></td>
                @endif
                <td>
                  <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                      <div class="dropdown-menu">
                          <ul class="pe-0">
                            @foreach ($user->AllPermissions() as $permisseion)
                                <li>{{$permisseion->name}}  <button type="button" id="deletePermission" value="{{$permisseion->name}}" onclick="DeletePermission({{$user->id}})" class="btn ms-3" data-bs-toggle="modal" data-bs-target="#deletePeimission">{{__('main.Delete')}}</button></li>
                            @endforeach
                          </ul>
                          <button type="button" class="btn dropdown-item" data-bs-toggle="modal" data-bs-target="#editPeimission"><i class="bx bx-edit-alt me-2" ></i> {{__('main.Edit')}}</button>
                      </div>
                  </div>
              </td>
              <td>{{$user->phone}}</td>
              <td>
                @if ($user->gender == 1)
                    {{'male'}}
                @else
                    {{'famle'}}
                @endif
              </td>
              <td>{{$user->address}}</td>
              </tr>
              <div class="modal fade" id="editPeimission" tabindex="-1" aria-hidden="true">
                <x-model>
                    <x-slot name="titleModel">{{__('users.Edit_Perimission')}}</x-slot>
                    <x-slot name="model">
                        <form action="edit-permission" method="POST" class="row g-3" >
                          @csrf
                            <input type="hidden" name="userid" value="{{$user->id}}">
                            <input type="hidden" name="name" value="{{$user->first_name}}">
                            <div class="row">
                              
                              @foreach ($perimission as $perimi)
                                <div class="form-group">
                                  <label for="">
                                    <input type="checkbox" name="permission[]" id="" value="{{$perimi->name}}" {{$user->hasPermission($perimi->name) ? 'checked' : ''}}> {{$perimi->name}}
                                  </label>
                                </div>
                              {{-- @endforeach --}}
                              @endforeach
                            </div>
                            <div class="col-12 text-center">
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

<div class="modal fade" id="userStatus" tabindex="-1" aria-hidden="true">
  <x-model>
      <x-slot name="titleModel">{{__('main.Status_Edit')}}</x-slot>
      <x-slot name="model">
          <form id="addNewCCForm" class="row g-3" onsubmit="return false">
              <div class="col-12">
                <h1>{{__('main.Sure_Messagew')}}</h1>
              </div>
              <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary me-sm-3 me-1 mt-3">{{__('main.Submit')}}</button>
                <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">{{__('main.Cancel')}}</button>
              </div>
          </form>
      </x-slot>
  </x-model>
</div>

<div class="modal fade" id="deletePeimission" tabindex="-1" aria-hidden="true">
  <x-model>
      <x-slot name="titleModel">{{__('users.Edit_Perimission')}}</x-slot>
      <x-slot name="model">
          <form action="delete-permission" method="POST" class="row g-3" >
            @csrf
              <input type="text" id="delete_userid" name="delete_userid" >
              <input type="text" id="delete_permission" name="delete_permission">
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
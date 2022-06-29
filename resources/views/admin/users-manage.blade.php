@extends('admin.layout.app')
@section('content')
@push('scripts_after')
  @include('script.control')
@endpush
@php
    $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
@endphp
@if ($do == 'Manage')
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
            
            @permission('manage_website')
              <th>{{__('users.Permissions')}}</th>
            @endpermission
            <th>{{__('users.Phone')}}</th>
            <th>{{__('users.Gender')}}</th>
            <th>{{__('users.Address')}}</th>
            <th>{{__('main.Actions')}}</th>
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
                @if (Auth::user()->hasPermission('manage_website'))
                  @if ($user->is_active == 0)
                    <td><button type="button"  onclick="ServicesActive({{$user->id}})" value="" class="badge -active border-0 bg-label-primary me-1" data-bs-toggle="modal" data-bs-target="#ServicesActive">{{__('main.No_Active')}}</button></td>
                  @else
                    <td><button type="button"  onclick="ServicesActive({{$user->id}})" value="" class="badge -active border-0 bg-label-primary me-1" data-bs-toggle="modal" data-bs-target="#ServicesActive">{{__('main.Active')}}</button></td>
                  @endif
                @else
                  @if ($user->is_active == 0)
                    <td><button type="button" class="badge -active border-0  text-danger me-1" data-bs-toggle="modal" data-bs-target="#NotAvalibale">{{__('main.No_Active')}}</button></td>
                  @else
                    <td><button type="button" class="badge -active border-0 text-danger me-1" data-bs-toggle="modal" data-bs-target="#NotAvalibale">{{__('main.Active')}}</button></td>
                  @endif
                @endif
                @if (Auth::user()->hasPermission('manage_website'))
                    
                
                <td>
                  <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                      <div class="dropdown-menu">
                          <ul class="pe-0">
                            @foreach ($user->AllPermissions() as $permisseion)
                                <li>{{$permisseion->name}}  <button type="button" id="deletePermission" value="{{$permisseion->name}}" onclick="DeletePermissions({{$user->id}}, {{$permisseion->id}})" class="btn ms-3" data-bs-toggle="modal" data-bs-target="#delete_Peimission">{{__('main.Delete')}}</button></li>
                            @endforeach
                          </ul>
                          <button type="button" class="btn dropdown-item" data-bs-toggle="modal" data-bs-target="#editPeimission{{$user->id}}"><i class="bx bx-edit-alt me-2" ></i> {{__('main.Edit')}}</button>
                      </div>
                  </div>
                </td>
                @endif
              <td>{{$user->phone}}</td>
              <td>
                @if ($user->gender == 1)
                    {{'male'}}
                @else
                    {{'famle'}}
                @endif
              </td>
              <td>{{$user->address}}</td>
              <td>
                @if (Auth::user()->hasPermission('admin_edit_user') && Auth::id() == $user->id)
                  {{-- @if (Auth::id() == $user->id) --}}
                  <a href="usersAdminManage?do=Edit&userid={{$user->id}}" class="btn dropdown-item"><i class="bx bx-edit-alt me-2" ></i> {{__('main.Edit')}}</a>
                  {{-- @else
                  <div class="text-danger">{{__('main.Unavailable')}}</div>
                  @endif --}}
                
                @else
                    <div class="text-danger">{{__('main.Unavailable')}}</div>
                @endif
                
              </td>
              <div class="modal fade" id="editPeimission{{$user->id}}" tabindex="-1" aria-hidden="true">
                <x-model>
                    <x-slot name="titleModel">{{__('users.Edit_Perimission')}}</x-slot>
                    <x-slot name="model">
                        <form action="edit-permission" method="POST" class="row g-3" >
                          @csrf
                            <input type="text" name="userid" value="{{$user->id}}">
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
              </tr>
              
              
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

<div class="modal fade" id="delete_Peimission" tabindex="-1" aria-hidden="true">
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
<div class="modal fade" id="NotAvalibale" tabindex="-1" aria-hidden="true">
  <x-model>
      <x-slot name="titleModel">{{__('main.Status_Edit')}}</x-slot>
      <x-slot name="model">
        <div class="col-12">
          <h1 class="text-color">{{__('main.Unavailable')}}</h1>
        </div>
      </x-slot>
  </x-model>
</div>
@elseif ($do == 'Edit')
@php
    $userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;
@endphp
@if (Auth::user()->hasPermission('admin_edit_user') && Auth::id() == $userid)
        <x-row>
            <x-slot name="title">{{__('users.Edit')}}</x-slot>
            <x-slot name="form">
                
                @foreach ($users as $user)
                    @if ($user->id == $userid)
                        <form action="update_our_partaner" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <input type="hidden" name="userid" id="userid" value="{{$userid}}">
                                    <label class="form-label">{{__('users.First_Name')}}</label>
                                    <input type="text" id="firstnsme" name="firstnsme" value="{{$user->first_name}}" class="form-control" id="basic-default-fullname" placeholder="John Doe" />
                                    @error('firstnsme')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">{{__('users.Last_Name')}}</label>
                                    <input type="text" id="lastname" name="lastname" value="{{$user->last_name}}" class="form-control" placeholder="" />
                                    @error('lastname')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">{{__('users.Email')}}</label>
                                    <input type="text" id="email" value="{{$user->email}}" name="email" class="form-control" placeholder="John Doe" />
                                    @error('email')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">{{__('users.Phone')}}</label>
                                    <input type="text" id="phone" name="phone" value="{{$user->phone}}" class="form-control" placeholder="" />
                                    @error('phone')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">{{__('users.Phone')}}</label>
                                    <input type="text" id="address" name="address" value="{{$user->address}}" class="form-control" placeholder="" />
                                    @error('address')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="basic-default-fullname">{{__('main.Image')}}</label>
                                    <input type="file" id="image_new" name="image_new" class="form-control" placeholder="" />
                                    <input type="hidden" id="image" name="image" value="{{$user->image}}" class="form-control" placeholder="" />
                                    @error('image')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <button type="submit" class="btn menu-theme text-white">Send</button>
                        </form>
                    @endif
                @endforeach
            </x-slot>
        </x-row> 
    @else
        <script type="text/javascript">
            window.location = `{{ url('/homeAdmin') }}`//here double curly bracket
        </script> 
    @endif
@endif
@endsection
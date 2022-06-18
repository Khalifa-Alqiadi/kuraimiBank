@extends('admin.layout.app')
@section('content')
    <x-table>
      <x-slot name="titleName">
              {{__('users.User_Title')}}
      </x-slot>  
      <x-slot name="tableThead">
          <tr>
            <td>{{__('main.Image')}}</td>
            <th>{{__('users.First_Name')}}</th>
            <th>{{__('users.Last_Name')}}</th>
            <th>{{__('users.Email')}}</th>
            <th>{{__('users.Phone')}}</th>
            <td>{{__('users.Gender')}}</td>
            <td>{{__('users.Address')}}</td>
          </tr>
      </x-slot>  
      <x-slot name="tableTbody">
          <tr>
            <td>
              <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
                <img src="../../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle">
              </li>
            </td>
              <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular Project</strong></td>
              <td>Albert Cook</td>
              <td>Albert Cook</td>
              <td>Albert Cook</td>
              <td>Albert Cook</td>
              
              <td><span class="badge btn bg-label-primary me-1" data-bs-toggle="modal" data-bs-target="#userStatus">Active</span></td>
              
          </tr>
          <tr>
            <td>
              <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
                <img src="../../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle">
              </li>
            </td>
              <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular Project</strong></td>
              <td>Albert Cook</td>
              <td>Albert Cook</td>
              <td>Albert Cook</td>
              <td>Albert Cook</td>
              
              <td><span class="badge btn bg-label-primary me-1" data-bs-toggle="modal" data-bs-target="#userStatus">Active</span></td>
              
          </tr>
          <tr>
            <td>
              <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
                <img src="../../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle">
              </li>
            </td>
              <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular Project</strong></td>
              <td>Albert Cook</td>
              <td>Albert Cook</td>
              <td>Albert Cook</td>
              <td>Albert Cook</td>
              
              <td><span class="badge btn bg-label-primary me-1" data-bs-toggle="modal" data-bs-target="#userStatus">Active</span></td>
              
          </tr>
          <tr>
            <td>
              <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
                <img src="../../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle">
              </li>
            </td>
              <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular Project</strong></td>
              <td>Albert Cook</td>
              <td>Albert Cook</td>
              <td>Albert Cook</td>
              <td>Albert Cook</td>
              
              <td><span class="badge btn bg-label-primary me-1" data-bs-toggle="modal" data-bs-target="#userStatus">Active</span></td>
              
          </tr>
          <tr>
            <td>
              <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
                <img src="../../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle">
              </li>
            </td>
              <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular Project</strong></td>
              <td>Albert Cook</td>
              <td>Albert Cook</td>
              <td>Albert Cook</td>
              <td>Albert Cook</td>
              
              <td><span class="badge btn bg-label-primary me-1" data-bs-toggle="modal" data-bs-target="#userStatus">Active</span></td>
              
          </tr>
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
@endsection
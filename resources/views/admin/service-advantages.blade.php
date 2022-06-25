@extends('admin.layout.app')
@section('content')

@php
    $servcieId = $service_id;
    $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
    $serviceid = isset($_GET['serviceid']) && is_numeric($_GET['serviceid']) ? intval($_GET['serviceid']) : 0;
@endphp
@if ($do == 'Manage')


@push('scripts_after')
    @include('script.service-advantage-edit')
@endpush

<x-table>
    <x-slot name="titleName">
            {{__('main.advantages.Manage')}}
    </x-slot>  
    <x-slot name="button">
        <a href="service-advantage?do=Add&serviceid={{$service_id}}" class="btn btn-primary me-sm-3 me-1 mt-3" > {{__('main.Add')}} </a>
    </x-slot>  
    <x-slot name="tableThead">
        <tr>
            <th>{{__('main.Name')}}</th>
            <th>{{__('main.advantages.Image')}}</th>
            <th>{{__('main.Status')}}</th>
            <th>{{__('main.Actions')}}</th>
        </tr>
    </x-slot>  
    
    
    <x-slot name="tableTbody" >
        <tbody class="table-border-bottom-0 services-list">
            @foreach ($serviceAdv as $adv)
                <tr>
                    <td>{{$adv->name}}</td>
                    <td class="avatar">
                        <img src="{{URL::asset('images/'. $adv->image)}}" alt="Avatar" class="rounded-circle">
                    </td>
                    @if ($adv->is_active == 0)
                        <td><button type="button" onclick="AdvantageActive({{$adv->id}})" value="" class="badge -active border-0 bg-label-primary me-1" data-bs-toggle="modal" data-bs-target="#AdvantageActive">{{__('main.No_Active')}}</button></td>
                    @else
                        <td><button type="button" onclick="AdvantageActive({{$adv->id}})" value="" class="badge -active border-0 bg-label-primary me-1" data-bs-toggle="modal" data-bs-target="#AdvantageActive">{{__('main.Active')}}</button></td>  
                    @endif
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                            <div class="dropdown-menu">
                                <a href="?do=Edit&advId={{$adv->id}}" type="submit" id="edit_adv" onclick="serviceAdvEdit({{$adv->id}})" class="btn "> {{__('main.Edit')}} </a>
                                <button type="button" id="delete_city" onclick="AdvantageDeleted({{$adv->id}})" class="btn " data-bs-toggle="modal" data-bs-target="#AdvantageDeleted">  <i class="bx bx-trash me-2"></i> {{__('main.Delete')}}</button>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-slot>
</x-table>
<div class="modal fade" id="AdvantageActive" tabindex="-1" aria-hidden="true">
    <x-model>
        <x-slot name="titleModel">{{__('main.Status_Edit')}}</x-slot>
        <x-slot name="model">
            <form action="{{route('serviceAdvantageActive')}}" method="post">
                <input type="hidden" id="serviceid" name="serviceid" value="{{$service_id}}">
                <input type="hidden" id="adv_active_id" name="adv_active_id" value="">
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
<div class="modal fade" id="AdvantageDeleted" tabindex="-1" aria-hidden="true">
    <x-model>
        <x-slot name="titleModel">{{__('main.Delete')}}</x-slot>
        <x-slot name="model">
            <form action="{{route('serviceAdvantageDelete')}}" method="post">
                <input type="hidden" id="serviceid" name="serviceid" value="{{$service_id}}">
                <input type="hidden" id="adv_delete_id" name="adv_delete_id" value="">
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
@elseif($do == 'Add')
<div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">{{__('main.advantages.Add_Advantage')}}</h5>
        </div>
        <div class="card-body">
            @php
                $serviceid = isset($_GET['serviceid']) && is_numeric($_GET['serviceid']) ? intval($_GET['serviceid']) : 0;
            @endphp
            <form action="{{route('add_service_advantage')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <input type="hidden" name="service_id" value="{{$serviceid}}">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">{{__('main.Name')}} (Arabic)</label>
                        <input type="text" id="name_ar" name="name_ar" class="form-control" id="basic-default-fullname" placeholder="John Doe" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">{{__('main.Name')}} (English)</label>
                        <input type="text" id="name_en" name="name_en" class="form-control" placeholder="" />
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label">{{__('main.advantages.Image')}}</label>
                        <input type="file" id="image" name="image" class="form-control" placeholder="" />
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
      </div>
    </div>
</div>
@elseif($do == 'Edit')

<div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">{{__('main.advantages.Edit_advantage')}}</h5>
        </div>
        <div class="card-body">
            @php
                $advId = isset($_GET['advId']) && is_numeric($_GET['advId']) ? intval($_GET['advId']) : 0;
            @endphp
            @foreach($serviceAdv as $adv)
            @if($adv->id == $advId)
                <form action="{{route('update_service_advantage')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <input type="text" name="serviceid" id="serviceid" value="{{$service_id}}">
                        <input type="text" name="adv_edit_id" id="adv_edit_id" value="{{$advId}}">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">{{__('main.Name')}} (Arabic)</label>
                            <input type="text" id="name_edit_ar" name="name_ar" value="{{$adv->getTranslation('name', 'ar')}}" class="form-control" id="basic-default-fullname" placeholder="John Doe" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">{{__('main.Name')}} (English)</label>
                            <input type="text" id="name_edit_en" name="name_en" value="{{$adv->getTranslation('name', 'en')}}" class="form-control" placeholder="" />
                        </div>
                        <div class="mb-3 col-md-12">
                            <label class="form-label">{{__('main.advantages.Image')}}</label>
                            <input type="file" id="image_edit" name="image" class="form-control" placeholder="" />
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
            @endif
            @endforeach
        </div>
      </div>
    </div>
</div>
@endif

@endsection
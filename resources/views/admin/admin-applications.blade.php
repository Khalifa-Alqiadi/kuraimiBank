@extends('admin.layout.app')
@section('content')
@php
    $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
@endphp
@if ($do == 'Manage')
    @push('scripts_after')
        @include('script.control')
    @endpush
    @if(session('success'))
        <x-alert>
            <div class="show-success fs-4">{{session('success')}}</div>
        </x-alert>
    @endif
    <x-table>
        <x-slot name="titleName">
                {{__('main.applications.Name')}}      
        </x-slot>  
        <x-slot name="button">
            <a href="admin-applications?do=Add" class="btn menu-theme text-white me-sm-3 me-1 mt-3" > {{__('main.Add')}} </a>
        </x-slot>  
        <x-slot name="tableThead">
            <tr>
                <th>{{__('main.Name')}}</th>
                <th>{{__('main.applications.Play_link')}}</th>
                <th>{{__('main.applications.Store_link')}}</th>
                <th>{{__('main.Status')}}</th>
                <th>{{__('main.Actions')}}</th>
            </tr>
        </x-slot>  
        
        
        <x-slot name="tableTbody" >
            <tbody class="table-border-bottom-0 services-list">
                @foreach ($applications as $application)
                    <tr>
                        <td><a href="admin-applications?do=Edit&applicationid={{$application->id}}" id="application_id">{{$application->name}}</a></td>
                        <td>{{$application->play_link}}</td>
                        <td>{{$application->store_link}}</td>
                        @if ($application->is_active == 0)
                            <td><button type="button"  onclick="ApplicationsActive({{$application->id}})" value="" class="badge -active border-0 bg-label-primary me-1" data-bs-toggle="modal" data-bs-target="#ApplicationsActive">{{__('main.No_Active')}}</button></td>
                        @else
                            <td><button type="button" onclick="ApplicationsActive({{$application->id}})" value="" class="badge -active border-0 bg-label-primary me-1" data-bs-toggle="modal" data-bs-target="#ApplicationsActive">{{__('main.Active')}}</button></td>  
                        @endif
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                <div class="dropdown-menu">
                                    <button type="button" class="btn" onclick="delete_application({{$application->id}})" data-bs-toggle="modal" data-bs-target="#ApplicationsDelete">  <i class="bx bx-trash me-2" ></i> {{__('main.Delete')}}</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </x-slot>
    </x-table>
    <div class="modal fade" id="ApplicationsActive" tabindex="-1" aria-hidden="true">
        <x-model>
            <x-slot name="titleModel">{{__('main.Status_Edit')}}</x-slot>
            <x-slot name="model">
                <form action="applicationActive" method="post">
                    @csrf
                    <input type="hidden" id="application_active_id" name="application_active_id" value="">
                    <div class="col-12">
                    <h1>{{__('main.Delete_Row')}}</h1>
                    </div>
                    <div class="col-12 text-center">
                    <button type="submit" class="btn menu-theme text-white me-sm-3 me-1 mt-3">{{__('main.Submit')}}</button>
                    <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">{{__('main.Cancel')}}</button>
                    </div>
                </form>
            </x-slot>
        </x-model>
    </div>
    <div class="modal fade" id="ApplicationsDelete" tabindex="-1" aria-hidden="true">
        <x-model>
            <x-slot name="titleModel">{{__('main.Delete')}}</x-slot>
            <x-slot name="model">
                <form action="applicationDelete" method="post">
                    @csrf
                    <input type="hidden" id="application_delete_id" name="application_delete_id" value="">
                    <div class="col-12">
                    <h1>{{__('main.Delete_Row')}}</h1>
                    </div>
                    <div class="col-12 text-center">
                    <button type="submit" class="btn menu-theme text-white me-sm-3 me-1 mt-3">{{__('main.Submit')}}</button>
                    <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">{{__('main.Cancel')}}</button>
                    </div>
                </form>
            </x-slot>
        </x-model>
    </div>
@elseif($do == 'Add')
    @push('scripts_after')
        @include('script.applications')
        <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
        <script type="text/javascript">
            CKEDITOR.replace('application_info_ar');
            CKEDITOR.replace('application_info_en');
        </script>
        {{-- @include('script.services') --}}
    @endpush
    <x-row>
        <x-slot name="title">{{__('main.Add')}}</x-slot>
        <x-slot name="form">
            <form action="add_application" method="post">
                @csrf
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">{{__('main.Name')}} (Arabic)</label>
                        <input type="text" id="application_name_ar" name="name_ar" value="{{old('name_ar')}}" class="form-control" id="basic-default-fullname" placeholder="John Doe" />
                        @error('name_ar')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">{{__('main.Name')}} (English)</label>
                        <input type="text" id="application_name_en" name="name_en" value="{{old('name_en')}}" class="form-control" placeholder="" />
                        @error('name_en')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">{{__('main.applications.Play_link')}}</label>
                        <input type="text" id="" name="play_link" value="{{old('play_link')}}" class="form-control" placeholder="" />
                        @error('play_link')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">{{__('main.applications.Store_link')}}</label>
                        <input type="text" id="" name="store_link" value="{{old('store_link')}}" class="form-control" placeholder="" />
                        @error('store_link')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label class="form-label" for="basic-default-fullname">{{__('main.applications.Info')}} (Arabic)</label>
                        <textarea id="application_info_ar" name="application_info_ar" value="{{old('application_info_ar')}}" class="ckeditor form-control"></textarea>
                        @error('application_info_ar')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label" for="basic-default-fullname">{{__('main.applications.Info')}} (English)</label>
                        <textarea id="application_info_en" name="application_info_en" value="{{old('application_info_en')}}" class="ckeditor form-control"></textarea>
                        @error('application_info_en')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                
                <button type="submit" class="btn menu-theme text-white">Send</button>
            </form>
        </x-slot>
    </x-row>
@elseif($do == 'Edit')
    @push('scripts_after')
        @include('script.applications')
        <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
        <script type="text/javascript">
            CKEDITOR.replace('application_info_edit_ar');
            CKEDITOR.replace('application_info_edit_en');
        </script>
    @endpush
    <x-row>
        <x-slot name="title">{{__('main.Edit')}}</x-slot>
        <x-slot name="form">
            @php
                $applicationid = isset($_GET['applicationid']) && is_numeric($_GET['applicationid']) ? intval($_GET['applicationid']) : 0;
            @endphp
            <form action="update_application" method="post">
                @csrf
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <input type="hidden" name="applicationid" id="applicationid" value="{{$applicationid}}">
                        <label class="form-label">{{__('main.Name')}} (Arabic)</label>
                        <input type="text" id="application_name_edit_ar" name="name_ar" class="form-control" id="basic-default-fullname" placeholder="John Doe" />
                        @error('name_ar')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">{{__('main.Name')}} (English)</label>
                        <input type="text" id="application_name_edit_en" name="name_en" class="form-control" placeholder="" />
                        @error('name_en')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">{{__('main.applications.Play_link')}}</label>
                        <input type="text" id="application_play_link_edit" name="play_link" class="form-control" placeholder="" />
                        @error('play_link')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">{{__('main.applications.Store_link')}}</label>
                        <input type="text" id="application_store_link_edit" name="store_link" class="form-control" placeholder="" />
                        @error('store_link')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label class="form-label" for="basic-default-fullname">{{__('main.applications.Info')}} (Arabic)</label>
                        <textarea id="application_info_edit_ar" name="application_info_ar" class="ckeditor form-control"></textarea>
                        @error('application_info_ar')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label" for="basic-default-fullname">{{__('main.applications.Info')}} (English)</label>
                        <textarea id="application_info_edit_en" name="application_info_en" class="ckeditor form-control"></textarea>
                        @error('application_info_en')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                
                <button type="submit" class="btn menu-theme text-white">Send</button>
            </form>
        </x-slot>
    </x-row>
@endif
@endsection

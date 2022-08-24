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
                {{__('main.services.Manage')}}
                
        </x-slot>  
        <x-slot name="button">
            
            {{-- <button type="button" class="btn btn-primary me-sm-3 me-1 mt-3" data-bs-toggle="modal" data-bs-target="#ServicesAdd"> {{__('main.Add')}} </button> --}}
            <a href="Show-Services?do=Add" class="btn menu-theme text-white me-sm-3 me-1 mt-3" > {{__('main.Add')}} </a>
        </x-slot>  
        <x-slot name="tableThead">
            <tr>
                <th>{{__('main.Name')}}</th>
                <th>{{__('main.advantages.Name')}}</th>
                <th>{{__('main.categories.Category_name')}}</th>
                <th>{{__('main.Status')}}</th>
                <th>{{__('main.Actions')}}</th>
            </tr>
        </x-slot>  
        
        
        <x-slot name="tableTbody" >
            <tbody class="table-border-bottom-0 services-list">
                @foreach ($services as $service)
                    <tr>
                        <td><a href="Show-Services?do=Edit&serviceid={{$service->id}}" id="service_id">{{$service->name}}</a></td>
                        <td><a href="service-advantage/{{$service->id}}">{{__('main.advantages.Service_Advantages')}}</a></td>
                        <td>{{$service->category->name}}</td>
                        @if ($service->is_active == 0)
                            <td><button type="button"  onclick="ServicesActive({{$service->id}})" value="" class="badge -active border-0 bg-label-primary me-1" data-bs-toggle="modal" data-bs-target="#ServicesActive">{{__('main.No_Active')}}</button></td>
                        @else
                            <td><button type="button" onclick="ServicesActive({{$service->id}})" value="" class="badge -active border-0 bg-label-primary me-1" data-bs-toggle="modal" data-bs-target="#ServicesActive">{{__('main.Active')}}</button></td>  
                        @endif
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                <div class="dropdown-menu">
                                    <button type="button" class="btn" onclick="delete_service({{$service->id}})" data-bs-toggle="modal" data-bs-target="#ServicesDelete">  <i class="bx bx-trash me-2" ></i> {{__('main.Delete')}}</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </x-slot>
    </x-table>
    <div class="modal fade" id="ServicesActive" tabindex="-1" aria-hidden="true">
        <x-model>
            <x-slot name="titleModel">{{__('main.Status_Edit')}}</x-slot>
            <x-slot name="model">
                <form action="serviceActive" method="post">
                    @csrf
                    <input type="hidden" id="service_active_id" name="service_active_id" value="">
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
    <div class="modal fade" id="ServicesDelete" tabindex="-1" aria-hidden="true">
        <x-model>
            <x-slot name="titleModel">{{__('main.Delete')}}</x-slot>
            <x-slot name="model">
                <form action="serviceDelete" method="post">
                    @csrf
                    <input type="hidden" id="service_delete_id" name="service_delete_id" value="">
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
        @include('script.services')
        <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
        <script type="text/javascript">
            CKEDITOR.replace('service_info_ar');
            CKEDITOR.replace('service_info_en');
        </script>
        {{-- @include('script.services') --}}
    @endpush
    <x-row>
        <x-slot name="title">{{__('main.services.Add_services')}}</x-slot>
        <x-slot name="form">
            <form action="add_service" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">{{__('main.Name')}} (Arabic)</label>
                        <input type="text" id="service_name_ar" name="name_ar" value="{{old('name_ar')}}" class="form-control" id="basic-default-fullname" placeholder="John Doe" />
                        @error('name_ar')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">{{__('main.Name')}} (English)</label>
                        <input type="text" id="service_name_en" name="name_en" value="{{old('name_en')}}" class="form-control" placeholder="" />
                        @error('name_en')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">{{__('main.categories.Category_name')}}</label>
                        {{-- <input type="text" id="service_name_en" name="service_name_en" class="form-select" placeholder="" /> --}}
                        <select name="category_service" id="category_service" class="form-select">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @foreach ($categoriesChild as $child)
                                    @if ($child->parent_category == $category->id)
                                        <option value="{{$child->id}}">-----{{$child->name}}</option>
                                    @endif 
                                @endforeach
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">{{__('main.Image')}}</label>
                        <input type="file" id="service_name_en" name="background" class="form-control" placeholder="" />
                        @error('background')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label class="form-label" for="basic-default-fullname">{{__('main.services.Service_Info')}} (Arabic)</label>
                        <textarea id="service_info_ar" name="service_info_ar" class="ckeditor form-control" value="{{old('service_info_ar')}}"></textarea>
                        @error('service_info_ar')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label" for="basic-default-fullname">{{__('main.services.Service_Info')}} (English)</label>
                        <textarea id="service_info_en" name="service_info_en" class="ckeditor form-control" value="{{old('service_info_en')}}"></textarea>
                        @error('service_info_en')
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
        @include('script.services')
        <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
        <script type="text/javascript">
            CKEDITOR.replace('service_info_edit_ar');
            CKEDITOR.replace('service_info_edit_en');
        </script>
    @endpush
    <x-row>
        <x-slot name="title">{{__('main.services.Edit_services')}}</x-slot>
        <x-slot name="form">
            @php
                $serviceid = isset($_GET['serviceid']) && is_numeric($_GET['serviceid']) ? intval($_GET['serviceid']) : 0;
            @endphp
            <form action="update_service" method="post">
                @csrf
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <input type="hidden" name="serviceid" id="serviceid" value="{{$serviceid}}">
                        <label class="form-label">{{__('main.Name')}} (Arabic)</label>
                        <input type="text" id="service_name_edit_ar" name="name_ar" class="form-control" id="basic-default-fullname" placeholder="John Doe" />
                        @error('name_ar')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">{{__('main.Name')}} (English)</label>
                        <input type="text" id="service_name_edit_en" name="name_en" class="form-control" placeholder="" />
                        @error('name_en')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label">{{__('main.categories.Category_name')}}</label>
                        {{-- <input type="text" id="service_name_en" name="service_name_en" class="form-select" placeholder="" /> --}}
                        <select name="category_service" id="category_service" class="form-select">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @foreach ($categoriesChild as $child)
                                    @if ($child->parent_category == $category->id)
                                        <option value="{{$child->id}}">-----{{$child->name}}</option>
                                    @endif 
                                @endforeach
                                
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label class="form-label" for="basic-default-fullname">{{__('main.services.Service_Info')}} (Arabic)</label>
                        <textarea id="service_info_edit_ar" name="service_info_ar" class="ckeditor form-control"></textarea>
                        @error('service_info_ar')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label" for="basic-default-fullname">{{__('main.services.Service_Info')}} (English)</label>
                        <textarea id="service_info_edit_en" name="service_info_en" class="ckeditor form-control"></textarea>
                        @error('service_info_en')
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

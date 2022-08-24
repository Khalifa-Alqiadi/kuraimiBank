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
                {{__('main.successStories.Manage')}}
                
        </x-slot>  
        <x-slot name="button">
            <a href="?do=Add" class="btn menu-theme text-white me-sm-3 me-1 mt-3" > {{__('main.Add')}} </a>
        </x-slot>  
        <x-slot name="tableThead">
            <tr>
                <th>{{__('main.Name')}}</th>
                <th>{{__('main.successStories.MainImage')}}</th>
                <th>{{__('main.successStories.OntherImages')}}</th>
                <th>{{__('main.successStories.ServiceName')}}</th>
                <th>{{__('main.Status')}}</th>
                <th>{{__('main.Actions')}}</th>
            </tr>
        </x-slot>  
        
        
        <x-slot name="tableTbody" >
            <tbody class="table-border-bottom-0 services-list">
                @foreach ($successStories as $Stories)
                    <tr>
                        <td><a href="?do=Edit&storyid={{$Stories->id}}" id="">{{$Stories->title}}</a></td>
                        <td class="avatar">
                            <img src="{{asset('images/'. $Stories->background)}}" alt="Avatar" class="rounded-circle">
                        </td>
                        <td class="avatar">
                            <img src="{{asset('images/'. $Stories->background)}}" alt="Avatar" class="rounded-circle">
                        </td>
                        <td>{{$Stories->SuccessStory->name}}</td>
                        @if ($Stories->is_active == 0)
                            <td><button type="button"  onclick="SuccessStoriesActive({{$Stories->id}})" value="" class="badge -active border-0 bg-label-primary me-1" data-bs-toggle="modal" data-bs-target="#successStoriesActive">{{__('main.No_Active')}}</button></td>
                        @else
                            <td><button type="button" onclick="SuccessStoriesActive({{$Stories->id}})" value="" class="badge -active border-0 bg-label-primary me-1" data-bs-toggle="modal" data-bs-target="#successStoriesActive">{{__('main.Active')}}</button></td>  
                        @endif
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                <div class="dropdown-menu">
                                    <button type="button" class="btn" onclick="success_stories_service({{$Stories->id}})" data-bs-toggle="modal" data-bs-target="#SuccessStoriesDelete">  <i class="bx bx-trash me-2" ></i> {{__('main.Delete')}}</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </x-slot>
    </x-table>
    <div class="modal fade" id="successStoriesActive" tabindex="-1" aria-hidden="true">
        <x-model>
            <x-slot name="titleModel">{{__('main.Status_Edit')}}</x-slot>
            <x-slot name="model">
                <form action="successStoriesActive" method="post">
                    @csrf
                    <input type="hidden" id="stories_active_id" name="stories_active_id" value="">
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
    <div class="modal fade" id="SuccessStoriesDelete" tabindex="-1" aria-hidden="true">
        <x-model>
            <x-slot name="titleModel">{{__('main.Delete')}}</x-slot>
            <x-slot name="model">
                <form action="successStoriesDelete" method="post">
                    @csrf
                    <input type="hidden" id="stories_delete_id" name="stories_delete_id" value="">
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
        <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
        <script type="text/javascript">
            CKEDITOR.replace('description_ar');
            CKEDITOR.replace('description_en');
            CKEDITOR.replace('onter_description_ar');
            CKEDITOR.replace('onter_description_en');
        </script>
    @endpush
    <x-row>
        <x-slot name="title">{{__('main.Add')}}</x-slot>
        <x-slot name="form">
            <form action="add_success_stories" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">{{__('main.Name')}} (Arabic)</label>
                        <input type="text" id="title_ar" name="title_ar" value="{{old('title_ar')}}" class="form-control" id="basic-default-fullname" placeholder="John Doe" />
                        @error('title_ar')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">{{__('main.Name')}} (English)</label>
                        <input type="text" id="title_en" name="title_en" value="{{old('title_en')}}" class="form-control" placeholder="" />
                        @error('title_en')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">{{__('main.successStories.MainImage')}} (English)</label>
                        <input type="file" id="main_image" name="main_image" value="{{old('mian_image')}}" class="form-control" placeholder="" />
                        @error('mian_image')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">{{__('main.successStories.OntherImages')}} (English)</label>
                        <input type="file" id="onther_images" name="onther_images[]" value="{{old('onther_images')}}" class="form-control" placeholder="" multiple />
                        @error('onther_images')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label">{{__('main.successStories.ServiceName')}}</label>
                        <select name="service" id="service" class="form-select">
                            @foreach ($services as $service)
                                <option value="{{$service->id}}">{{$service->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label class="form-label" for="">{{__('main.Description')}} (Arabic)</label>
                        <textarea id="description_ar" name="description_ar" class="ckeditor form-control" value="{{old('description_ar')}}"></textarea>
                        @error('description_ar')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label" for="">{{__('main.Description')}} (English)</label>
                        <textarea id="description_en" name="description_en" class="ckeditor form-control" value="{{old('description_en')}}"></textarea>
                        @error('description_en')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label class="form-label" for="">{{__('main.successStories.OntherDescription')}} (Arabic)</label>
                        <textarea id="onter_description_ar" name="onther_description_ar" class="ckeditor form-control" value="{{old('onter_description_ar')}}"></textarea>
                        @error('onter_description_ar')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label" for="">{{__('main.successStories.OntherDescription')}} (English)</label>
                        <textarea id="onter_description_en" name="onther_description_en" class="ckeditor form-control" value="{{old('onter_description_en')}}"></textarea>
                        @error('onter_description_en')
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
        @include('script.success-stories')
        <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
        <script type="text/javascript">
            CKEDITOR.replace('edit_description_ar');
            CKEDITOR.replace('edit_description_en');
            CKEDITOR.replace('edit_onter_description_ar');
            CKEDITOR.replace('edit_onter_description_en');
        </script>
    @endpush
    <x-row>
        <x-slot name="title">{{__('main.services.Edit_services')}}</x-slot>
        <x-slot name="form">
            @php
                $storyid = isset($_GET['storyid']) && is_numeric($_GET['storyid']) ? intval($_GET['storyid']) : 0;
            @endphp
            <form action="update_success_stories" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="storyid" id="storyid" value="{{$storyid}}">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">{{__('main.Name')}} (Arabic)</label>
                        <input type="text" id="edit_title_ar" name="title_ar" value="{{old('title_ar')}}" class="form-control" id="basic-default-fullname" placeholder="John Doe" />
                        @error('title_ar')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">{{__('main.Name')}} (English)</label>
                        <input type="text" id="edit_title_en" name="title_en" value="{{old('title_en')}}" class="form-control" placeholder="" />
                        @error('title_en')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">{{__('main.successStories.MainImage')}} (English)</label>
                        <input type="file" id="main_image" name="main_image" value="{{old('mian_image')}}" class="form-control" placeholder="" />
                        @error('mian_image')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">{{__('main.successStories.OntherImages')}} (English)</label>
                        <input type="file" id="onther_images" name="onther_images[]" value="{{old('onther_images')}}" class="form-control" placeholder="" multiple />
                        @error('onther_images')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label">{{__('main.successStories.ServiceName')}}</label>
                        <select name="service" id="service" class="form-select">
                            @foreach ($services as $service)
                                <option value="{{$service->id}}">{{$service->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label class="form-label" for="">{{__('main.Description')}} (Arabic)</label>
                        <textarea id="edit_description_ar" name="description_ar" class="ckeditor form-control" value="{{old('description_ar')}}"></textarea>
                        @error('description_ar')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label" for="">{{__('main.Description')}} (English)</label>
                        <textarea id="edit_description_en" name="description_en" class="ckeditor form-control" value="{{old('description_en')}}"></textarea>
                        @error('description_en')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label class="form-label" for="">{{__('main.successStories.OntherDescription')}} (Arabic)</label>
                        <textarea id="edit_onter_description_ar" name="onther_description_ar" class="ckeditor form-control" value="{{old('onter_description_ar')}}"></textarea>
                        @error('onter_description_ar')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label" for="">{{__('main.successStories.OntherDescription')}} (English)</label>
                        <textarea id="edit_onter_description_en" name="onther_description_en" class="ckeditor form-control" value="{{old('onter_description_en')}}"></textarea>
                        @error('onter_description_en')
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

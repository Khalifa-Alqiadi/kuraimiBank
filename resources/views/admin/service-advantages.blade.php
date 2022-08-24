@extends('admin.layout.app')
@section('content')
@php
    $servcieId = $service_id;
    $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
    $serviceid = isset($_GET['serviceid']) && is_numeric($_GET['serviceid']) ? intval($_GET['serviceid']) : 0;
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
                {{__('main.advantages.Manage')}}
        </x-slot>  
        <x-slot name="button">
            <a href="service-advantage?do=Add&serviceid={{$service_id}}" class="btn menu-theme text-white me-sm-3 me-1 mt-3" > {{__('main.Add')}} </a>
        </x-slot>  
        <x-slot name="tableThead">
            <tr>
                <th>{{__('main.Name')}}</th>
                <th>{{__('main.Description')}}</th>
                <th>{{__('main.Status')}}</th>
                <th>{{__('main.Actions')}}</th>
            </tr>
        </x-slot>  
        
        
        <x-slot name="tableTbody" >
            <tbody class="table-border-bottom-0 services-list mb-5">
                @foreach ($serviceAdv as $adv)
                    <tr>
                        <td>{{$adv->name}}</td>
                        <td>{{$adv->description}}</td>
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
                    @csrf
                    <input type="text" id="serviceid" name="serviceid" value="{{$service_id}}">
                    <input type="text" id="adv_active_id" name="adv_active_id" value="">
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
    <div class="modal fade" id="AdvantageDeleted" tabindex="-1" aria-hidden="true">
        <x-model>
            <x-slot name="titleModel">{{__('main.Delete')}}</x-slot>
            <x-slot name="model">
                <form action="{{route('serviceAdvantageDelete')}}" method="post">
                    @csrf
                    <input type="hidden" id="serviceid" name="serviceid" value="{{$service_id}}">
                    <input type="hidden" id="adv_delete_id" name="adv_delete_id" value="">
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


    {{-- Slider Part --}}
    <br><br>
    <x-table>
        <x-slot name="titleName">
                {{__('main.slider_service.Manage')}}
        </x-slot>  
        <x-slot name="button">
            <a href="?do=AddSlider&serviceid={{$service_id}}" class="btn menu-theme text-white me-sm-3 me-1 mt-3" > {{__('main.Add')}} </a>
        </x-slot>  
        <x-slot name="tableThead">
            <tr>
                <th>{{__('main.Name')}}</th>
                <th>{{__('main.Description')}}</th>
                <td>{{__('main.Image')}}</td>
                <th>{{__('main.Status')}}</th>
                <th>{{__('main.Actions')}}</th>
            </tr>
        </x-slot>  
        <x-slot name="tableTbody" >
            <tbody class="table-border-bottom-0 slider-service-list">
                @foreach ($sliderService as $slider)
                    <tr class="slider">
                        <td class="title" id="title">{{$slider->title}}</td>
                        <td class="description">{!! $slider->description !!}</td>
                        <td class="avatar">
                            <img src="{{asset('images/'. $slider->image)}}" alt="Avatar" class="rounded-circle">
                        </td>
                        @if ($slider->is_active == 0)
                            <td><button type="button" onclick="sliderServiceActive({{$slider->id}})" value="" class="badge -active border-0 bg-label-primary me-1" data-bs-toggle="modal" data-bs-target="#SliderServiceActive">{{__('main.No_Active')}}</button></td>
                        @else
                            <td><button type="button" onclick="sliderServiceActive({{$slider->id}})" value="" class="badge -active border-0 bg-label-primary me-1" data-bs-toggle="modal" data-bs-target="#SliderServiceActive">{{__('main.Active')}}</button></td>  
                        @endif
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                <div class="dropdown-menu">
                                    <a href="?do=EditSlider&sliderid={{$slider->id}}"><button type="submit" id="edit_slider" onclick="sliderServiceEdit({{$slider->id}})" class="btn ">{{__('main.Edit')}}</button>  </a>
                                    <button type="button" id="delete_city" onclick="sliderServiceDeleted({{$slider->id}})" class="btn " data-bs-toggle="modal" data-bs-target="#SliderServiceDelete">  <i class="bx bx-trash me-2"></i> {{__('main.Delete')}}</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </x-slot>
    </x-table>

    <div class="modal fade" id="SliderServiceActive" tabindex="-1" aria-hidden="true">
        <x-model>
            <x-slot name="titleModel">{{__('main.Status_Edit')}}</x-slot>
            <x-slot name="model">
                <form action="{{route('service_Slider_Active')}}" method="post">
                    @csrf
                    <input type="hidden" id="serviceid" name="serviceid" value="{{$service_id}}">
                    <input type="hidden" id="slider_active_id" name="slider_active_id" value="">
                    <input type="hidden" name="route" value="{{$route}}">
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
    <div class="modal fade" id="SliderServiceDelete" tabindex="-1" aria-hidden="true">
        <x-model>
            <x-slot name="titleModel">{{__('main.Delete')}}</x-slot>
            <x-slot name="model">
                <form action="{{route('service_slider_delete')}}" method="post">
                    @csrf
                    <input type="hidden" id="serviceid" name="serviceid" value="{{$service_id}}">
                    <input type="hidden" id="slider_delete_id" name="slider_delete_id" value="">
                    <input type="hidden" name="route" value="{{$route}}">
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
    {{-- End Slider Part --}}
@elseif($do == 'Add')
    <x-row>
        <x-slot name="title">{{__('main.advantages.Add_advantage')}}</x-slot>
        <x-slot name="form">
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
                        @error('name_ar')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">{{__('main.Name')}} (English)</label>
                        <input type="text" id="name_en" name="name_en" class="form-control" placeholder="" />
                        @error('name_en')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">{{__('main.Description')}} (Arabic)</label>
                        <input type="text" id="description_ar" name="description_ar" class="form-control" placeholder="" />
                        @error('description_ar')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">{{__('main.Description')}} (English)</label>
                        <input type="text" id="description_en" name="description_ar" class="form-control" placeholder="" />
                        @error('description_en')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                
                <button type="submit" class="btn menu-theme text-white">Send</button>
            </form>
        </x-slot>
    </x-row>
@elseif($do == 'Edit')
    <x-row>
        <x-slot name="title">{{__('main.advantages.Edit_advantage')}}</x-slot>
        <x-slot name="form">
            @php
                $advId = isset($_GET['advId']) && is_numeric($_GET['advId']) ? intval($_GET['advId']) : 0;
            @endphp
            @foreach($serviceAdv as $adv)
            @if($adv->id == $advId)
                <form action="{{route('update_service_advantage')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="serviceid" id="serviceid" value="{{$service_id}}">
                        <input type="hidden" name="adv_edit_id" id="adv_edit_id" value="{{$advId}}">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">{{__('main.Name')}} (Arabic)</label>
                            <input type="text" id="name_edit_ar" name="name_ar" value="{{$adv->getTranslation('name', 'ar')}}" class="form-control" id="basic-default-fullname" placeholder="John Doe" />
                            @error('name_ar')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">{{__('main.Name')}} (English)</label>
                            <input type="text" id="name_edit_en" name="name_en" value="{{$adv->getTranslation('name', 'en')}}" class="form-control" placeholder="" />
                            @error('name_en')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">{{__('main.Description')}} (Arabic)</label>
                            <input type="text" id="edit_description_ar" name="description_ar" class="form-control" placeholder="" />
                            @error('description_ar')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">{{__('main.Description')}} (English)</label>
                            <input type="text" id="edit_description_en" name="description_ar" class="form-control" placeholder="" />
                            @error('description_en')
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
{{-- Start Slider Service Add And Edit --}}
@elseif($do == 'AddSlider')
    @push('scripts_after')
        {{-- @include('script.services') --}}
        <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
        <script type="text/javascript">
            CKEDITOR.replace('slider_description_ar');
            CKEDITOR.replace('slider_description_en');
        </script>
    @endpush
    <x-row>
        <x-slot name="title">{{__('main.Add')}}</x-slot>
        <x-slot name="form">
            @php
                $serviceid = isset($_GET['serviceid']) && is_numeric($_GET['serviceid']) ? intval($_GET['serviceid']) : 0;
            @endphp
            <form action="{{route('add_service_slider')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <input type="hidden" name="service_id" value="{{$serviceid}}">
                    <input type="hidden" name="route" value="{{$route}}">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">{{__('main.Name')}} (Arabic)</label>
                        <input type="text" id="name_ar" name="slider_name_ar" class="form-control" id="basic-default-fullname" placeholder="John Doe" />
                        @error('name_ar')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">{{__('main.Name')}} (English)</label>
                        <input type="text" id="name_en" name="slider_name_en" class="form-control" placeholder="" />
                        @error('name_en')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label">{{__('main.Name')}} (English)</label>
                        <input type="file" id="image" name="image" class="form-control" placeholder="" />
                        @error('image')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">{{__('main.Description')}} (Arabic)</label>
                        <textarea id="slider_description_ar" name="slider_description_ar" class="ckeditor form-control" value="{{old('slider_description_ar')}}"></textarea>
                        @error('slider_description_ar')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">{{__('main.Description')}} (English)</label>
                        <textarea id="slider_description_en" name="slider_description_en" class="ckeditor form-control" value="{{old('slider_description_en')}}"></textarea>
                        @error('slider_description_en')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                
                <button type="submit" class="btn menu-theme text-white">Send</button>
            </form>
        </x-slot>
    </x-row>
@elseif($do == 'EditSlider')
    @push('scripts_after')
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('slider_description_edit_ar');
        CKEDITOR.replace('slider_description_edit_en');
    </script>
    @endpush
    <x-row>
        <x-slot name="title">{{__('main.Edit')}}</x-slot>
        <x-slot name="form">
            @php
                $sliderid = isset($_GET['sliderid']) && is_numeric($_GET['sliderid']) ? intval($_GET['sliderid']) : 0;
            @endphp
            @foreach ($sliderService as $slider)
                @if ($slider->id == $sliderid)
                    <form action="{{route('update_service_slider')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="serviceid" id="serviceid" value="{{$service_id}}">
                            <input type="hidden" name="edit_sliderid" id="edit_sliderid" value="{{$sliderid}}">
                            <input type="hidden" name="route" value="{{$route}}">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">{{__('main.Name')}} (Arabic)</label>
                                <input type="text" id="slider_name_edit_ar" name="slider_name_ar" value="{{$slider->getTranslation('title', 'ar')}}" class="form-control" placeholder="John Doe" />
                                @error('slider_name_ar')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">{{__('main.Name')}} (English)</label>
                                <input type="text" id="slider_name_edit_en" name="slider_name_en" value="{{$slider->getTranslation('title', 'en')}}" class="form-control" placeholder="" />
                                @error('slider_name_en')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-12">
                                <label class="form-label">{{__('main.Name')}} (English)</label>
                                <input type="hidden" id="image" value="{{$slider->image}}" name="image" class="form-control" placeholder="" />
                                <input type="file" id="image" name="new_image" class="form-control" placeholder="" />
                                @error('image')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-12">
                                <label class="form-label">{{__('main.Description')}} (Arabic)</label>
                                <textarea id="slider_description_edit_ar" name="slider_description_ar" class="ckeditor form-control" value="{{old('slider_description_ar')}}">{{$slider->getTranslation('description', 'ar')}}</textarea>
                                @error('slider_description_ar')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">{{__('main.Description')}} (English)</label>
                                <textarea id="slider_description_edit_en" name="slider_description_en" class="ckeditor form-control" value="{{old('slider_description_en')}}">{{$slider->getTranslation('description', 'en')}}</textarea>
                                @error('slider_description_en')
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
{{-- Start Slider Service Add And Edit --}}
@endif
@endsection
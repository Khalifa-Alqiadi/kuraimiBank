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
                {{__('main.partners.Manage')}}
                
        </x-slot>  
        <x-slot name="button">
            
            {{-- <button type="button" class="btn btn-primary me-sm-3 me-1 mt-3" data-bs-toggle="modal" data-bs-target="#ServicesAdd"> {{__('main.Add')}} </button> --}}
            <a href="our_partners?do=Add" class="btn menu-theme text-white me-sm-3 me-1 mt-3" > {{__('main.Add')}} </a>
        </x-slot>  
        <x-slot name="tableThead">
            <tr>
                <th>{{__('main.partners.Title')}}</th>
                <th>{{__('main.partners.Description')}}</th>
                <th>{{__('main.Image')}}</th>
                <th>{{__('main.Status')}}</th>
                <th>{{__('main.Actions')}}</th>
            </tr>
        </x-slot>  
        
        
        <x-slot name="tableTbody" >
            <tbody class="table-border-bottom-0 services-list">
                @foreach ($partaner as $part)
                    <tr>
                        <td>{{$part->title}}</td>
                        <td>{{$part->description}}</td>
                        <td class="avatar">
                            <img src="{{URL::asset('images/'. $part->image)}}" alt="Avatar" class="rounded-circle">
                        </td>
                        @if ($part->is_active == 0)
                            <td><button type="button"  onclick="PartanerActive({{$part->id}})" value="" class="badge -active border-0 bg-label-primary me-1" data-bs-toggle="modal" data-bs-target="#OurPartanerActive">{{__('main.No_Active')}}</button></td>
                        @else
                            <td><button type="button" onclick="PartanerActive({{$part->id}})" value="" class="badge -active border-0 bg-label-primary me-1" data-bs-toggle="modal" data-bs-target="#OurPartanerActive">{{__('main.Active')}}</button></td>  
                        @endif
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                <div class="dropdown-menu">
                                    <a href="our_partners?do=Edit&partanerId={{$part->id}}" class="btn dropdown-item"><i class="bx bx-edit-alt me-2" ></i> {{__('main.Edit')}}</a>
                                    <button type="button" class="btn dropdown-item" onclick="deletePartaner({{$part->id}})" data-bs-toggle="modal" data-bs-target="#OurPartanerDelete">  <i class="bx bx-trash me-2" ></i> {{__('main.Delete')}}</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </x-slot>
    </x-table>
    <div class="modal fade" id="OurPartanerActive" tabindex="-1" aria-hidden="true">
        <x-model>
            <x-slot name="titleModel">{{__('main.Status_Edit')}}</x-slot>
            <x-slot name="model">
                <form action="our-partaner-active" method="post">
                    @csrf
                    <input type="hidden" id="partaner_active_id" name="partaner_active_id" value="">
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
    <div class="modal fade" id="OurPartanerDelete" tabindex="-1" aria-hidden="true">
        <x-model>
            <x-slot name="titleModel">{{__('main.Delete')}}</x-slot>
            <x-slot name="model">
                <form action="our-partaner-delete" method="post">
                    @csrf
                    <input type="hidden" id="partaner_delete_id" name="partaner_delete_id" value="">
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
    <x-row>
        <x-slot name="title">{{__('main.partners.Add')}}</x-slot>
        <x-slot name="form">
            <form action="add_our_partaner" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">{{__('main.partners.Title')}} (Arabic)</label>
                        <input type="text" id="title_ar" name="title_ar" class="form-control" id="basic-default-fullname" placeholder="John Doe" />
                        @error('title_ar')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">{{__('main.partners.Title')}} (English)</label>
                        <input type="text" id="title_en" name="title_en" class="form-control" placeholder="" />
                        @error('title_en')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">{{__('main.partners.Description')}} (Arabic)</label>
                        <input type="text" id="descrip_ar" name="descrip_ar" class="form-control" id="basic-default-fullname" placeholder="John Doe" />
                        @error('descrip_ar')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">{{__('main.partners.Description')}} (English)</label>
                        <input type="text" id="descrip_en" name="descrip_en" class="form-control" placeholder="" />
                        @error('descrip_en')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label class="form-label" for="basic-default-fullname">{{__('main.Image')}} (Arabic)</label>
                        <input type="file" id="image" name="image" class="form-control" placeholder="" />
                        @error('image')
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
        <x-slot name="title">{{__('main.partners.Edit')}}</x-slot>
        <x-slot name="form">
            @php
                $partanerId = isset($_GET['partanerId']) && is_numeric($_GET['partanerId']) ? intval($_GET['partanerId']) : 0;
            @endphp
            @foreach ($partaner as $part)
                @if ($part->id == $partanerId)
                    <form action="update_our_partaner" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <input type="hidden" name="partanerId" id="partanerId" value="{{$partanerId}}">
                                <label class="form-label">{{__('main.partner.Title')}} (Arabic)</label>
                                <input type="text" id="title_ar" name="title_ar" value="{{$part->getTranslation('title', 'ar')}}" class="form-control" id="basic-default-fullname" placeholder="John Doe" />
                                @error('title_ar')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">{{__('main.partner.Title')}} (English)</label>
                                <input type="text" id="title_en" name="title_en" value="{{$part->getTranslation('title', 'en')}}" class="form-control" placeholder="" />
                                @error('title_en')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">{{__('main.partners.Description')}} (Arabic)</label>
                                <input type="text" id="descrip_ar" value="{{$part->getTranslation('description', 'ar')}}" name="descrip_ar" class="form-control" id="basic-default-fullname" placeholder="John Doe" />
                                @error('descrip_ar')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">{{__('main.partners.Description')}} (English)</label>
                                <input type="text" id="descrip_en" name="descrip_en" value="{{$part->getTranslation('description', 'en')}}" class="form-control" placeholder="" />
                                @error('descrip_en')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label class="form-label" for="basic-default-fullname">{{__('main.Image')}} (Arabic)</label>
                                <input type="file" id="image" name="image" class="form-control" placeholder="" />
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
@endif
@endsection



    {{--  
    <x-table>
        <x-slot name="titleName">
            <div class="success"></div>
                {{__('main.partners.Manage')}}
        </x-slot>  
        <x-slot name="button">
            <button type="button" class="btn menu-theme text-white me-sm-3 me-1 mt-3" data-bs-toggle="modal" data-bs-target="#PartnerAdd"> {{__('main.Add')}} </button>
        </x-slot>  
        <x-slot name="tableThead">
            <tr>
                <th>{{__('main.partners.Title')}}</th>
                <th>{{__('main.partners.Description')}}</th>
                <th>{{__('main.Image')}}</th>
                <th>{{__('main.Status')}}</th>
                <th>{{__('main.Actions')}}</th>
            </tr>
        </x-slot>
        
        <x-slot name="tableTbody">
            <button type="reset" id="close-our-modal" style="display: none" data-bs-dismiss="CategoryAdd" aria-label="Close"></button>
            <tbody class="table-border-bottom-0 categories-list"></tbody>
        </x-slot> 
    </x-table>
    <div class="modal fade" id="PartnerAdd" tabindex="-1" aria-hidden="true">
        <x-model>
            <x-slot name="titleModel">{{__('main.partners.Add')}}</x-slot>
            <x-slot name="model">
                <div class="col-12">
                    <label class="form-label w-100" for="name">{{__('main.partners.Title')}} (Arabic) </label>
                    <div class="input-group input-group-merge">
                        <input type="text" id="title_ar" name="title_ar"  class="form-control credit-card-mask" placeholder="" />
                    </div>
                    <div class="text-danger error-text add_title_ar"></div>
                </div>
                <div class="col-12">
                    <label class="form-label w-100" for="name">{{__('main.partners.Title')}} (English) </label>
                    <div class="input-group input-group-merge">
                        <input type="text" id="title_en" name="title_en"  class="form-control credit-card-mask" placeholder="" />
                    </div>
                    <div class="text-danger error-text add_title_en"></div>
                </div>                
                <div class="col-12">
                    <label class="form-label w-100" for="name">{{__('main.partners.Description')}} (Arabic) </label>
                    <div class="input-group input-group-merge">
                        <input type="text" id="descrip_ar" name="descrip_ar"  class="form-control credit-card-mask" placeholder="" />
                    </div>
                    <div class="text-danger error-text add_descrip_ar"></div>
                </div>                
                <div class="col-12">
                    <label class="form-label w-100" for="name">{{__('main.partners.Description')}} (English) </label>
                    <div class="input-group input-group-merge">
                        <input type="text" id="descrip_en" name="descrip_en" class="form-control credit-card-mask" placeholder="" />
                    </div>
                    <div class="text-danger error-text add_descrip_en"></div>
                </div>                
                <div class="col-12">
                    <label class="form-label w-100" for="name">{{__('main.Image')}} </label>
                    <div class="input-group input-group-merge">
                        <input type="file" id="image" name="image" class="form-control credit-card-mask" placeholder="" />
                    </div>
                    <div class="text-danger error-text add_image"></div>
                </div>                
                <div class="col-12 text-center">
                    <button type="submit" onclick="AddOurPartner()" class="btn btn-primary me-sm-3 me-1 mt-3">{{__('main.Submit')}}</button>
                    <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">{{__('main.Cancel')}}</button>
                </div>
            </x-slot>
        </x-model>
    </div>
    <div class="modal fade" id="CategoryEdite" tabindex="-1" aria-hidden="true">
        <x-model>
            <x-slot name="titleModel">{{__('main.categories.Edit')}}</x-slot>
            <x-slot name="model">
                    <input id="cid" name="cid" value="" class="form-control credit-card-mask" type="hidden" />
                    <div class="col-12">
                        <label class="form-label w-100">{{__('main.categories.Category_name')}} (Arabic)</label>
                        <div class="input-group input-group-merge">
                            <input id="name_edit_ar" name="name_edit_ar" value="" class="form-control" type="text" />
                        </div>
                        <div class="input-group-text text-danger name_ar cursor-pointer p-1"></div>
                    </div>
                    <div class="col-12">
                        <label class="form-label w-100" for="">{{__('main.categories.Category_name')}} (English)</label>
                        <div class="input-group input-group-merge">
                            <input id="name_edit_en" name="name_edit_en" value="" class="form-control" type="text" />
                        </div>
                        <div class="input-group-text text-danger name_en cursor-pointer p-1"></div>
                    </div>
                    <div class="col-12 text-center">
                    <button type="submit" id="updateCategory"  class="btn btn-primary me-sm-3 me-1 mt-3">{{__('main.Submit')}}</button>
                    <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">{{__('main.Cancel')}}</button>
                    </div>
            </x-slot>
        </x-model>
    </div>
    <div class="modal fade" id="CategoryActive" tabindex="-1" aria-hidden="true">
        <x-model>
            <x-slot name="titleModel">{{__('main.categories.Category_Delete')}}</x-slot>
            <x-slot name="model">
                    <input type="hidden" id="category_id" name="category_id" value="">
                    <div class="col-12">
                        <h1>{{__('main.Delete_Row')}}</h1>
                    </div>
                    <div class="col-12 text-center">
                        <button  type="submit" id="Active" class="btn btn-primary me-sm-3 me-1 mt-3">{{__('main.Submit')}}</button>
                        <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">{{__('main.Cancel')}}</button>
                    </div>
            </x-slot>
        </x-model>
    </div>
    <div class="modal fade" id="CategoryDelete" tabindex="-1" aria-hidden="true">
        <x-model>
            <x-slot name="titleModel">{{__('main.categories.Category_Delete')}}</x-slot>
            <x-slot name="model">
                    <input type="hidden" id="category_id_delete" name="category_id_delete" value="">
                    <div class="col-12">
                        <h1>{{__('main.Delete_Row')}}</h1>
                    </div>
                    <div class="col-12 text-center">
                        <button  type="submit" onclick="delete_category()" id="Active" class="btn btn-primary me-sm-3 me-1 mt-3">{{__('main.Submit')}}</button>
                        <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">{{__('main.Cancel')}}</button>
                    </div>
            </x-slot>
        </x-model>
    </div>
    --}}

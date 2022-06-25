@extends('admin.layout.app')
@section('content')
@push('scripts_after')
    @include('script.categories-script')
@endpush
    <div class="success"></div>
    <x-table>
        <x-slot name="titleName">
                {{__('main.categories.Manage')}}
        </x-slot>  
        <x-slot name="button">
            <button type="button" class="btn menu-theme text-white me-sm-3 me-1 mt-3" data-bs-toggle="modal" data-bs-target="#CategoryAdd"> {{__('main.Add')}} </button>
        </x-slot>  
        <x-slot name="tableThead">
            <tr>
                <th>{{__('main.Name')}}</th>
                <th>{{__('main.categories.Parent')}}</th>
                <th>{{__('main.Status')}}</th>
                <th>{{__('main.Actions')}}</th>
            </tr>
        </x-slot>
        
        <x-slot name="tableTbody">
            <button type="reset" id="close-our-modal" style="display: none" data-bs-dismiss="CategoryAdd" aria-label="Close"></button>
            <tbody class="table-border-bottom-0 categories-list"></tbody>
        </x-slot> 
    </x-table>
    <div class="modal fade" id="CategoryAdd" tabindex="-1" aria-hidden="true">
        <div class="  w-100 d-flex ">
            <ul class="errors-validation position-absolute"></ul>
        </div>
        <x-model>
            <x-slot name="titleModel">{{__('categories.Add_Category')}}</x-slot>
            <x-slot name="model">
                    <div class="col-12">
                        <label class="form-label w-100" for="name">{{__('categories.Category_name')}} </label>
                        <div class="input-group input-group-merge">
                            <input type="text" id="name_ar" name="name_ar" value="" class="form-control credit-card-mask" placeholder="" />
                        </div>
                        <div class="text-danger error-text name_ar"></div>
                    </div>
                    <div class="col-12">
                        <label class="form-label w-100" for="name">{{__('categories.Category_name')}} </label>
                        <div class="input-group input-group-merge">
                            <input type="text" id="name_en" name="name_en" value="" class="form-control credit-card-mask" placeholder="" />
                        </div>
                        <div class="text-danger error-text name_en"></div>
                    </div>
                {{-- @endforeach --}}
                
                <div class="col-12 ">
                    <label class="form-label" for="collapsible-state">State</label>
                    <select name="parent_category" id="parent_category" class="select2 form-select" data-allow-clear="true">
                        <option value="0">Null</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 text-center">
                    <button type="submit" id="sendCategory" class="btn btn-primary me-sm-3 me-1 mt-3">{{__('main.Submit')}}</button>
                    <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">{{__('main.Cancel')}}</button>
                </div>
            </x-slot>
        </x-model>
    </div>
    <div class="modal fade" id="CategoryEdite" tabindex="-1" aria-hidden="true">
        <x-model>
            <x-slot name="titleModel">{{__('main.categories.Edit')}}</x-slot>
            <x-slot name="model">
                {{-- <form action="UpdateCategory" method="POST" class="row g-3 UpdateCategory"> --}}
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
                    <div class="col-12 ">
                        <label class="form-label" for="collapsible-state">State</label>
                        <select name="parent_category_edit" id="parent_category_edit" class="select2 form-select" data-allow-clear="true">
                            <option value="0">Null</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 text-center">
                    <button type="submit" id="updateCategory"  class="btn btn-primary me-sm-3 me-1 mt-3">{{__('main.Submit')}}</button>
                    <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">{{__('main.Cancel')}}</button>
                    </div>
                {{-- </form> --}}
            </x-slot>
        </x-model>
    </div>
    <div class="modal fade" id="CategoryActive" tabindex="-1" aria-hidden="true">
        <x-model>
            <x-slot name="titleModel">{{__('main.categories.Category_Delete')}}</x-slot>
            <x-slot name="model">
                {{-- <form class="row g-3 CategoryActive" action="CategoryActive" method="POST"> --}}
                    <input type="hidden" id="category_id" name="category_id" value="">
                    <div class="col-12">
                        <h1>{{__('main.Delete_Row')}}</h1>
                    </div>
                    <div class="col-12 text-center">
                        <button  type="submit" id="Active" class="btn btn-primary me-sm-3 me-1 mt-3">{{__('main.Submit')}}</button>
                        <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">{{__('main.Cancel')}}</button>
                    </div>
                {{-- </form> --}}
            </x-slot>
        </x-model>
    </div>
    <div class="modal fade" id="CategoryDelete" tabindex="-1" aria-hidden="true">
        <x-model>
            <x-slot name="titleModel">{{__('main.categories.Category_Delete')}}</x-slot>
            <x-slot name="model">
                {{-- <form class="row g-3 CategoryActive" action="CategoryActive" method="POST"> --}}
                    <input type="hidden" id="category_id_delete" name="category_id_delete" value="">
                    <div class="col-12">
                        <h1>{{__('main.Delete_Row')}}</h1>
                    </div>
                    <div class="col-12 text-center">
                        <button  type="submit" onclick="delete_category()" id="Active" class="btn btn-primary me-sm-3 me-1 mt-3">{{__('main.Submit')}}</button>
                        <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">{{__('main.Cancel')}}</button>
                    </div>
                {{-- </form> --}}
            </x-slot>
        </x-model>
    </div>

@endsection
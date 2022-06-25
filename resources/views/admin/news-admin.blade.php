@extends('admin.layout.app')
@section('content')

@php
    $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
@endphp
@if ($do == 'Manage')
@push('scripts_after')
    @include('script.news-script')
@endpush
<x-table>
    <x-slot name="titleName">{{__('main.news.Manage')}}</x-slot>  
    <x-slot name="button">
        <div class="success"></div>
        <a href="show-news?do=Add" class="btn btn-primary me-sm-3 me-1 mt-3" > {{__('main.Add')}} </a>
    </x-slot>  
    <x-slot name="tableThead">
        <tr>
            <th>{{__('main.news.Title')}}</th>
            <th>{{__('main.news.Description')}}</th>
            <th>{{__('main.news.Background')}}</th>
            <th>{{__('main.Status')}}</th>
            <th>{{__('main.Actions')}}</th>
        </tr>
    </x-slot>  
    
    
    <x-slot name="tableTbody" >
        <tbody class="table-border-bottom-0 news-list">
        </tbody>
    </x-slot>
</x-table>
<div class="modal fade" id="NewActive" tabindex="-1" aria-hidden="true">
    <x-model>
        <x-slot name="titleModel">{{__('main.Status_Edit')}}</x-slot>
        <x-slot name="model">
            <input type="hidden" id="new_active_id" name="new_active_id" value="">
            <div class="col-12">
                <h1>{{__('main.Delete_Row')}}</h1>
            </div>
            <div class="col-12 text-center">
                <button type="submit" onclick="New_Active()" class="btn btn-primary me-sm-3 me-1 mt-3">{{__('main.Submit')}}</button>
                <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">{{__('main.Cancel')}}</button>
            </div>
        </x-slot>
    </x-model>
</div>
<div class="modal fade" id="New_Deleted" tabindex="-1" aria-hidden="true">
    <x-model>
        <x-slot name="titleModel">{{__('main.Delete')}}</x-slot>
        <x-slot name="model">
            {{-- <form action="{{route('News-Delete')}}" method="post"> --}}
                <input type="hidden" id="new_delete_id" name="new_delete_id" value="">
                <div class="col-12">
                  <h1>{{__('main.Delete_Row')}}</h1>
                </div>
                <div class="col-12 text-center">
                  <button type="submit" onclick="News_Delete()" class="btn btn-primary me-sm-3 me-1 mt-3">{{__('main.Submit')}}</button>
                  <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">{{__('main.Cancel')}}</button>
                </div>
            {{-- </form> --}}
        </x-slot>
    </x-model>
</div>
@elseif($do == 'Add')
<x-row>
    <x-slot name="title">{{__('main.news.Add_News')}}</x-slot>
    <x-slot name="form">
        <form action="{{route('add-news')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label class="form-label">{{__('main.news.Title')}} (Arabic)</label>
                    <input type="text" id="title_ar" name="title_ar" class="form-control" id="basic-default-fullname" placeholder="John Doe" />
                    @error('title_ar')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                
                <div class="mb-3 col-md-6">
                    <label class="form-label">{{__('main.news.Title')}} (English)</label>
                    <input type="text" id="title_en" name="title_en" class="form-control" placeholder="" />
                    @error('title_en')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                
                <div class="mb-3 col-md-6">
                    <label class="form-label">{{__('main.news.Description')}} (Arabic)</label>
                    <input type="text" id="descrip_ar" name="descrip_ar" class="form-control" placeholder="" />
                    @error('descrip_ar')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                
                <div class="mb-3 col-md-6">
                    <label class="form-label">{{__('main.news.Description')}} (English)</label>
                    <input type="text" id="descrip_en" name="descrip_en" class="form-control" placeholder="" />
                    @error('descrip_en')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">{{__('main.news.Description')}} (English)</label>
                    <input type="file" id="image" name="image" class="form-control" placeholder="" />
                    @error('image')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                
            </div>
            
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </x-slot>
</x-row>
@elseif($do == 'Edit')

@push('scripts_after')
    @include('script.news-edit')
@endpush
<x-row>
    <x-slot name="title">{{__('main.news.Edit_News')}}</x-slot>
    <x-slot name="form">
        @php
            $newid = isset($_GET['newid']) && is_numeric($_GET['newid']) ? intval($_GET['newid']) : 0;
        @endphp
        <form action="{{route('update-News')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <input type="text" name="new_edit_id" id="new_edit_id" value="{{$newid}}">
                <div class="mb-3 col-md-6">
                    <label class="form-label">{{__('main.news.Title')}} (Arabic)</label>
                    <input type="text" id="title_edit_ar" name="title_edit_ar" value="{{old('title_edit_ar')}}" class="form-control" placeholder="John Doe" />
                    @error('title_edit_ar')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">{{__('main.news.Title')}} (English)</label>
                    <input type="text" id="title_edit_en" name="title_edit_en" class="form-control" placeholder="" />
                    @error('title_edit_en')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">{{__('main.news.Description')}} (Arabic)</label>
                    <input type="text" id="descrip_edit_ar" name="descrip_edit_ar" class="form-control" placeholder="" />
                    @error('descrip_edit_ar')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">{{__('main.news.Description')}} (English)</label>
                    <input type="text" id="descrip_edit_en" name="descrip_edit_en" class="form-control" placeholder="" />
                    @error('descrip_edit_en')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">{{__('main.news.Description')}} (English)</label>
                    <input type="file" id="image_edit" name="image_edit" class="form-control" placeholder="" />
                    @error('image_edit')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </x-slot>
</x-row>
@endif
    
@endsection
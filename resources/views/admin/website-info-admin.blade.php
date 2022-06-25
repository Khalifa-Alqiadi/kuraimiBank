@extends('admin.layout.app')
@section('content')
@php
    $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
@endphp
@if ($do == 'Manage')
@push('scripts_after')
    @include('script.control')
@endpush
<x-table>
    <x-slot name="titleName">
            {{__('main.website.Manage')}}
 
    </x-slot>  
    <x-slot name="button">
        <a href="show-control-info?do=Add" class="btn btn-primary me-sm-3 me-1 mt-3" > {{__('main.Add')}} </a>
    </x-slot>  
    <x-slot name="tableThead">
        <tr>
            <th>{{__('main.website.Key')}}</th>
            <th>{{__('main.Status')}}</th>
        </tr>
    </x-slot>  
    
    
    <x-slot name="tableTbody" >
        <tbody class="table-border-bottom-0 services-list">
            @foreach ($websiteInfo as $info)
                <tr>
                    <td>{{$info->key}}</td>
                    @if ($info->is_active == 0)
                        <td><button type="button" onclick="WebsiteActive({{$info->id}})" value="" class="badge -active border-0 bg-label-primary me-1" data-bs-toggle="modal" data-bs-target="#WebsiteActive">{{__('main.No_Active')}}</button></td>
                    @else
                        <td><button type="button" onclick="WebsiteActive({{$info->id}})" value="" class="badge -active border-0 bg-label-primary me-1" data-bs-toggle="modal" data-bs-target="#WebsiteActive">{{__('main.Active')}}</button></td>  
                    @endif
                </tr>
            @endforeach
        </tbody>
    </x-slot>
</x-table>
<div class="modal fade" id="WebsiteActive" tabindex="-1" aria-hidden="true">
    <x-model>
        <x-slot name="titleModel">{{__('main.Status_Edit')}}</x-slot>
        <x-slot name="model">
            <form action="{{route('Website_Active')}}" method="post">
                <input type="hidden" id="info_active_id" name="info_active_id" value="">
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
@push('scripts_after')
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('value_ar');
        CKEDITOR.replace('value_en');
    </script>
    {{-- @include('script.services') --}}
@endpush
<x-row>
    <x-slot name="title">{{__('main.website.Add_Info')}}</x-slot>
    <x-slot name="form">
        <form action="{{route('add-websiteInfo')}}" method="post">
            @csrf
            <div class="row">
                <div class="mb-3 col-md-12">
                    <label class="form-label">{{__('main.website.Key')}} (Arabic)</label>
                    <input type="text" id="key" name="key" class="form-control" id="basic-default-fullname" placeholder="John Doe" />
                    @error('key')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                
                <div class="mb-3 col-md-12">
                    <label class="form-label">{{__('main.website.Value')}} (Arabic)</label>
                    <textarea id="value_ar" name="value_ar" class="ckeditor form-control"></textarea>
                    @error('value_ar')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                
                <div class="mb-3 col-md-12">
                    <label class="form-label">{{__('main.website.Value')}} (English)</label>
                    <textarea id="value_en" name="value_en" class="ckeditor form-control"></textarea>
                    @error('value_en')
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
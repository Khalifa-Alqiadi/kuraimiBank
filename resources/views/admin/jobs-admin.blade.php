@extends('admin.layout.app')
@section('content')
@push('scripts_after')
    @include('script.jobs-script')
@endpush
@php
    $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
@endphp
@if ($do == 'Manage')

@push('scripts_after')
    @include('script.control')
@endpush
<x-table>
    <x-slot name="titleName">{{__('main.jobs.Manage')}}</x-slot>  
    <x-slot name="button">
        <div class="success"></div>
        <a href="show-jobs?do=Add" class="btn btn-primary me-sm-3 me-1 mt-3" > {{__('main.Add')}} </a>
    </x-slot>  
    <x-slot name="tableThead">
        <tr>
            <th>{{__('main.jobs.Title')}}</th>
            <th>{{__('main.jobs.Description')}}</th>
            <th>{{__('main.Status')}}</th>
            <th>{{__('main.Actions')}}</th>
        </tr>
    </x-slot>  
    
    
    <x-slot name="tableTbody" >
        <tbody class="table-border-bottom-0 jobs-list">
        </tbody>
    </x-slot>
</x-table>
<div class="modal fade" id="JobActive" tabindex="-1" aria-hidden="true">
    <x-model>
        <x-slot name="titleModel">{{__('main.Status_Edit')}}</x-slot>
        <x-slot name="model">
            {{-- <form action="{{route('Job_Active')}}" method="post"> --}}
                <input type="hidden" id="job_active_id" name="job_active_id" value="">
                <div class="col-12">
                  <h1>{{__('main.Delete_Row')}}</h1>
                </div>
                <div class="col-12 text-center">
                  <button type="submit" onclick="JobUpdateActive()" class="btn btn-primary me-sm-3 me-1 mt-3">{{__('main.Submit')}}</button>
                  <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">{{__('main.Cancel')}}</button>
                </div>
            {{-- </form> --}}
        </x-slot>
    </x-model>
</div>
<div class="modal fade" id="Job__Deleted" tabindex="-1" aria-hidden="true">
    <x-model>
        <x-slot name="titleModel">{{__('main.Delete')}}</x-slot>
        <x-slot name="model">
            {{-- <form action="{{route('Job-Delete')}}" method="post"> --}}
                <input type="hidden" id="job_delete_id" name="job_delete_id" value="">
                <div class="col-12">
                  <h1>{{__('main.Delete_Row')}}</h1>
                </div>
                <div class="col-12 text-center">
                  <button type="submit" onclick="Job_Delete()" class="btn btn-primary me-sm-3 me-1 mt-3">{{__('main.Submit')}}</button>
                  <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">{{__('main.Cancel')}}</button>
                </div>
            {{-- </form> --}}
        </x-slot>
    </x-model>
</div>
@elseif($do == 'Add')

<x-row>
    
    <x-slot name="title">{{__('main.jobs.Add_Job')}}</x-slot>
    <x-slot name="form">
        <div class="success"></div>
        {{-- <form action="{{route('add-Job')}}" method="post">
            @csrf --}}
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label class="form-label">{{__('main.jobs.Title')}} (Arabic)</label>
                    <input type="text" id="title_ar" name="title_ar" class="form-control" id="basic-default-fullname" placeholder="John Doe" />
                    <div class="text-danger add_title_ar"></div>
                </div>
                
                <div class="mb-3 col-md-6">
                    <label class="form-label">{{__('main.jobs.Title')}} (English)</label>
                    <input type="text" id="title_en" name="title_en" class="form-control" placeholder="" />
                    <div class="text-danger add_title_en"></div>
                </div>
                
                <div class="mb-3 col-md-6">
                    <label class="form-label">{{__('main.jobs.Description')}} (Arabic)</label>
                    <input type="text" id="descrip_ar" name="descrip_ar" class="form-control" placeholder="" />
                    <div class="text-danger add_descrip_ar"></div>
                </div>
                
                <div class="mb-3 col-md-6">
                    <label class="form-label">{{__('main.jobs.Description')}} (English)</label>
                    <input type="text" id="descrip_en" name="descrip_en" class="form-control" placeholder="" />
                    <div class="text-danger add_descrip_en"></div>
                </div>
                
            </div>
            
            <button type="submit" onclick="add_job()" class="btn btn-primary">Send</button>
        {{-- </form> --}}
    </x-slot>
</x-row>
@elseif($do == 'Edit')
@push('scripts_after')
    @include('script.job-edit')
@endpush

<x-row>
    <x-slot name="title">{{__('main.jobs.Edit_Job')}}</x-slot>
    <x-slot name="form">
        @php
            $jobid = isset($_GET['jobid']) && is_numeric($_GET['jobid']) ? intval($_GET['jobid']) : 0;
        @endphp
        <div class="success"></div>
        {{-- <form action="{{route('update-Job')}}" method="post" enctype="multipart/form-data">
            @csrf --}}
            <div class="row">
                <input type="hidden" name="job_edit_id" id="job_edit_id" value="{{$jobid}}">
                <div class="mb-3 col-md-6">
                    <label class="form-label">{{__('main.jobs.Title')}} (Arabic)</label>
                    <input type="text" id="title_edit_ar" name="title_edit_ar" value="{{old('title_edit_ar')}}" class="form-control" placeholder="John Doe" />
                    <div class="text-danger edit_title_ar"></div>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">{{__('main.jobs.Title')}} (English)</label>
                    <input type="text" id="title_edit_en" name="title_edit_en" class="form-control" placeholder="" />
                    <div class="text-danger edit_title_en"></div>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">{{__('main.jobs.Description')}} (Arabic)</label>
                    <input type="text" id="descrip_edit_ar" name="descrip_edit_ar" class="form-control" placeholder="" />
                    <div class="text-danger edit_descrip_ar"></div>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">{{__('main.jobs.Description')}} (English)</label>
                    <input type="text" id="descrip_edit_en" name="descrip_edit_en" class="form-control" placeholder="" />
                    <div class="text-danger edit_descrip_en"></div>
                </div>
            </div>
            
            <button type="submit" onclick="updateJob()" class="btn btn-primary">Send</button>
        {{-- </form> --}}
    </x-slot>
</x-row>
@endif
    
@endsection
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
                {{__('main.reports.Manage')}}
                @if(session()->has('success'))
                    <x-alert>
                        <div class="show-success fs-4">{{session()->get('success')}}</div>
                    </x-alert>
                @endif
        </x-slot>  
        <x-slot name="button">
            @permission('manage_reports')
                <a href="financial-reports?do=Add" class="btn menu-theme text-white me-sm-3 me-1 mt-3" > {{__('main.Add')}} </a>
            @endpermission
        </x-slot>  
        <x-slot name="tableThead">
            <tr>
                <th>{{__('main.reports.Title')}}</th>
                <th>{{__('main.Description')}}</th>
                <th>{{__('main.reports.PDF')}}</th>
                <th>{{__('main.Status')}}</th>
                <th>{{__('main.Actions')}}</th>
            </tr>
        </x-slot>  
        
        
        <x-slot name="tableTbody" >
            <tbody class="table-border-bottom-0 services-list">
                @foreach ($reports as $report)
                    <tr>
                        <td>{{$report->title}}</td>
                        <td>{{$report->description}}</td>
                        <td class="avatar">
                            <a href="{{URL::asset('pdf/'. $report->pdf)}}">{{$report->pdf}}</a>
                        </td>
                        @if (Auth::user()->hasPermission('manage_reports'))
                            @if ($report->is_active == 0)
                            <td><button type="button"  onclick="ReportActive({{$report->id}})" value="" class="badge -active border-0 bg-label-primary me-1" data-bs-toggle="modal" data-bs-target="#FinancialReportActive">{{__('main.No_Active')}}</button></td>
                            @else
                                <td><button type="button" onclick="ReportActive({{$report->id}})" value="" class="badge -active border-0 bg-label-primary me-1" data-bs-toggle="modal" data-bs-target="#FinancialReportActive">{{__('main.Active')}}</button></td>  
                            @endif
                        @else
                            @if ($report->is_active == 0)
                            <td><button type="button" class="badge -active border-0 text-danger me-1" data-bs-toggle="modal" data-bs-target="#Unvaliable">{{__('main.No_Active')}}</button></td>
                            @else
                                <td><button type="button" class="badge -active border-0 text-danger me-1" data-bs-toggle="modal" data-bs-target="#Unvaliable">{{__('main.Active')}}</button></td>  
                            @endif
                        @endif
                        
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                <div class="dropdown-menu">
                                    <a href="financial-reports?do=Edit&reportId={{$report->id}}" class="btn dropdown-item"><i class="bx bx-edit-alt me-2" ></i> {{__('main.Edit')}}</a>
                                    @if (Auth::user()->hasPermission('manage_reports'))
                                        <button type="button" class="btn dropdown-item" onclick="deleteReport({{$report->id}})" data-bs-toggle="modal" data-bs-target="#FinancialReportDelete">  <i class="bx bx-trash me-2" ></i> {{__('main.Delete')}}</button>
                                    @else
                                        <button type="button" class="btn dropdown-item" data-bs-toggle="modal" data-bs-target="#UnvaliableDelete">  <i class="bx bx-trash me-2" ></i> {{__('main.Delete')}}</button> 
                                    @endif
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </x-slot>
    </x-table>
    <div class="modal fade" id="FinancialReportActive" tabindex="-1" aria-hidden="true">
        <x-model>
            <x-slot name="titleModel">{{__('main.Status_Edit')}}</x-slot>
            <x-slot name="model">
                <form action="financial-report-active" method="post">
                    @csrf
                    <input type="hidden" id="report_active_id" name="report_active_id" value="">
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
    <div class="modal fade" id="FinancialReportDelete" tabindex="-1" aria-hidden="true">
        <x-model>
            <x-slot name="titleModel">{{__('main.Delete')}}</x-slot>
            <x-slot name="model">
                <form action="financial-report-delete" method="post">
                    @csrf
                    <input type="hidden" id="report_delete_id" name="report_delete_id" value="">
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
    @if (Auth::user()->hasPermission('manage_reports'))
        <x-row>
            <x-slot name="title">{{__('main.reports.Add')}}</x-slot>
            <x-slot name="form">
                <form action="add_financial_report" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">{{__('main.reports.Title')}} (Arabic)</label>
                            <input type="text" id="title_ar" name="title_ar" class="form-control" id="basic-default-fullname" placeholder="John Doe" />
                            @error('title_ar')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">{{__('main.reports.Title')}} (English)</label>
                            <input type="text" id="title_en" name="title_en" class="form-control" placeholder="" />
                            @error('title_en')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">{{__('main.Description')}} (Arabic)</label>
                            <input type="text" id="descrip_ar" name="descrip_ar" class="form-control" id="basic-default-fullname" placeholder="John Doe" />
                            @error('descrip_ar')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">{{__('main.Description')}} (English)</label>
                            <input type="text" id="descrip_en" name="descrip_en" class="form-control" placeholder="" />
                            @error('descrip_en')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label class="form-label">{{__('main.reports.PDF')}}</label>
                            <input type="file" id="pdf" name="pdf" class="form-control" placeholder="" />
                            @error('pdf')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <button type="submit" class="btn menu-theme text-white">Send</button>
                </form>
            </x-slot>
        </x-row>
    @else
    
    <script type="text/javascript">
        window.location = `{{ url('/homeAdmin') }}`//here double curly bracket
    </script>
    @endif
    
@elseif($do == 'Edit')
    @if (Auth::user()->hasPermission('manage_reports'))
        <x-row>
            <x-slot name="title">{{__('main.partners.Edit')}}</x-slot>
            <x-slot name="form">
                @php
                    $reportId = isset($_GET['reportId']) && is_numeric($_GET['reportId']) ? intval($_GET['reportId']) : 0;
                @endphp
                @foreach ($reports as $report)
                    @if ($report->id == $reportId)
                        <form action="update_our_partaner" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <input type="hidden" name="reportId" id="reportId" value="{{$reportId}}">
                                    <label class="form-label">{{__('main.reports.Title')}} (Arabic)</label>
                                    <input type="text" id="title_ar" name="title_ar" value="{{$report->getTranslation('title', 'ar')}}" class="form-control" id="basic-default-fullname" placeholder="John Doe" />
                                    @error('title_ar')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">{{__('main.reports.Title')}} (English)</label>
                                    <input type="text" id="title_en" name="title_en" value="{{$report->getTranslation('title', 'en')}}" class="form-control" placeholder="" />
                                    @error('title_en')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">{{__('main.Description')}} (Arabic)</label>
                                    <input type="text" id="descrip_ar" value="{{$report->getTranslation('description', 'ar')}}" name="descrip_ar" class="form-control" id="basic-default-fullname" placeholder="John Doe" />
                                    @error('descrip_ar')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">{{__('main.Description')}} (English)</label>
                                    <input type="text" id="descrip_en" name="descrip_en" value="{{$report->getTranslation('description', 'en')}}" class="form-control" placeholder="" />
                                    @error('descrip_en')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <label class="form-label" for="basic-default-fullname">{{__('main.Image')}}</label>
                                    <input type="file" id="pdf_new" name="pdf_new" class="form-control" placeholder="" />
                                    <input type="hidden" id="pdf" name="pdf" value="{{$report->pdf}}" class="form-control" placeholder="" />
                                    @error('pdf')
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
    @else
        <script type="text/javascript">
            window.location = `{{ url('/homeAdmin') }}`//here double curly bracket
        </script> 
    @endif
@endif
<div class="modal fade" id="Unvaliable" tabindex="-1" aria-hidden="true">
    <x-model>
        <x-slot name="titleModel">{{__('main.Status_Edit')}}</x-slot>
        <x-slot name="model">
          <div class="col-12">
            <h1 class="text-color">{{__('main.Unavailable')}}</h1>
          </div>
        </x-slot>
    </x-model>
</div>
<div class="modal fade" id="UnvaliableDelete" tabindex="-1" aria-hidden="true">
    <x-model>
        <x-slot name="titleModel">{{__('main.Delete')}}</x-slot>
        <x-slot name="model">
          <div class="col-12">
            <h1 class="text-color">{{__('main.Unavailable')}}</h1>
          </div>
        </x-slot>
    </x-model>
</div>
@endsection


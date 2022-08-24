@extends('admin.layout.app')
@section('content')
@push('scripts_after')
    @include('script.our-services-numbers')
@endpush

    <div class="success"></div>
    <x-table>
        <x-slot name="titleName">
                {{__('main.services_numbers.Name')}}
        </x-slot>  
        <x-slot name="button">
            <button type="button" class="btn menu-theme text-white me-sm-3 me-1 mt-3" data-bs-toggle="modal" data-bs-target="#ServicesNumbersAdd"> {{__('main.Add')}} </button>
        </x-slot>  
        <x-slot name="tableThead">
            <tr>
                <th>{{__('main.services_numbers.Number')}}</th>
                <th>{{__('main.Description')}}</th>
                <th>{{__('main.Status')}}</th>
                <th>{{__('main.Actions')}}</th>
            </tr>
        </x-slot>
        <x-slot name="tableTbody">
            <button type="reset" id="close-our-modal" style="display: none" data-bs-dismiss="CategoryAdd" aria-label="Close"></button>
            <tbody class="table-border-bottom-0 services-numbers-list"></tbody>
        </x-slot> 
    </x-table>
    <div class="modal fade" id="ServicesNumbersAdd" tabindex="-1" aria-hidden="true">
        <div class="  w-100 d-flex ">
            <ul class="errors-validation position-absolute"></ul>
        </div>
        <x-model>
            <x-slot name="titleModel">{{__('main.Add')}}</x-slot>
            <x-slot name="model">
                <div class="col-12">
                    <label class="form-label w-100" for="name">{{__('main.services_numbers.Number')}} </label>
                    <div class="input-group input-group-merge">
                        <input type="text" id="number" name="number" value="" class="form-control" placeholder="" />
                    </div>
                    <div class="text-danger error-text number"></div>
                </div>
                <div class="col-12">
                    <label class="form-label w-100" for="name">{{__('main.Description')}} (Arabic)</label>
                    <div class="input-group input-group-merge">
                        <input type="text" id="description_ar" name="description_ar" value="" class="form-control" placeholder="" />
                    </div>
                    <div class="text-danger error-text description_ar"></div>
                </div>
                <div class="col-12">
                    <label class="form-label w-100" for="name">{{__('main.Description')}} (English)</label>
                    <div class="input-group input-group-merge">
                        <input type="text" id="description_en" name="description_en" value="" class="form-control" placeholder="" />
                    </div>
                    <div class="text-danger error-text description_en"></div>
                </div>
                <div class="col-12 text-center">
                    <button type="submit" id="sendServiceNumber" class="btn btn-primary me-sm-3 me-1 mt-3">{{__('main.Submit')}}</button>
                    <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">{{__('main.Cancel')}}</button>
                </div>
            </x-slot>
        </x-model>
    </div>
    <div class="modal fade" id="ServicesNumbersEdit" tabindex="-1" aria-hidden="true">
        <x-model>
            <x-slot name="titleModel">{{__('main.Edit')}}</x-slot>
            <x-slot name="model">
                <input id="numberid" name="numberid" value="" type="hidden" />
                <div class="col-12">
                    <label class="form-label w-100" for="name">{{__('main.services_numbers.Number')}} </label>
                    <div class="input-group input-group-merge">
                        <input type="text" id="edit_number" name="edit_number" value="" class="form-control" placeholder="" />
                    </div>
                    <div class="text-danger error-text edit_number"></div>
                </div>
                <div class="col-12">
                    <label class="form-label w-100" for="name">{{__('main.Description')}} (Arabic)</label>
                    <div class="input-group input-group-merge">
                        <input type="text" id="edit_description_ar" name="edit_description_ar" value="" class="form-control" placeholder="" />
                    </div>
                    <div class="text-danger error-text edit_description_ar"></div>
                </div>
                <div class="col-12">
                    <label class="form-label w-100" for="name">{{__('main.Description')}} (English)</label>
                    <div class="input-group input-group-merge">
                        <input type="text" id="edit_description_en" name="edit_description_en" value="" class="form-control" placeholder="" />
                    </div>
                    <div class="text-danger error-text edit_description_en"></div>
                </div>
                <div class="col-12 text-center">
                    <button type="submit" id="update_service_number"  class="btn btn-primary me-sm-3 me-1 mt-3">{{__('main.Submit')}}</button>
                    <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">{{__('main.Cancel')}}</button>
                </div>
            </x-slot>
        </x-model>
    </div>
    <div class="modal fade" id="ServicesNumbersActive" tabindex="-1" aria-hidden="true">
        <x-model>
            <x-slot name="titleModel">{{__('main.Status_Edit')}}</x-slot>
            <x-slot name="model">
                <input type="hidden" id="service_number_id" name="service_number_id" value="">
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
    <div class="modal fade" id="ServiceNumberDelete" tabindex="-1" aria-hidden="true">
        <x-model>
            <x-slot name="titleModel">{{__('main.Delete')}}</x-slot>
            <x-slot name="model">
                <input type="hidden" id="service_number_delete_id" name="service_number_delete_id" value="">
                <div class="col-12">
                    <h1>{{__('main.Delete_Row')}}</h1>
                </div>
                <div class="col-12 text-center">
                    <button  type="submit" onclick="delete_service_number()" id="Delete" class="btn btn-primary me-sm-3 me-1 mt-3">{{__('main.Submit')}}</button>
                    <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">{{__('main.Cancel')}}</button>
                </div>
            </x-slot>
        </x-model>
    </div>

@endsection
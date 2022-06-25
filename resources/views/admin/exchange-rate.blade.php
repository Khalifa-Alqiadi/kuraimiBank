@extends('admin.layout.app')

@section('content')
    @push('scripts_after')
        @include('script.exchange-rate')
    @endpush
    <div class="success"></div>
    <x-table>
        <x-slot name="titleName">
                {{__('main.exchange_rate.Manage')}}
        </x-slot>  
        <x-slot name="button">
            <button type="button" class="btn menu-theme text-white me-sm-3 me-1 mt-3" data-bs-toggle="modal" data-bs-target="#ExchangeRateAdd"> {{__('main.Add')}} </button>
        </x-slot>  
        <x-slot name="tableThead">
            <tr>
                <th>{{__('main.exchange_rate.Name')}}</th>
                <th>{{__('main.exchange_rate.Sale')}}</th>
                <th>{{__('main.exchange_rate.Buy')}}</th>
                <th>{{__('main.Status')}}</th>
                
                <th>{{__('main.Actions')}}</th>
            </tr>
        </x-slot>  
        
        
        <x-slot name="tableTbody" >
            <tbody class="table-border-bottom-0 exchange-rates"></tbody>
        </x-slot>
    </x-table>
    <div class="modal editor fade" id="ExchangeRateAdd" tabindex="-1" aria-hidden="true">
        <div class="  w-100 d-flex ">
            <ul class="errors-validation position-absolute"></ul>
        </div>
        <x-model>
            <x-slot name="titleModel">{{__('main.exchange_rate.Add_Exchange')}}</x-slot>
            <x-slot name="model">
                <div class="col-12">
                    <label class="form-label w-100" for="name">{{__('main.Name')}} (Arabic)</label>
                    <div class="input-group input-group-merge">
                        <input id="name_rate_ar" name="name_rate_ar" value="" class="form-control credit-card-mask" type="text" />
                    </div>
                    <div class="text-danger add_name_ar error-text"></div>
                </div>
                <div class="col-12">
                    <label class="form-label w-100" for="name">{{__('main.Name')}} (English)</label>
                    <div class="input-group input-group-merge">
                        <input id="name_rate_en" name="name_rate_en" value="" class="form-control credit-card-mask" type="text" />
                    </div>
                    <div class="text-danger add_name_en error-text"></div>
                </div>
                <div class="col-12">
                    <label class="form-label w-100" for="name">{{__('main.exchange_rate.Sale')}}</label>
                    <div class="input-group input-group-merge">
                        <input id="sale" name="sale" value="" class="form-control credit-card-mask" type="text" />
                    </div>
                    <div class="text-danger add_sale error-text"></div>
                </div>
                <div class="col-12">
                    <label class="form-label w-100" for="name">{{__('main.exchange_rate.Buy')}}</label>
                    <div class="input-group input-group-merge">
                        <input id="buy" name="buy" value="" class="form-control credit-card-mask" type="text" />
                    </div>
                    <div class="text-danger add_buy error-text"></div>
                </div>
                <div class="col-12 text-center">
                    <button type="submit" onclick="add_rate()" class="btn add_city  menu-theme text-white me-sm-3 me-1 mt-3">{{__('main.Submit')}}</button>
                    <button type="reset"  class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">{{__('main.Cancel')}}</button>
                </div>
            </x-slot>
        </x-model>
    </div>
    <div class="modal editor fade" id="ExchangeRateEdit" tabindex="-1" aria-hidden="true">
        <div class="  w-100 d-flex ">
            <ul class="errors-validation position-absolute"></ul>
        </div>
        <x-model>
            <x-slot name="titleModel">{{__('main.exchange_rate.Edit_Exchange')}}</x-slot>
            <x-slot name="model">
                <div class="col-12">
                    <input type="hidden" id="rate_edit_id" name="rate_edit_id" value="">
                    <label class="form-label w-100" for="name">{{__('main.Name')}} (Arabic)</label>
                    <div class="input-group input-group-merge">
                        <input id="name_rate_edit_ar" name="name_rate_edit_ar" value="" class="form-control credit-card-mask" type="text" />
                    </div>
                    <div class="text-danger edit_name_ar error-text"></div>
                </div>
                <div class="col-12">
                    <label class="form-label w-100" for="name">{{__('main.Name')}} (English)</label>
                    <div class="input-group input-group-merge">
                        <input id="name_rate_edit_en" name="name_rate_edit_en" value="" class="form-control credit-card-mask" type="text" />
                    </div>
                    <div class="text-danger edit_name_en error-text"></div>
                </div>
                <div class="col-12">
                    <label class="form-label w-100" for="name">{{__('main.exchange_rate.Sale')}}</label>
                    <div class="input-group input-group-merge">
                        <input id="sale_edit" name="sale_edit" value="" class="form-control credit-card-mask" type="text" />
                    </div>
                    <div class="text-danger edit_sale error-text"></div>
                </div>
                <div class="col-12">
                    <label class="form-label w-100" for="name">{{__('main.exchange_rate.Buy')}}</label>
                    <div class="input-group input-group-merge">
                        <input id="buy_edit" name="buy_edit" value="" class="form-control credit-card-mask" type="text" />
                    </div>
                    <div class="text-danger edit_buy error-text"></div>
                </div>
                <div class="col-12 text-center">
                    <button type="submit" onclick="edit_rate()" class="btn add_city  menu-theme text-white me-sm-3 me-1 mt-3">{{__('main.Submit')}}</button>
                    <button type="reset"  class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">{{__('main.Cancel')}}</button>
                </div>
            </x-slot>
        </x-model>
    </div>

    <div class="modal fade" id="RateActive" tabindex="-1" aria-hidden="true">
        <x-model>
            <x-slot name="titleModel">{{__('main.Status_Edit')}}</x-slot>
            <x-slot name="model">
                <input type="hidden" id="rate_active_id" name="rate_active_id" value="">
                <div class="col-12">
                    <h1>{{__('main.Delete_Row')}}</h1>
                </div>
                <div class="col-12 text-center">
                    <button type="submit" onclick="rate_Active()" class="btn menu-theme text-white me-sm-3 me-1 mt-3">{{__('main.Submit')}}</button>
                    <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">{{__('main.Cancel')}}</button>
                </div>
            </x-slot>
        </x-model>
    </div>
    <div class="modal fade" id="RateDelete" tabindex="-1" aria-hidden="true">
        <x-model>
            <x-slot name="titleModel">{{__('main.Delete')}}</x-slot>
            <x-slot name="model">
                <input type="hidden" id="rate_delete_id" name="rate_delete_id" value="">
                <div class="col-12">
                    <h1>{{__('main.Delete_Row')}}</h1>
                </div>
                <div class="col-12 text-center">
                    <button type="submit" onclick="rate_delete()" class="btn menu-theme text-white me-sm-3 me-1 mt-3">{{__('main.Submit')}}</button>
                    <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">{{__('main.Cancel')}}</button>
                </div>
            </x-slot>
        </x-model>
    </div>

@endsection
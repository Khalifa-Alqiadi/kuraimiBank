@extends('admin.layout.app')
@push('scripts_after')
    @include('script.service-points')
    
    
@endpush
@section('content')
    <x-table>
        <x-slot name="titleName">
            <div class="success"></div>
            {{__('main.service_point.manage')}}
        </x-slot>  
        <x-slot name="button">
            <button type="button" class="btn btn-primary me-sm-3 me-1 mt-3" data-bs-toggle="modal" data-bs-target="#ServicePointAdd"> {{__('main.Add')}} </button>
        </x-slot>  
        <x-slot name="tableThead">
            <tr>
                <th>{{__('main.Name')}}</th>
                <th>{{__('main.service_point.address')}}</th>
                <th>{{__('main.service_point.phone')}}</th>
                <th>{{__('main.service_point.second_phone')}}</th>
                <th>{{__('main.service_point.working_hours')}}</th>
                <th>{{__('main.cities.City_name')}}</th>
                <th>{{__('main.Status')}}</th>
                
                <th>{{__('main.Actions')}}</th>
            </tr>
        </x-slot>  
        
        
        <x-slot name="tableTbody" >
            <tbody class="table-border-bottom-0 service-points"></tbody>
        </x-slot>
    </x-table>
    <div class="modal maps fade" id="ServicePointAdd" tabindex="-1" aria-hidden="true">
        
        <x-model>
            <x-slot name="titleModel">{{__('main.service_point.add_service_point')}}</x-slot>
            <x-slot name="model">
                {{-- Start Name --}}
                <div class="row">
                    <div class="col-6">
                        <label class="form-label w-100" for="name">{{__('main.Name')}} (Arabic)</label>
                        <div class="input-group input-group-merge">
                            <input type="text" id="service_point_name_ar" name="service_point_name_ar" value="" class="form-control credit-card-mask" placeholder="" />
                        </div>
                        <div class="text-danger add_name_ar error-text"></div>
                    </div>
                    <div class="col-6">
                        <label class="form-label w-100" for="name">{{__('main.Name')}} (English)</label>
                        <div class="input-group input-group-merge">
                            <input type="text" id="service_point_name_en" name="service_point_name_en" value="" class="form-control credit-card-mask" placeholder="" />
                        </div>
                        <div class="text-danger add_name_en error-text"></div>
                    </div>
                </div>
                {{-- End Name --}}
                {{-- Start Address --}}
                <div class="row">
                    <div class="col-6">
                        <label class="form-label w-100" for="name">{{__('main.service_point.address')}} (Arabic)</label>
                        <div class="input-group input-group-merge">
                            <input type="text" id="service_point_address_ar" name="service_point_address_en" value="" class="form-control credit-card-mask" placeholder="" />                    
                        </div>
                        <div class="text-danger add_address_ar error-text"></div>
                    </div>
                    <div class="col-6">
                        <label class="form-label w-100" for="name">{{__('main.service_point.address')}} (English)</label>
                        <div class="input-group input-group-merge">
                            <input type="text" id="service_point_address_en" name="service_point_address_en" value="" class="form-control credit-card-mask" placeholder="" />
                        </div>
                        <div class="text-danger add_address_en error-text"></div>
                    </div>
                </div>
                {{-- End Address --}}
                <div class="row">
                    {{-- Start Phone --}}
                <div class="col-6">
                    <label class="form-label w-100" for="name">{{__('main.service_point.phone')}}</label>
                    <div class="input-group input-group-merge">
                        <input type="text" id="service_point_phone" name="service_point_phone" value="" class="form-control credit-card-mask" placeholder="" />
                    </div>
                    <div class="text-danger add_phone error-text"></div>
                </div>
                {{-- End Phone --}}
                {{-- Start Second Phone --}}
                <div class="col-6">
                    <label class="form-label w-100" for="name">{{__('main.service_point.second_phone')}}</label>
                    <div class="input-group input-group-merge">
                        <input type="text" id="service_point_second_phone" name="service_point_second_phone" value="" class="form-control credit-card-mask" placeholder="" />
                    </div>
                    <div class="text-danger add_second_phone error-text"></div>
                </div>
                {{-- End Second Phone --}}
                </div>
                <div class="row">
                    {{-- Start Working Hours  --}}
                    <div class="col-6">
                        <label class="form-label w-100" for="name">{{__('main.service_point.working_hours')}} (Arabic)</label>
                        <div class="input-group input-group-merge">
                            <input type="text" id="service_point_working_hours_ar" name="service_point_working_hours_ar" value="" class="form-control credit-card-mask" placeholder="" />
                        </div>
                        <div class="text-danger add_working_hours_ar error-text"></div>
                    </div>
                    <div class="col-6">
                        <label class="form-label w-100">{{__('main.service_point.working_hours')}} (English)</label>
                        <div class="input-group input-group-merge">
                            <input type="text" id="service_point_working_hours_en" name="service_point_working_hours_en" value="" class="form-control credit-card-mask" placeholder="" />
                        </div>
                        <div class="text-danger add_working_hours_en error-text"></div>
                    </div>
                    {{-- End Working Hours  --}}
                </div>
                {{-- Start City  --}}
                <div class="col-12 ">
                    <label class="form-label" for="collapsible-state">{{__('main.cities.city_name')}}</label>
                    <select name="city_id" id="city_id" class="select2 form-select" data-allow-clear="true">
                        @foreach ($cities as $city)
                            <option value="{{$city->id}}">{{$city->name}}</option>
                        @endforeach
                    </select>
                </div>
                {{-- End City  --}}
                <div class="row">
                    <div class="col-6">
                        <label class="form-label w-100">{{__('main.service_point.working_hours')}} (English)</label>
                        <div class="input-group input-group-merge">
                            <input type="text" class="form-control" placeholder="lat" name="lat" id="lat">
                        </div>
                        <div class="text-danger add_lat error-text"></div>
                    </div>
                    <div class="col-6">
                        <label class="form-label w-100">{{__('main.service_point.working_hours')}} (English)</label>
                        <div class="input-group input-group-merge">
                            <input type="text" class="form-control" placeholder="lng" name="lng" id="lng">
                        </div>
                        <div class="text-danger add_lng error-text"></div>
                    </div>
                </div>
                <div class="mapform" >
                    <div id="map" style="height:600px; width: 1000px;" class="my-3"></div>
                </div>
                <div class="col-12 text-center">
                    <button type="submit" onclick="add_service_point()" class="btn add_city  btn-primary me-sm-3 me-1 mt-3">{{__('main.Submit')}}</button>
                    <button type="reset"  class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">{{__('main.Cancel')}}</button>
                </div>
            </x-slot>
        </x-model>
    </div>
    <div class="modal maps fade" id="ServicePointEdit" tabindex="-1" aria-hidden="true">
        <div class="  w-100 d-flex ">
            <ul class="errors-validation position-absolute"></ul>
        </div>
        <x-model>
            <x-slot name="titleModel">{{__('main.service_point.edit_service_point')}}</x-slot>
            <x-slot name="model">
                {{-- Start Name --}}
                <div class="row">
                    <input type="text" name="pointId" id="pointId" value="">
                    <div class="col-6">
                        <label class="form-label w-100" for="name">{{__('main.Name')}} (Arabic)</label>
                        <div class="input-group input-group-merge">
                            <input type="text" id="edit_service_point_name_ar" name="edit_service_point_name_ar" value="" class="form-control credit-card-mask" placeholder="" />
                        </div>
                        <div class="text-danger edit_name_ar error-text"></div>
                    </div>
                    <div class="col-6">
                        <label class="form-label w-100" for="name">{{__('main.Name')}} (English)</label>
                        <div class="input-group input-group-merge">
                            <input type="text" id="edit_service_point_name_en" name="edit_service_point_name_en" value="" class="form-control credit-card-mask" placeholder="" />
                        </div>
                        <div class="text-danger edit_name_en error-text"></div>
                    </div>
                </div>
                {{-- End Name --}}
                {{-- Start Address --}}
                <div class="row">
                    <div class="col-6">
                        <label class="form-label w-100" for="name">{{__('main.service_point.address')}} (Arabic)</label>
                        <div class="input-group input-group-merge">
                            <input type="text" id="edit_service_point_address_ar" name="edit_service_point_address_en" value="" class="form-control credit-card-mask" placeholder="" />
                        </div>
                        <div class="text-danger edit_address_ar error-text"></div>
                    </div>
                    <div class="col-6">
                        <label class="form-label w-100" for="name">{{__('main.service_point.address')}} (English)</label>
                        <div class="input-group input-group-merge">
                            <input type="text" id="edit_service_point_address_en" name="edit_service_point_address_en" value="" class="form-control credit-card-mask" placeholder="" />
                        </div>
                        <div class="text-danger edit_adderss_en error-text"></div>
                    </div>
                </div>
                {{-- End Address --}}
                <div class="row">
                    {{-- Start Phone --}}
                    <div class="col-6">
                        <label class="form-label w-100" for="name">{{__('main.service_point.phone')}}</label>
                        <div class="input-group input-group-merge">
                            <input type="text" id="edit_service_point_phone" name="edit_service_point_phone" value="" class="form-control credit-card-mask" placeholder="" />
                        </div>
                        <div class="text-danger edit_phone error-text"></div>
                    </div>
                    {{-- End Phone --}}
                    {{-- Start Second Phone --}}
                    <div class="col-6">
                        <label class="form-label w-100" for="name">{{__('main.service_point.second_phone')}}</label>
                        <div class="input-group input-group-merge">
                            <input type="text" id="edit_service_point_second_phone" name="edit_service_point_second_phone" value="" class="form-control credit-card-mask" placeholder="" />
                        </div>
                        <div class="text-danger edit_second_phone error-text"></div>
                    </div>
                    {{-- End Second Phone --}}
                </div>
                {{-- Start Working Hours  --}}
                <div class="row">
                    <div class="col-6">
                        <label class="form-label w-100" for="name">{{__('main.service_point.working_hours')}} (Arabic)</label>
                        <div class="input-group input-group-merge">
                            <input type="text" id="edit_service_point_working_hours_ar" name="edit_service_point_working_hours_ar" value="" class="form-control credit-card-mask" placeholder="" />
                        </div>
                        <div class="text-danger edit_working_hours_ar error-text"></div>
                    </div>
                    <div class="col-6">
                        <label class="form-label w-100" for="name">{{__('main.service_point.working_hours')}} (English)</label>
                        <div class="input-group input-group-merge">
                            <input type="text" id="edit_service_point_working_hours_en" name="edit_service_point_working_hours_en" value="" class="form-control credit-card-mask" placeholder="" />
                        </div>
                        <div class="text-danger edit_working_hours_en error-text"></div>
                    </div>
                </div>
                {{-- End Working Hours  --}}
                {{-- Start City  --}}
                <div class="col-12 ">
                    <label class="form-label" for="collapsible-state">{{__('main.cities.city_name')}}</label>
                    <select name="city_id" id="city_id" class="select2 form-select" data-allow-clear="true">
                        @foreach ($cities as $city)
                            <option value="{{$city->id}}">{{$city->name}}</option>
                        @endforeach
                    </select>
                </div>
                {{-- End City  --}}
                <div class="row">
                    <div class="col-6">
                        <label class="form-label w-100">{{__('main.service_point.working_hours')}} (English)</label>
                        <div class="input-group input-group-merge">
                            <input type="text" class="form-control" placeholder="lat" name="edit_lat" id="edit_lat">
                        </div>
                        <div class="text-danger edit_lat error-text"></div>
                    </div>
                    <div class="col-6">
                        <label class="form-label w-100">{{__('main.service_point.working_hours')}} (English)</label>
                        <div class="input-group input-group-merge">
                            <input type="text" class="form-control" placeholder="lng" name="edit_lng" id="edit_lng">
                        </div>
                        <div class="text-danger edit_lng error-text"></div>
                    </div>
                </div>
                <div class="mapform" >
                    <div id="map2" style="height:600px; width: 1000px;" class="my-3"></div>
                </div>
                <div class="col-12 text-center">
                    <button type="submit" onclick="UpdateServicePoint()" class="btn add_city  btn-primary me-sm-3 me-1 mt-3">{{__('main.Submit')}}</button>
                    <button type="reset"  class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">{{__('main.Cancel')}}</button>
                </div>
            </x-slot>
        </x-model>
    </div>

    <div class="modal fade" id="ServicePointActives" tabindex="-1" aria-hidden="true">
        <x-model>
            <x-slot name="titleModel">{{__('main.Status_Edit')}}</x-slot>
            <x-slot name="model">
                  <input type="hidden" id="point_id" name="point_id" value="">
                    <div class="col-12">
                      <h1>{{__('main.Delete_Row')}}</h1>
                    </div>
                    <div class="col-12 text-center">
                      <button type="submit" id="ServicePointActive" class="btn btn-primary me-sm-3 me-1 mt-3">{{__('main.Submit')}}</button>
                      <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">{{__('main.Cancel')}}</button>
                    </div>
            </x-slot>
        </x-model>
    </div>
    <div class="modal fade" id="ServicePointDelete" tabindex="-1" aria-hidden="true">
        <x-model>
            <x-slot name="titleModel">{{__('main.Delete')}}</x-slot>
            <x-slot name="model">
                  <input type="hidden" id="point_delete_id" name="point_delete_id" value="">
                    <div class="col-12">
                      <h1>{{__('main.Delete_Row')}}</h1>
                    </div>
                    <div class="col-12 text-center">
                      <button type="submit" onclick="ServicePointDelete()" class="btn btn-primary me-sm-3 me-1 mt-3">{{__('main.Submit')}}</button>
                      <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">{{__('main.Cancel')}}</button>
                    </div>
            </x-slot>
        </x-model>
    </div>
    
@endsection
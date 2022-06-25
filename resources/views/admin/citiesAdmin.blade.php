@extends('admin.layout.app')
@section('content')
    @push('scripts_after')
        @include('script.cities-script')
    @endpush
    <div class="success"></div>
    <x-table>
        <x-slot name="titleName">
                {{__('main.cities.Manage')}}
        </x-slot>  
        <x-slot name="button">
            <button type="button" class="btn btn-primary me-sm-3 me-1 mt-3" data-bs-toggle="modal" data-bs-target="#CityAdd"> {{__('main.Add')}} </button>
        </x-slot>  
        <x-slot name="tableThead">
            <tr>
                <th>{{__('main.Name')}}</th>
                <td>{{__('main.cities.Name_Country')}}</td>
                <th>{{__('main.Status')}}</th>
                <th>{{__('main.Actions')}}</th>
            </tr>
        </x-slot>  
        
        
        <x-slot name="tableTbody" >
            <tbody class="table-border-bottom-0 cities-list"></tbody>
        </x-slot>
    </x-table>
<div class="modal fade" id="CityAdd" tabindex="-1" aria-hidden="true">
    <div class="  w-100 d-flex ">
        <ul class="errors-validation position-absolute"></ul>
    </div>
    <x-model>
        <x-slot name="titleModel">{{__('main.cities.Add')}}</x-slot>
        <x-slot name="model">
            <div class="col-12">
                <label class="form-label w-100" for="name">{{__('main.Name')}} (Arabic)</label>
                <div class="input-group input-group-merge">
                  <input type="text" id="city_name_ar" name="name_ar" value="" class="form-control credit-card-mask" placeholder="" />
                </div>
                <div class="text-danger add_name_ar error-text"></div>
            </div>
            <div class="col-12">
                <label class="form-label w-100" for="name">{{__('main.Name')}} (English)</label>
                <div class="input-group input-group-merge">
                  <input type="text" id="city_name_en" name="name_en" value="" class="form-control credit-card-mask" placeholder="" />
                </div>
                <div class="text-danger add_name_en error-text"></div>
            </div>
            <div class="col-12 ">
                <label class="form-label" for="collapsible-state">{{__('main.cities.Name_Country')}}</label>
                <select name="country_id" id="country_id" class="select2 form-select" data-allow-clear="true">
                    @foreach ($countries as $country)
                        <option value="{{$country->id}}">{{$country->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 text-center">
                <button type="submit" onclick="add_city()" class="btn add_city  btn-primary me-sm-3 me-1 mt-3">{{__('main.Submit')}}</button>
                <button type="reset"  class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">{{__('main.Cancel')}}</button>
            </div>
        </x-slot>
    </x-model>
</div>

<div class="modal fade" id="CityEdite" tabindex="-1" aria-hidden="true">
    <x-model>
        <x-slot name="titleModel">{{__('main.cities.Edit')}}</x-slot>
        <x-slot name="model">
                <input type="hidden" id="cityid" name="cityid" value="" class="form-control credit-card-mask" type="text" />
                <div class="col-12">
                  <label class="form-label w-100" for="modalAddCard">{{__('main.Name')}} (Arabic)</label>
                  <div class="input-group input-group-merge">
                    <input id="city_name_ar_edit" name="city_name_ar_edit" value="" class="form-control credit-card-mask" type="text" />
                  </div>
                  <div class="text-danger edit_name_ar error-text"></div>
                </div>
                <div class="col-12">
                  <label class="form-label w-100">{{__('main.Name')}} (English)</label>
                  <div class="input-group input-group-merge">
                    <input id="city_name_en_edit" name="city_name_ar_edit" value="" class="form-control credit-card-mask" type="text" />
                  </div>
                  <div class="text-danger edit_name_en error-text"></div>
                </div>
                <div class="col-12 ">
                    <label class="form-label" for="collapsible-state">{{__('main.cities.Name_Country')}}</label>
                    <select name="country_id" id="country_id" class="select2 form-select" data-allow-clear="true">
                        @foreach ($countries as $country)
                            <option value="{{$country->id}}">{{$country->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 text-center">
                  <button type="submit" onclick="UpdateCity()" class="btn btn-primary me-sm-3 me-1 mt-3">{{__('main.Submit')}}</button>
                  <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">{{__('main.Cancel')}}</button>
                </div>
            </form>
        </x-slot>
    </x-model>
</div>

<div class="modal fade" id="CityActive" tabindex="-1" aria-hidden="true">
  <x-model>
      <x-slot name="titleModel">{{__('main.Status_Edit')}}</x-slot>
      <x-slot name="model">
            <input type="hidden" id="city_id" name="city_id" value="">
              <div class="col-12">
                <h1>{{__('main.Delete_Row')}}</h1>
              </div>
              <div class="col-12 text-center">
                <button type="submit" onclick="City_Active()" class="btn btn-primary me-sm-3 me-1 mt-3">{{__('main.Submit')}}</button>
                <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">{{__('main.Cancel')}}</button>
              </div>
      </x-slot>
  </x-model>
</div>
<div class="modal fade" id="CityDelete" tabindex="-1" aria-hidden="true">
  <x-model>
      <x-slot name="titleModel">{{__('main.cities.Delete')}}</x-slot>
      <x-slot name="model">
            <input type="hidden" id="city_id_delete" name="city_id_delete" value="">
              <div class="col-12">
                <h1>{{__('main.Delete_Row')}}</h1>
              </div>
              <div class="col-12 text-center">
                <button type="submit" onclick="City_Delete()" class="btn btn-primary me-sm-3 me-1 mt-3">{{__('main.Submit')}}</button>
                <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">{{__('main.Cancel')}}</button>
              </div>
      </x-slot>
  </x-model>
</div>
@endsection

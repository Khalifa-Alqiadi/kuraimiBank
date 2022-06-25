@extends('admin.layout.app')
@section('content')
@push('scripts_after')
    @include('script.countries-script')
@endpush
  <div class="success"></div>
  <x-table>
      <x-slot name="titleName">
              {{__('main.countries.Manage')}}
      </x-slot>  
      <x-slot name="button">
          <button type="button" class="btn btn-primary me-sm-3 me-1 mt-3" data-bs-toggle="modal" data-bs-target="#CountryAdd"> {{__('main.Add')}} </button>
      </x-slot>  
      <x-slot name="tableThead">
          <tr>
              <th>{{__('main.Name')}}</th>
              <th>{{__('main.Status')}}</th>
              <th>{{__('main.Actions')}}</th>
            </tr>
      </x-slot>  
      <x-slot name="tableTbody" >
          <tbody class="table-border-bottom-0 countries-list"></tbody>
      </x-slot> 
  </x-table>

  <div class="modal fade" id="CountryAdd" tabindex="-1" aria-hidden="true">
      <div class="w-100 d-flex ">
          <ul class="errors-validation position-absolute"></ul>
      </div>
      <x-model>
          <x-slot name="titleModel">{{__('main.countries.Add')}}</x-slot>
          <x-slot name="model">
              <div class="col-12">
                  <label class="form-label w-100" for="name">{{__('main.Name')}}</label>
                  <div class="input-group input-group-merge">
                    <input type="text" id="add_name_country_ar" name="add_name_country_ar" value="" class="form-control credit-card-mask" placeholder="" />
                  </div>
                  <div class="text-danger name_ar error-text"></div>
              </div>
              <div class="col-12">
                  <label class="form-label w-100" for="name">{{__('main.Name')}}</label>
                  <div class="input-group input-group-merge">
                    <input type="text" id="add_name_country_en" name="add_name_country_en" value="" class="form-control credit-card-mask" placeholder="" />
                  </div>
                  <div id="" class="text-danger name_en  error-text"></div>
              </div>
              <div class="col-12 text-center">
                <button type="submit" id="countryAdd" onclick="countryAdd()" class="btn btn-primary me-sm-3 me-1 mt-3">{{__('main.Submit')}}</button>
                <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">{{__('main.Cancel')}}</button>
              </div>
          </x-slot>
      </x-model>
  </div>

  <div class="modal fade" id="CountryEdite" tabindex="-1" aria-hidden="true">
      <x-model>
          <x-slot name="titleModel">{{__('main.countries.Edit')}}</x-slot>
          <x-slot name="model">
              {{-- <form action="UpdateCountry"  method="POST" class="row g-3 UpdateCountry"> --}}
                  <input type="hidden" id="countryid" name="countryid" value="" class="form-control credit-card-mask" type="text" />
                  <div class="col-12">
                    <label class="form-label w-100" for="modalAddCard">{{__('main.Name')}} (Arabic)</label>
                    <div class="input-group input-group-merge">
                      <input id="name_country_ar_edit" name="name_ar" value="" class="form-control credit-card-mask" type="text" />
                    </div>
                    <div class="text-danger edit_name_ar cursor-pointer p-1"></div>
                  </div>
                  <div class="col-12">
                    <label class="form-label w-100" for="modalAddCard">{{__('main.Name')}} (English)</label>
                    <div class="input-group input-group-merge">
                      <input id="name_country_en_edit" name="name_en" value="" class="form-control credit-card-mask" type="text" />
                    </div>
                    <div class="text-danger edit_name_en cursor-pointer p-1"></div>
                  </div>
                  <div class="col-12 text-center">
                    <button type="submit" onclick="UpdateCountry()" class="btn btn-primary me-sm-3 me-1 mt-3">{{__('main.Submit')}}</button>
                    <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">{{__('main.Cancel')}}</button>
                  </div>
              </form>
          </x-slot>
      </x-model>
  </div>

  <div class="modal fade" id="CountryActive" tabindex="-1" aria-hidden="true">
    <x-model>
        <x-slot name="titleModel">{{__('main.Status_Edit')}}</x-slot>
        <x-slot name="model">
              <input type="hidden" id="country_id" name="countryid" value="">
                <div class="col-12">
                  <h1>{{__('main.Delete_Row')}}</h1>
                </div>
                <div class="col-12 text-center">
                  <button type="submit" onclick="CountryUpdateActive()" class="btn btn-primary me-sm-3 me-1 mt-3">{{__('main.Submit')}}</button>
                  <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">{{__('main.Cancel')}}</button>
                </div>
        </x-slot>
    </x-model>
  </div>
  <div class="modal fade" id="CountryDelete" tabindex="-1" aria-hidden="true">
    <x-model>
        <x-slot name="titleModel">{{__('main.countries.Country_Delete')}}</x-slot>
        <x-slot name="model">
              <input type="hidden" id="delete_country_id" name="countryid" value="">
                <div class="col-12">
                  <h1>{{__('main.Delete_Row')}}</h1>
                </div>
                <div class="col-12 text-center">
                  <button type="submit" onclick="Country_Delete()" class="btn btn-primary me-sm-3 me-1 mt-3">{{__('main.Submit')}}</button>
                  <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">{{__('main.Cancel')}}</button>
                </div>
        </x-slot>
    </x-model>
  </div>
@endsection
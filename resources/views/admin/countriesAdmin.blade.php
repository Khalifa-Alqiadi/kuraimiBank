@extends('admin.layout.app')
@section('content')


<x-table>
    <x-slot name="titleName">
            {{__('country.titleCountry')}}
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
        <tbody class="table-border-bottom-0 countries-list">
        {{-- @foreach ($categories as $category)
            
        @endforeach --}}
    </tbody>
    </x-slot>
      
</x-table>

{{-- <div class="modal fade" id="CategoryActive" tabindex="-1" aria-hidden="true">
  <x-model>
      <x-slot name="titleModel">{{__('categories.Category_Delete')}}</x-slot>
      <x-slot name="model">
          <form class="row g-3 CategoryActive" action="CategoryActive" method="POST">
            <input type="hidden" id="category_id" name="categoryid" value="">
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
</div> --}}
<div class="modal fade" id="CountryAdd" tabindex="-1" aria-hidden="true">
    <div class="  w-100 d-flex ">
        <ul class="errors-validation position-absolute">
            

        </ul>
    </div>
    <x-model>
        <x-slot name="titleModel">{{__('country.Add_Country')}}</x-slot>
        <x-slot name="model">
            <form action="add_country" class="add_country_admin"  method="POST" class="row g-3">
                @csrf
                @foreach (config('locales.languages') as $key => $value)
                    <div class="col-12">
                        <label class="form-label w-100" for="name">{{__('main.Name')}} ({{$value['name']}})</label>
                        <div class="input-group input-group-merge">
                        <input type="text" name="name[{{$key}}]" value="{{old('name.'. $key)}}" class="form-control credit-card-mask" placeholder="" />
                        <div class="text-danger error-text"></div>
                        
                        </div>
                    </div>
                @endforeach
                <div class="col-12 text-center">
                  <button type="submit" class="btn btn-primary me-sm-3 me-1 mt-3">{{__('main.Submit')}}</button>
                  <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">{{__('main.Cancel')}}</button>
                </div>
            </form>
        </x-slot>
    </x-model>
</div>

<div class="modal fade" id="CountryEdite" tabindex="-1" aria-hidden="true">
    <x-model>
        <x-slot name="titleModel">{{__('country.Edit_Country')}}</x-slot>
        <x-slot name="model">
            <form action="UpdateCountry"  method="POST" class="row g-3 UpdateCountry">
                <input type="hidden" id="countryid" name="countryid" value="" class="form-control credit-card-mask" type="text" />
                <div class="col-12">
                  <label class="form-label w-100" for="modalAddCard">{{__('main.Name')}} (Arabic)</label>
                  <div class="input-group input-group-merge">
                    <input id="nameCountryAr" name="name[ar]" value="" class="form-control credit-card-mask" type="text" />
                    <span class="input-group-text cursor-pointer p-1" id="modalAddCard2"><span class="card-type"></span></span>
                  </div>
                </div>
                <div class="col-12">
                  <label class="form-label w-100" for="modalAddCard">{{__('main.Name')}} (English)</label>
                  <div class="input-group input-group-merge">
                    <input id="nameCountryEn" name="name[en]" value="" class="form-control credit-card-mask" type="text" />
                    <span class="input-group-text cursor-pointer p-1" id="modalAddCard2"><span class="card-type"></span></span>
                  </div>
                </div>
                <div class="col-12 text-center">
                  <button type="submit" class="btn btn-primary me-sm-3 me-1 mt-3">{{__('main.Submit')}}</button>
                  <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">{{__('main.Cancel')}}</button>
                </div>
            </form>
        </x-slot>
    </x-model>
</div>
@endsection


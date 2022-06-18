@extends('admin.layout.app')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
@error('name')
    <span class="text-danger">{{$message}}</span>
@enderror
<x-table>
    <x-slot name="titleName">
            {{__('categories.titleCategory')}}
    </x-slot>  
    <x-slot name="button">
        <button type="button" class="btn btn-primary me-sm-3 me-1 mt-3" data-bs-toggle="modal" data-bs-target="#CategoryAdd"> {{__('main.Add')}} </button>
    </x-slot>  
    <x-slot name="tableThead">
        <tr>
            <th>{{__('main.Name')}}</th>
            <th>{{__('categories.Parent')}}</th>
            <th>{{__('main.Status')}}</th>
            <th>{{__('main.Actions')}}</th>
        </tr>
    </x-slot>
    
    <x-slot name="tableTbody">
        <tbody class="table-border-bottom-0 categories-list"> 
        </tbody>
    </x-slot> 
 
</x-table>
<div class="modal fade" id="CategoryEdite" tabindex="-1" aria-hidden="true">
    <x-model>
        <x-slot name="titleModel">{{__('categories.Add_Category')}}</x-slot>
        <x-slot name="model">
            <form action="UpdateCategory" method="POST" class="row g-3 UpdateCategory">
                <input id="cid" name="cid" value="" class="form-control credit-card-mask" type="text" />
                <div class="col-12">
                  <label class="form-label w-100" for="modalAddCard">{{__('categories.Category_name')}}</label>
                  <div class="input-group input-group-merge">
                    <input id="nameAr" name="name[ar]" value="" class="form-control credit-card-mask" type="text" />
                    <span class="input-group-text cursor-pointer p-1" id="modalAddCard2"><span class="card-type"></span></span>
                  </div>
                </div>
                <div class="col-12">
                  <label class="form-label w-100" for="modalAddCard">{{__('categories.Category_name')}}</label>
                  <div class="input-group input-group-merge">
                    <input id="nameEn" name="name[en]" value="" class="form-control credit-card-mask" type="text" />
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
<div class="modal fade" id="CategoryActive" tabindex="-1" aria-hidden="true">
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
</div>
<div class="modal fade" id="CategoryAdd" tabindex="-1" aria-hidden="true">
    <div class="  w-100 d-flex ">
        <ul class="errors-validation position-absolute">
            

        </ul>
    </div>
    <x-model>
        <x-slot name="titleModel">{{__('categories.Add_Category')}}</x-slot>
        <x-slot name="model">
            <form action="add_category" id="add_category" method="POST" class="row g-3">
                @csrf
                @foreach (config('locales.languages') as $key => $value)
                    <div class="col-12">
                        <label class="form-label w-100" for="name">{{__('categories.Category_name')}} ({{$value['name']}})</label>
                        <div class="input-group input-group-merge">
                        <input type="text" name="name[{{$key}}]" value="{{old('name.'. $key)}}" class="form-control credit-card-mask" placeholder="" />
                        <div class="text-danger error-text name.ar"></div>
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>
                    </div>
                @endforeach
                
                <div class="col-12 ">
                    <label class="form-label" for="collapsible-state">State</label>
                    <select name="parent" id="collapsible-state" class="select2 form-select" data-allow-clear="true">
                        <option value="0">Null</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
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


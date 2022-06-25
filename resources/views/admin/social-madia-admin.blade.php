@extends('admin.layout.app')
@section('content')

@push('scripts_after')
    @include('script.social-media-script')
@endpush

<x-table>
    <x-slot name="titleName">
        <div class="success"></div>
        {{__('main.social_media.Manage')}}
    </x-slot>  
    <x-slot name="button">
        <button type="button" class="btn btn-primary me-sm-3 me-1 mt-3" data-bs-toggle="modal" data-bs-target="#MediaAdd"> {{__('main.Add')}} </button>
    </x-slot>  
    <x-slot name="tableThead">
        <tr>
            <th>{{__('main.Name')}}</th>
            <th>{{__('main.social_media.Link')}}</th>
            <th>{{__('main.social_media.Icons')}}</th>
            <th>{{__('main.Status')}}</th>
            <th>{{__('main.Actions')}}</th>
        </tr>
    </x-slot>  
    
    
    <x-slot name="tableTbody" >
        <tbody class="table-border-bottom-0 social-media-list"></tbody>
    </x-slot>
</x-table>
<div class="modal fade" id="MediaAdd" tabindex="-1" aria-hidden="true">
    <x-model>
        <x-slot name="titleModel">{{__('main.social_media.Add')}}</x-slot>
        <x-slot name="model">
            
            <div class="mb-3 col-md-12">
                <label class="form-label">{{__('main.Name')}} (Arabic)</label>
                <input type="text" id="media_name_ar" name="media_name_ar" class="form-control" id="basic-default-fullname" placeholder="John Doe" />
                <div class=" add_name_ar text-danger"></div>
            </div>
            <div class="mb-3 col-md-12">
                <label class="form-label">{{__('main.Name')}} (English)</label>
                <input type="text" id="media_name_en" name="media_name_en" class="form-control" placeholder="" />
                <div class=" add_name_en text-danger"></div>
            </div>
            <div class="mb-3 col-md-12">
                <label class="form-label">{{__('main.social_media.Link')}} (English)</label>
                <input type="text" id="link" name="link" class="form-control" placeholder="" />
                <div class=" add_link text-danger"></div>
            </div>
            <div class="mb-3 col-md-12">
                <label class="form-label">{{__('main.social_media.Icons')}}</label>
                {{-- <input type="text" id="service_name_en" name="service_name_en" class="form-select" placeholder="" /> --}}
                <select name="icons" id="icons" class="form-select">
                    <option value="fa fa-location-arrow" class="fa">&#xf124 (location)</option>
                    <option value="fa fa-globe" class="fa">&#xf0ac  (site)</option>
                    <option value="fa fa-envelope" class="fa">&#xf0e0  (email)</option>
                    <option value="fa fa-mobile" class="fa">&#xf10b  (mobile)</option>
                    <option value="fa fa-phone" class="fa">&#xf095  (phone)</option>
                    <option value="fa fa-instagram" class="fa">&#xf16d  (instagram)</option>
                    <option value="fa fa-whatsapp" class="fa">&#xf232  (whatsapp)</option>
                    <option value="fa fa-twitter" class="fa">&#xf099  (twitter)</option>
                    <option value="fa fa-facebook" class="fa">&#xf082  (facebook)</option>
                </select>
                <span class=" add_icons text-danger"></span>
            </div>
            <div class="col-12 text-center">
                <button type="submit" onclick="addMedia()" class="btn btn-primary me-sm-3 me-1 mt-3">{{__('main.Submit')}}</button>
                <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">{{__('main.Cancel')}}</button>
            </div>
        </x-slot>
    </x-model>
</div>
<div class="modal fade" id="MediaEdit" tabindex="-1" aria-hidden="true">
    <x-model>
        <x-slot name="titleModel">{{__('main.Status_Edit')}}</x-slot>
        <x-slot name="model">
            {{-- <form action="{{route('add_social_media')}}" method="post">
                @csrf --}}
                <input type="hidden" id="edit_media_id" name="edit_media_id" value="" />
                <div class="mb-3 col-md-12">
                    
                    <label class="form-label">{{__('main.Name')}} (Arabic)</label>
                    <input type="text" id="edit_media_name_ar" name="edit_media_name_ar" class="form-control" id="basic-default-fullname" placeholder="John Doe" />
                    <div class=" edit_name_ar text-danger"></div>
                </div>
                <div class="mb-3 col-md-12">
                    <label class="form-label">{{__('main.Name')}} (English)</label>
                    <input type="text" id="edit_media_name_en" name="edit_media_name_en" class="form-control" placeholder="" />
                    <div class="text-end edit_name_en text-danger"></div>
                </div>
                <div class="mb-3 col-md-12">
                    <label class="form-label">{{__('main.social_media.Link')}} (English)</label>
                    <input type="text" id="edit_link" name="edit_link" class="form-control" placeholder="" />
                    <div class="text-end edit_link text-danger"></div>
                </div>
                <div class="mb-3 col-md-12">
                    <label class="form-label">{{__('main.social_media.Icons')}}</label>
                    {{-- <input type="text" id="service_name_en" name="service_name_en" class="form-select" placeholder="" /> --}}
                    <select name="edit_icons" id="edit_icons" class="form-select">
                        <option value="fa fa-location-arrow" class="fa">&#xf124 (location)</option>
                        <option value="fa fa-globe" class="fa">&#xf0ac  (site)</option>
                        <option value="fa fa-envelope" class="fa">&#xf0e0  (email)</option>
                        <option value="fa fa-mobile" class="fa">&#xf10b  (mobile)</option>
                        <option value="fa fa-phone" class="fa">&#xf095  (phone)</option>
                        <option value="fa fa-instagram" class="fa">&#xf16d  (instagram)</option>
                        <option value="fa fa-whatsapp" class="fa">&#xf232  (whatsapp)</option>
                        <option value="fa fa-twitter" class="fa">&#xf099  (twitter)</option>
                        <option value="fa fa-facebook" class="fa">&#xf082  (facebook)</option>
                    </select>
                    <span class="text-end eidt_icons text-danger"></span>
                </div>
                <div class="col-12 text-center">
                    <button type="button" onclick="updateSocialMedia()" class="btn btn-primary me-sm-3 me-1 mt-3">{{__('main.Submit')}}</button>
                    <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">{{__('main.Cancel')}}</button>
                </div>
            {{-- </form> --}}
        </x-slot>
    </x-model>
</div>
<div class="modal fade" id="MediaActive" tabindex="-1" aria-hidden="true">
    <x-model>
        <x-slot name="titleModel">{{__('main.Status_Edit')}}</x-slot>
        <x-slot name="model">
            {{-- <form action="serviceActive" method="post"> --}}
                <input type="hidden" id="media_active_id" name="media_active_id" value="">
                <div class="col-12">
                  <h1>{{__('main.Delete_Row')}}</h1>
                </div>
                <div class="col-12 text-center">
                  <button type="submit" onclick="socialMediaActive()" class="btn btn-primary me-sm-3 me-1 mt-3">{{__('main.Submit')}}</button>
                  <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">{{__('main.Cancel')}}</button>
                </div>
            {{-- </form> --}}
        </x-slot>
    </x-model>
</div>

<div class="modal fade" id="MediaDelete" tabindex="-1" aria-hidden="true">
    <x-model>
        <x-slot name="titleModel">{{__('main.Status_Edit')}}</x-slot>
        <x-slot name="model">
            {{-- <form action="mediaDelete" method="post"> --}}
                <input type="hidden" id="media_delete_id" name="media_delete_id" value="">
                <div class="col-12">
                  <h1>{{__('main.Delete_Row')}}</h1>
                </div>
                <div class="col-12 text-center">
                  <button type="submit" onclick="socialMediaDelete()" class="btn btn-primary me-sm-3 me-1 mt-3">{{__('main.Submit')}}</button>
                  <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">{{__('main.Cancel')}}</button>
                </div>
            {{-- </form> --}}
        </x-slot>
    </x-model>
</div>

@endsection

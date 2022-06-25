@extends('admin.layout.app')
@section('content')
@push('scripts_after')
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('value_ar');
        CKEDITOR.replace('value_en');
    </script>
    {{-- @include('script.services') --}}
@endpush
@if(session('success'))
    <x-alert>
        <div class="show-success fs-4">{{session('success')}}</div>
    </x-alert>
@endif
<x-row>
    <x-slot name="title">{{__('main.website.Add_Info')}}</x-slot>
    <x-slot name="form">
        <form action="{{route('update-info')}}" method="post">
            @csrf
            <div class="row">
                <input type="hidden" name="id" value="{{$info->id}}">
                <div class="mb-3 col-md-12">
                    <label class="form-label">{{__('main.website.Key')}} (Arabic)</label>
                    <input type="text" id="key" name="key" value="{{$info->key}}" class="form-control" id="basic-default-fullname" placeholder="John Doe" />
                    @error('key')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                
                <div class="mb-3 col-md-12">
                    <label class="form-label">{{__('main.website.Value')}} (Arabic)</label>
                    <textarea id="value_ar" name="value_ar" class="ckeditor form-control">{{$info->getTranslation('value', 'ar')}}</textarea>
                    @error('value_ar')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                
                <div class="mb-3 col-md-12">
                    <label class="form-label">{{__('main.website.Value')}} (English)</label>
                    <textarea id="value_en" name="value_en"  class="ckeditor form-control">{{$info->getTranslation('value', 'en')}}</textarea>
                    @error('value_en')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                
            </div>
            
            <button type="submit" class="btn menu-theme text-white">Send</button>
        </form>
    </x-slot>
</x-row>
    
@endsection
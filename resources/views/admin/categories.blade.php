@extends('admin.layout.app')
@section('content')
<x-table>
    <x-slot name="titleName">
            {{__('categories.titleCategory')}}
    </x-slot>  
    <x-slot name="tableThead">
        <tr>
            <th>{{__('categories.Name')}}</th>
            <th>{{__('categories.Parent')}}</th>
            <th>{{__('categories.Status')}}</th>
            <th>{{__('categories.Actions')}}</th>
          </tr>
    </x-slot>  
    <x-slot name="tableTbody">
        
            @foreach ($categories as $category)
            <tr>
                <td>{{$category->name}}</td>
                @if ($category->parent_category == 0)
                    <td>{{__('categories.Main_Parent')}}</td>
                @else
                    <td>{{__('categories.Main_Parent')}}</td>
                @endif
                <td><span class="badge bg-label-primary me-1">Active</span></td>
                <td>
                    <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-2"></i> Edit</a>
                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-2"></i> Delete</a>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
    </x-slot>  
</x-table>
  
@endsection
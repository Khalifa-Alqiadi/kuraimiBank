@extends('admin.layout.home')
@section('content')
<h1 class="text-center">ادارة التصنيفات</h1>
            <div class="container categories">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-edit"></i> ادارة التصنيفات
                        <div class="option pull-right">
                            <i class="fa fa-sort"></i> ترتيب: [  
                            <a class="" href="?sort=ASC"> تصاعدي</a> | 
                            <a class="" href="?sort=DESC">تنازلي</a> ]
                            <i class="fa fa-eye"></i> عرض: [
                            <span class="active" data-view="full">كامل</span> | 
                            <span data-view="classic">كلاسيك</span> ]
                        </div>
                    </div>
                    
                    <div class="card-body">
                                <div class="cat">
                                    <div class="hidden-button">
                                        <a href=" " class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> تعديل</a>
                                        <a href="" class="confirm btn btn-xs btn-danger"><i class="fa fa-close"></i> حذف</a>
                                    </div>
                                    <h3>خدمات الافراد</h3>
                                    <div class='full-view'>
                                        
                                            <h5 class="light mt-2 me-2 fs-6">التصنيفات الفرعية</h5>
                                            <ul class='list-unstyled child-cats'>
                                                    <li class='child-link'>
                                                        <a href='' class="text-primary">الحسابات البنكية</a>
                                                        <a href='' class='confirm child-delete'> حذف</a>
                                                    </li>
                                                
                                            </ul>
                                    </div>
                                </div>
                                <hr>
                                <div class="cat">
                                    <div class="hidden-button">
                                        <a href=" " class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> تعديل</a>
                                        <a href="" class="confirm btn btn-xs btn-danger"><i class="fa fa-close"></i> حذف</a>
                                    </div>
                                    <h3>خدمات الافراد</h3>
                                    <div class='full-view'>
                                        
                                            <h5 class="light mt-2 me-2 fs-6">التصنيفات الفرعية</h5>
                                            <ul class='list-unstyled child-cats'>
                                                    <li class='child-link'>
                                                        <a href='' class="text-primary">الحسابات البنكية</a>
                                                        <a href='' class='confirm child-delete'> حذف</a>
                                                    </li>
                                                
                                            </ul>
                                    </div>
                                </div>
                                <hr>
                                <div class="cat">
                                    <div class="hidden-button">
                                        <a href=" " class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> تعديل</a>
                                        <a href="" class="confirm btn btn-xs btn-danger"><i class="fa fa-close"></i> حذف</a>
                                    </div>
                                    <h3>خدمات الافراد</h3>
                                    <div class='full-view'>
                                        
                                            <h5 class="light mt-2 me-2 fs-6">التصنيفات الفرعية</h5>
                                            <ul class='list-unstyled child-cats'>
                                                    <li class='child-link'>
                                                        <a href='' class="text-primary">الحسابات البنكية</a>
                                                        <a href='' class='confirm child-delete'> حذف</a>
                                                    </li>
                                                
                                            </ul>
                                    </div>
                                </div>
                                <hr>
                    </div>
                </div>
                <a class="add-category btn btn-primary" href=""><i class="fa fa-plus"></i> Add New</a>
            </div>

@endsection
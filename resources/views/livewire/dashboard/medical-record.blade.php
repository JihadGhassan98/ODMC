<div>
<main class="medical-records" dir="{{App::isLocale('ar') ? 'rtl':'ltr'}}">
<span class="db-body__saperator">{{App::isLocale('ar')? 'السجل الطبي':'Medical Record'}}</span>

<form action="{{url('/uploadMedicalFile/'.Auth::user()->id)}}" enctype="multipart/form-data" method="POST" class="medical-records__table">
    @csrf
<span class="medical-records__table--title">{{App::isLocale('ar')? 'السجل الحالي':'Current Record'}}</span>
@if(Auth::user()->medical_record_path != null)
<div class="medical-records__table--rows">
    <div class="row">
    <span class="data-field">{{Auth::user()->medical_record_path}}</span>
    <a href="/medicalReports/{{Auth::user()->medical_record_path}}" download class="data-download">{{App::isLocale('ar')? 'تنزيل':'Download'}}</a>
    <button wire:click="deleteMedicalFile({{Auth::user()->id}})" type="button" class="data-delete">{{App::isLocale('ar')? 'حذف':'Delete'}}</button>
    </div>
  <b wire:loading>{{App::isLocale('ar')? 'جار الحذف...':'Deleteing...'}}</b>
</div>
@else
<div class="medical-records__table--rows">
    <div class="row">
    <span class="data-field">{{App::isLocale('ar')? 'لم يتم اضافة سجل طبي':'No Medical Record Was Added'}}</span>
  
    </div>
  
</div>

@endif

<label for="pdfFile"  id="pdfLabel" class="data-add">{{App::isLocale('ar')? 'تحميل سجل جديد':'Upload A New Record'}}</label>
<input id="pdfFile" onchange="showFileName(event)" name="medicalFile" class="data-input-h" type="file" accept=".pdf" >
<button disabled id="submitFile" class="data-submit shady-btn">{{App::isLocale('ar')? 'حفظ':'Save'}}</button>


</form>

<span class="db-body__saperator">{{App::isLocale('ar')? 'الحساسيات والأدوية':'Allergies And Medicines'}}</span>
<div class="medical-records__specs">

<div class="medical-records__specs--table">
<span class="medical-records__specs--title">{{App::isLocale('ar')? 'الحساسيات':'Allergies'}}</span>
@foreach($allergies as $allergy)
<span class="table-item">{{App::isLocale('ar')? $allergy->name_ar:$allergy->name_en }}<button wire:click="deleteAllergy({{$allergy->id}})" class="table-delete"><i class="fa fa-trash" aria-hidden="true"></i></button></span>
@endforeach
<span class="table-item">
<input type="text" class="table-add" placeholder="{{App::isLocale('ar')? 'أدخل اسم الحساسية باللغة العربية':'Enter Allergy Name In Arabic'}}" wire:model="allergyName_ar">
<input type="text" class="table-add" placeholder="{{App::isLocale('ar')? 'أدخل اسم الحساسية باللغة الإنجليزية':'Enter Allergy Name In English'}}" wire:model="allergyName_en">
<button wire:click="AddAllergy()" class="table-new">{{App::isLocale('ar')? 'إضافة':'ADD'}} <i class="fa fa-plus" aria-hidden="true"></i></button></span>
</div>
<div class="medical-records__specs--table">
<span class="medical-records__specs--title">{{App::isLocale('ar')? 'الأدوية':'Medicines'}}</span>
@foreach($drugs as $drug)
<span class="table-item">{{$drug->name}} <button wire:click="deleteDrug({{$drug->id}})" class="table-delete"><i class="fa fa-trash" aria-hidden="true"></i></button></span>
@endforeach
<span class="table-item"><input  type="text" class="table-add" placeholder="{{App::isLocale('ar')? 'أدخل اسم الدواء':'Enter Medicine Name'}}" wire:model="medicineName"><button wire:click="AddDrug()" class="table-new">{{App::isLocale('ar')? 'إضافة':'ADD'}} <i class="fa fa-plus" aria-hidden="true"></i></button></span>
</div>
</div>




</main>
</div>

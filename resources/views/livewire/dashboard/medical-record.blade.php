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


</main>
</div>

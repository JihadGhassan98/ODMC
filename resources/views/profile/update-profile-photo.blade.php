<div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:col-span-1 flex justify-between">
        <div class="px-4 sm:px-0">
            <h3 class="text-lg font-medium text-gray-900">  {{ App::isLocale('ar')? 'الصورة الشخصية':'Profile Picture' }}</h3>
            <p class="mt-1 text-sm text-gray-600">
            {{ App::isLocale('ar')? 'تحديث صورتك الشخصية':'Update Your Profile Image' }}
            </p>
        </div>
        <div class="px-4 sm:px-0">

        </div>
    </div>
    <div class="mt-5 md:mt-0 md:col-span-2">
        <form action="{{url('/uploadPhoto/'.Auth::user()->id)}}"  method="POST"  enctype="multipart/form-data">
            @csrf
            <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                <div class=" upload-form" >
                    <!-- Profile Photo -->
                    <label for="userImage" class="upload-form__input-label" >
     <img src="/userImages/{{Auth::user()->profile_photo_path}}" alt="" class="upload-form__input-label--image" id="userImage_preview">
   </label>
   <input required onchange="showPreview(event)" id="userImage" name="profile_pic" type="file" class="upload-form__input-field"  accept="image/*,.jpg,.png">
   <button type="submit" class="upload-form__submit-cta">{{App::isLocale('ar')? 'حفظ ومتابعة':'Save And Continue'}}</button>

                </div>
            </div>

     
        </form>
    </div>
</div>

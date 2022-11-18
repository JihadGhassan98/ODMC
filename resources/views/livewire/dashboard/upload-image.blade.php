<div>
<form method="POST" action="{{url('uploadPhoto/'.Auth::user()->id)}}" class="upload-form">
    @csrf
   <label for="userImage" >
     <img src="/systemImages/defaultUser.jpg" alt="" id="userImage_preview">
   </label>
   <input onchange="showPreview(event)" id="userImage" type="file" accept="image/*,.jpg,.png">
</form>
</div>

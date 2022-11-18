<div>
<form method="POST" action="{{url('uploadPhoto/'.Auth::user()->id)}}" class="upload-form">
    @csrf
   <label for="image">
     <img src="/" alt="" id="userImage__preview">
   </label>
   <input id="userImage" type="file" accept="image/*,.jpg,.png">
</form>
</div>

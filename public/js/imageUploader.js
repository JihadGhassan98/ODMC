function showPreview( event ) {
    if ( event.target.files.length > 0 ) {
        var src = URL.createObjectURL( event.target.files[ 0 ] );
        var preview = document.getElementById( `${event.target.id}_preview` );
        preview.src = src;
        //  preview.style.display = "block";
    }
}


function showFileName(event){

    if ( event.target.files.length > 0 ) {
       
       document.querySelector('#pdfLabel').innerHTML=event.target.files[ 0 ].name;

    document.querySelector('#submitFile').classList.remove('shady-btn');
    document.querySelector('#submitFile').removeAttribute('disabled');

    
    }


}
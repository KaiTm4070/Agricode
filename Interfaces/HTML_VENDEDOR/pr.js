document.getElementById('foto2').onchange=function(e){
    let reader=new FileReader();
    reader.readAsDataURL(e.target.files[0]);
    reader.onload=function(){
        let preview=document.getElementById('ver2');

        imagen.src=reader.result;
        preview.append(imagen);
    }
};
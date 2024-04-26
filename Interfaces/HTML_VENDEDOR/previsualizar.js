document.getElementById('foto').onchange=function(e){
    let reader=new FileReader();
    reader.readAsDataURL(e.target.files[0]);
    reader.onload=function(){
        let preview=document.getElementById('ver');

        imagen.src=reader.result;
        preview.append(imagen);
    }
};  
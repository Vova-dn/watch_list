document.addEventListener('DOMContentLoaded', function () {

    const reg = document.getElementById('reg');
    const sign_in =document.getElementById('si');
    const registr =document.getElementById('sii');
    const prev = document.getElementById('prev');

    reg.addEventListener('click', function (){
        sign_in.style.display = "none";
        registr.style.display = "block";

    });

    prev.addEventListener('click', function (){
        sign_in.style.display = "block";
        registr.style.display = "none";
    })



});

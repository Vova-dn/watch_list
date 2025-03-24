document.addEventListener("DOMContentLoaded",function () {



    function rerenderSlides(page){
        if(page===1){
            slide_1.style.display = 'grid'
            slide_2.style.display = 'none';
            slide_3.style.display = 'none';

        }
        if(page===2){
            slide_2.style.display = 'grid'
            slide_1.style.display = 'none';
            slide_3.style.display = 'none';

        }
        if(page===3){
            slide_3.style.display = 'grid'
            slide_2.style.display = 'none';
            slide_1.style.display = 'none';

        }

    }

    const slide_1 = document.getElementById('AnimeSlide_1');
    const slide_2 = document.getElementById('AnimeSlide_2');
    const slide_3 = document.getElementById('AnimeSlide_3');

    const prev = document.getElementById('prev');
    const next = document.getElementById('next');

    let page = 1;

    slide_2.style.display = 'none';
    slide_3.style.display = 'none';






    prev.addEventListener('click', ()=>{

        page = page < 2 ? 3 : page - 1
        rerenderSlides(page);
    });

    next.addEventListener('click', ()=>{
        page = page > 2 ? 1 : page + 1
        rerenderSlides(page);
    });





});

document.addEventListener('DOMContentLoaded', function (){

    const menuButton = document.getElementById('arrow');

    const popupMenu = document.getElementById('topmenu');

    const search = document.getElementById('search');

    const sign_in = document.getElementById('autorisation');



    // search.addEventListener("keydown", function (event) {
    //     if (event.key === "Enter") {
    //         event.preventDefault(); // Остановка стандартного поведения (если нужно)
    //         search.submit(); // Принудительная отправка формы
    //     }
    // });

    let movedUp = false;

    menuButton.addEventListener("click", function () {
        if (popupMenu.style.display === "none") {
            popupMenu.style.display = "block";
        } else {
            popupMenu.style.display = "none";
        }

    });

    popupMenu.addEventListener("click", function (event) {
        if (event.target.tagName === "A") {
            popupMenu.style.display = "none";
        }
    });
    //
    menuButton.addEventListener("click", function () {
        popupMenu.classList.toggle("active");
    });
    //
    //
    //
    menuButton.addEventListener("click", function () {
        if (!movedUp) {
            menuButton.style.transform = "translateY(-20px)"; // Движение вверх
        } else {
            menuButton.style.transform = "translateY(0)"; // Возврат вниз
        }
        movedUp = !movedUp; // Переключаем состояние
    });

    const scene1 = document.getElementById('main');
    const scene2 = document.getElementById('2');

    sign_in.addEventListener('click', function (){
        scene1.style.display='none'
        scene2.style.display='block'

    });

    if(scene2.style.display==='block') {

        document.addEventListener("click", function(event) {
            if (!scene2.contains(event.target)) {
                scene2.style.display = 'none'
                scene1.style.display = 'block'
            }
        });
    }
});

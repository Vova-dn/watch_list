document.addEventListener("DOMContentLoaded", function (){

    function pagescrolllers(page){

        let as = document.getElementsByClassName("group");
        as = Array.from(as);
        as.forEach(a=>{
           if(page>=2){
               a.style.display = ((page-1)*10<a.id) && (a.id<page*10) ? "block":"none";
           }
            else{
               a.style.display = a.id<page*10 && -1<a.id ? "block":"none";
           }

        });
        count.text=""+p

    }

    let massive = [];

    const texts = JSON.parse(document.getElementById("parse-result").innerText);
    console.log(texts);

    const l = texts.length;
    let page = Math.ceil(l/10);
    let p = 1;

    let n = 0;

    // if(texts==null){
    //     return;
    // }

    const list = document.getElementById('list');
    list.style.display = "grid";

    const main = document.getElementById('main');
    main.style.display = "none";

    texts.forEach(text=>{
        const groupDiv = document.createElement("div");
        groupDiv.classList.add("group");
        groupDiv.id = n;

        const check = document.createElement("input");
        check.type = 'checkbox';
        check.classList.add("check")
        check.id = n;

        const textElement = document.createElement("a");
        textElement.textContent = text.name;
        textElement.classList.add("name_anime");

        const imgElement = document.createElement("img");
        imgElement.src = 'https://animevost.org/'+ text.Photo;
        imgElement.classList.add("img_anime");

        groupDiv.appendChild(imgElement);
        groupDiv.appendChild(textElement);
        groupDiv.appendChild(check);

        list.appendChild(groupDiv);

        check.addEventListener("change",  ()=>{
            if(check.checked){
                groupDiv.style.outline="2px solid #1DB954";
                groupDiv.style.outlineOffset="-2px";
                massive.push(check.id);
            } else {
                groupDiv.style.outline="";
                groupDiv.style.outlineOffset="";
                massive.pop(check.id);
            }
        });

        n++;

    });

    let ph = document.createElement("button");
    ph.classList.add("ph")
    ph.textContent="Добавить к просмотренному"
    list.appendChild(ph);

    let left = document.createElement("button");
    left.classList.add("listing");
    list.appendChild(left);
    left.textContent = "<";

    let count = document.createElement("a")
    count.classList.add("number")
    list.appendChild(count);

    let right = document.createElement("button");
    right.classList.add("listing");
    list.appendChild(right);
    right.textContent = ">";

    let newparse = document.createElement("button")
    newparse.classList.add("newparse")
    list.appendChild(newparse)
    newparse.textContent = "Искать на другом сайте";



    pagescrolllers(p);

    left.addEventListener('click', function (){
        p--;
        if(p<1){
            p=1;
        }
        pagescrolllers(p);
    });
    right.addEventListener('click', function (){
        p++;
        if(p>page){
            p=page;
        }
        pagescrolllers(p);
    });
let anime= [];



ph.addEventListener('click', ()=>{

    massive.forEach(number=>{
        anime.push(texts[number]);
    });

    let js = JSON.stringify(anime);
    let csrfToken = document.querySelector('input[name="_token"]').value;

    fetch('/animes', {
        method: 'POST',
        body: js,
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrfToken
        },

    });
    window.location.href = '/animes';
});


















});

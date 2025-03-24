
<link rel="stylesheet" href='{{asset("css/toppanel.css")}}'>




<div>
    <div class="topmenu" id="topmenu">

       <form action="/search" method="POST" class="search" id="search">
           @csrf
           <input class="search" name="name" placeholder="Введите название аниме">
           <select class="choose" name="category">
               <option value="Site">Поиск по сайту</option>
               <option value="anime">Anime</option>
               <option value="film">Film</option>
               <option value="serial">Serial</option>
           </select>
       </form>
        <button class="autorisation" id="autorisation"></button>
    </div>
    <button class="arrow" id="arrow"></button>

    @auth
        <div class="user">
            <img class="user" src="{{asset('storage/'.auth()->user()->avatar)}}">
        </div>
    @endauth
</div>




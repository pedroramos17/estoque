<nav class="navbar">
  <button id="menu-button" class="menuButton">Estoque</button>
  <img src="{{url('./assets/filter.svg')}}" alt="filter" class="w-6 h-6" />
  <form action="/pesquisar" method="get">
    <div class="flex space-x-5">
      <input type="text" id="search" name="search" placeholder="Pesquisar" class="searchbar" />
      <button type="submit"><img src="{{url('./assets/search.svg')}}" alt="search" class="w-6 h-6" /></button>
    </div>
  </form>
</nav>
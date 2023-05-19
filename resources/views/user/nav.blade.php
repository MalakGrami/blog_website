<div class="sidebar">
    
    <div class="user-profile">
        <hr class="line">
        @auth
        <img src="{{ asset('storage/users/'. auth()->user()->image) }}" alt="User Image">
        <br>
        <span>{{ auth()->user()->name }}</span>
        @endauth
    </div>
    <hr class="line">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" href="{{route('create_blog')}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M6 0v1.5a8.46 8.46 0 0 1 6.01 2.489a8.472 8.472 0 0 1 2.489 6.01h1.5c0-5.523-4.477-10-10-10z"/><path fill="currentColor" d="M6 3v1.5c1.469 0 2.85.572 3.889 1.611S11.5 8.531 11.5 10H13a7 7 0 0 0-7-7zm1.5 3l-1 1L3 8l-3 6.5l.396.396l3.638-3.638a1 1 0 1 1 .707.707l-3.638 3.638l.396.396l6.5-3l1-3.5l1-1l-2.5-2.5z"/></svg>
                Créer un blog</a>
            
        </li>
        <hr class="line"> 
        <li class="nav-item">
            <a class="nav-link" href="{{route('blogs_of_user')}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19 5v14H5V5h14m2-2H3v18h18V3m-4 14H7v-1h10v1m0-2H7v-1h10v1m0-3H7V7h10v5Z"/></svg>
                Voir tous les blogs</a>
           
        </li>
        <hr class="line"> 
        <li class="nav-item">
            <a class="nav-link" href=" {{ route('settings') }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M14.5 23q-.625 0-1.063-.438T13 21.5v-7q0-.625.438-1.063T14.5 13h7q.625 0 1.063.438T23 14.5v7q0 .625-.438 1.063T21.5 23h-7Zm0-1.5h7v-.8q-.625-.775-1.525-1.238T18 19q-1.075 0-1.975.463T14.5 20.7v.8ZM18 18q.625 0 1.063-.438T19.5 16.5q0-.625-.438-1.063T18 15q-.625 0-1.063.438T16.5 16.5q0 .625.438 1.063T18 18Zm-7 4h-.875q-.375 0-.65-.25t-.325-.625l-.3-2.325q-.325-.125-.613-.3t-.562-.375l-2.175.9q-.35.15-.7.038t-.55-.438L2.4 15.4q-.2-.325-.125-.7t.375-.6l1.875-1.425Q4.5 12.5 4.5 12.337v-.674q0-.163.025-.338L2.65 9.9q-.3-.225-.375-.6t.125-.7l1.85-3.225q.2-.325.55-.438t.7.038l2.175.9q.275-.2.575-.375t.6-.3l.3-2.325q.05-.375.325-.625t.65-.25h3.75q.375 0 .65.25t.325.625l.3 2.325q.325.125.613.3t.562.375l2.175-.9q.35-.15.7-.038t.55.438l1.85 3.25q.2.325.125.688t-.375.587L19.925 11H15.4q-.35-1.075-1.25-1.788t-2.1-.712q-1.45 0-2.475 1.025T8.55 12q0 1.2.675 2.1T11 15.35V22Z"/></svg>
                Paramètres</a>
           
        </li>
        <hr class="line"> 
    </ul>
</div>

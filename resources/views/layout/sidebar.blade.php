<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link" href="{{route('dashboard')}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        @auth
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#categorie-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-tags-fill"></i><span>CATEGORIE</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="categorie-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route('categorie.liste')}}">
                            <i class="bi bi-circle"></i><span>Listes des categories</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#taches-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-calendar2-week"></i><span>TACHES</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="taches-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    @if(Illuminate\Support\Facades\Auth::user()->user_role=='ADMIN')
                        <li>
                            <a href="{{route('new.taches')}}">
                                <i class="bi bi-circle"></i><span>Creer une taches</span>
                            </a>
                        </li>
                    @endif
                    <li>
                        <a href="{{route('taches_all')}}">
                            <i class="bi bi-circle"></i><span>Listes des taches</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('view.personne_taches_non_validate')}}">
                            <i class="bi bi-circle"></i><span>suivis de mes taches</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('view.personne_taches')}}">
                            <i class="bi bi-circle"></i><span>Listes des taches valider</span>
                        </a>
                    </li>
                    @if(Illuminate\Support\Facades\Auth::user()->user_role=='ADMIN')
                        <li>
                            <a href="{{route('listes_invalide')}}">
                                <i class="bi bi-circle"></i><span>Validation taches</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('affectation.views')}}">
                                <i class="bi bi-circle"></i><span>Affectation</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#user-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-person-check-fill"></i><span>USER</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="user-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route('view_listes_membres')}}">
                            <i class="bi bi-circle"></i><span>Listes des utilisateurs</span>
                        </a>
                    </li>
                    @if(Illuminate\Support\Facades\Auth::user()->user_role=='ADMIN')
                    <li>
                        <a href="{{route('view.register_members')}}">
                            <i class="bi bi-circle"></i><span>Attribution de role</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('admin.create.account')}}">
                            <i class="bi bi-circle"></i><span>Créer un compte </span>
                        </a>
                    </li>
                    @endif
                </ul>
            </li>

        @endauth
        

    </ul>
</aside><!-- End Sidebar-->

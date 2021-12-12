<nav class="navbar navbar-dark navbar-expand-md bg-dark justify-content-md-center justify-content-start">

    <button class="navbar-toggler ml-1" type="button" data-toggle="collapse" data-target="#collapsingNavbar2">

        <span class="navbar-toggler-icon"></span>
        
    </button>

    <div class="navbar-collapse collapse justify-content-between align-items-center w-100" id="collapsingNavbar2">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">

                <a class="nav-link{{ request()->is('/') ? ' active' : ''}}" href="/">HOME</a>

            </li>
            <li class="nav-item">

                <a class="nav-link{{ request()->is('vaccine') ? ' active' : ''}}" href="/vaccine">VACCINE</a>

            </li>
            <li class="nav-item">
                
                <a class="nav-link{{ request()->is('patient') ? ' active' : ''}}" href="/patient">PATIENT</a>
        </ul>
    </div>
</nav>

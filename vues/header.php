<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
            </a>
            <ul class="nav col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><h2>Projet PHP</h2></li>
                <li><h2 class="News">News</h2></li>
            </ul>
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start ">
                    <form METHOD="POST" action="index.php?action=connection">
                        <input type="search" name="loginUser" class="form-control form-control-dark mb-1" placeholder="Login" aria-label="Search"/>
                        <input type="password" name="mdpUser" class="form-control form-control-dark" placeholder="Mot de passe" aria-label="Search"/>
                        <INPUT TYPE=SUBMIT class="btn btn-secondary button_connect mt-2 mr-2 mb-2" NAME="action" VALUE="connection"/>
                    </form>
                </div>
        </div>
    </div>
</header>
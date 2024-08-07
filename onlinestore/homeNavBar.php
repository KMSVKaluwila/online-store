<nav class="navbar navbar-expand-lg fixed-top bg-body-tertiary">
    <div class="container">

        <a class="navbar-brand h1 mb-0" href="index.php">
            <img class="me-3" src="resources/img/icon.ico" height="25" />
            Online Store
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="d-flex justify-content-center">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-5">

                    <li class="nav-item me-5">
                        <a class="nav-link active" aria-current="page" href="profile.php">User Profile</a>
                    </li>

                    <li class="nav-item me-5">
                        <a class="nav-link active" aria-current="page" href="orderHistory.php">History</a>
                    </li>

                    <li class="nav-item me-5">
                        <a class="nav-link active" aria-current="page" href="cart.php">Cart</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" onclick="signOut();">Sign Out</a>
                    </li>

                </ul>
            </div>
        </div>

    </div>
</nav>
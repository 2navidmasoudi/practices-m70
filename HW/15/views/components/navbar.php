<nav class="flex-shrink-0 navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Modern Hospital</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>

                <?php if (isLogin()) { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle hover" href="/panel" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown">
                            Panel
                        </a>
                        <ul class="dropdown-menu">
                            <?php if (isUser()) { ?>
                                <li><a class="dropdown-item" href="/panel/reserve">Reserve</a></li>
                            <?php } ?>
                            <?php if (isDoctor()) { ?>
                                <li><a class="dropdown-item" href="/panel/work">Working hours</a></li>
                                <li><a class="dropdown-item" href="/panel/visits">Reserved visits</a></li>
                            <?php } ?>
                            <?php if (isAdmin()) { ?>
                                <li><a class="dropdown-item" href="/panel/confirm">Confirm</a></li>
                                <li><a class="dropdown-item" href="/panel/units">Units</a></li>
                            <?php } ?>
                        </ul>
                    </li>
                <?php } ?>

            </ul>
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <?php if (isLogin()) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/profile">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Register</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
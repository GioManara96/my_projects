    <?php
    session_start();
    if (isset($_SESSION["userID"])) {
    ?>
        <footer class="mt-5">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-sm bg-dark navbar-dark pt-3">
                    <ul class="navbar-nav nav-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php" title="Home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" title="link">Cases</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" title="link">Portfolio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" title="link">About us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" title="link">Contacts</a>
                        </li>
                        <div class="nav-right">
                            <li class="nav-item">
                                <a class="nav-link" href="#" title="link"><i class="fa-brands fa-facebook"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" title="link"><i class="fa-brands fa-instagram"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" title="link"><i class="fa-brands fa-linkedin"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" title="link"><i class="fa-brands fa-youtube"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" title="link"><i class="fa-brands fa-pinterest"></i></a>
                            </li>
                        </div>
                    </ul>
                </nav>
            </div>
        </footer>
    <?php
    }
    ?>
    </body>

    </html>
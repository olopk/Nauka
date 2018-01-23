<div class="header clearfix">
    <nav>
        <ul class="nav nav-pills float-right">
            <li class="nav-item">
                <a class="nav-link <?php (!isset($_GET['strona'])) ? print('active') : null; ?>"
                   href="index.php">Home </a>
            </li>
            <li class="nav-item">
                <a class="nav-link
                <?php
                if ($_GET['strona'] == 'kontakt') {
                    echo 'active';
                }
                ?>" href="index.php?strona=kontakt">Contact</a>
            </li>
            <li class="nav-item">
                <?php
                if ($_SESSION['czy_zalogowany'] == false) {
                    echo '<a class="nav-link" href="index.php?strona=logowanie" class="btn btn-sm btn-primary">Zaloguj</a>';
                } else {
                    echo '<a class="nav-link" href="index.php?strona=wylogowanie" class="btn btn-sm btn-primary">Wyloguj</a>';
                }
                ?>
            </li>
            <?php
            if($_SESSION['czy_zalogowany']==true): ?>
            <li class="nav-item">
                <a class="nav-link" href="index.php?strona=restricted" class="btn btn-sm btn-primary">Tajne</a>
            </li>
            <?php endif; ?>
        </ul>
    </nav>
    <h3 class="text-muted">Strona domowa</h3>
</div>


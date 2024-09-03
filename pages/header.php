<header>
    <div class="header content">
        <div class="logo__header">
            <img src="assets/img/glavnaii/лого.svg" alt="">
        </div>
        <div class="header__link">
            <a href="?page=main">Главная</a>
            <a href="?page=about">О нас</a>
            <a href="?page=katalog">Каталог</a>
            <a href="#footer">Контакты</a>
        </div>
        <div class="header__icon">
            <a href="?page=korzina"><img src="assets/img/glavnaii/shop.svg" alt=""></a>
            <!-- <a href="?page=korzina"><img src="assets/img/header/icons/local_mall.png" alt=""></a> -->
            <?php
            if (!isset($_SESSION['uid'])) { ?>

                <a href="?page=login"><img src="assets/img/glavnaii/vxod1.svg" alt=""></a>

            <?php } ?>

            <?php
            if (isset($_SESSION['uid'])) {

                if ($user['level'] == 2) { ?>

                    <a href="?page=admin_tovar"><img src="assets/img/glavnaii/person.png" alt=""></a>

                <?php }
            } ?>

            <?php
            if (isset($_SESSION['uid'])) {

                if ($user['level'] != 2 && $user['level'] != 0) { ?>

                    <a href="?page=polzavatel"><img src="assets/img/glavnaii/person.png" alt=""></a>

                <?php }

            } ?>

            <?php
            if (isset($_SESSION['uid'])) { ?>

                <a href="?exit" class="exit"><img src="assets/img/glavnaii/vxod1.svg" alt=""></a>

            <?php } ?>

        </div>
        <input type="checkbox" name="burger" id="burger">
        <label for="burger"></label>
        <nav class="burg">
            <a href="?page=main">Главная</a>
            <a href="?page=about">О нас</a>
            <a href="?page=katalog">Каталог</a>
            <a href="#footer">Контакты</a>
            <a href="?page=korzina"><img src="assets/img/glavnaii/shop.svg" alt=""></a>
            <?php
            if (!isset($_SESSION['uid'])) { ?>

                <a href="?page=login"><img src="assets/img/glavnaii/vxod1.svg" alt=""></a>

            <?php } ?>

            <?php
            if (isset($_SESSION['uid'])) {

                if ($user['level'] == 2) { ?>

                    <a href="?page=admin_tovar"><img src="assets/img/glavnaii/person.png" alt=""></a>

                <?php }
            } ?>

            <?php
            if (isset($_SESSION['uid'])) {

                if ($user['level'] != 2 && $user['level'] != 0) { ?>

                    <a href="?page=polzavatel"><img src="assets/img/glavnaii/person.png" alt=""></a>

                <?php }

            } ?>

            <?php
            if (isset($_SESSION['uid'])) { ?>

                <a href="?exit" class="exit"><img src="assets/img/glavnaii/vxod1.svg" alt=""></a>

            <?php } ?>

        </nav>
    </div>
</header>
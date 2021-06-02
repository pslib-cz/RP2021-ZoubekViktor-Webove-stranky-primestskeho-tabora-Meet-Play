<?php
require_once "mailer.php";
?>

<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meet and Play</title>
    <link rel="icon" href="./img/logo_meetandplay.svg">
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/typography.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!--/*
    ⠄⢀⣀⣤⣴⣶⣶⣤⣄⡀⠄⠄⣀⣤⣤⣤⣤⡀⠄⠄⠄⠄⠄⠄⠄⠄⠄⠄⠄⠄
    ⣴⣏⣹⣿⠿⠿⠿⠿⢿⣿⣄⢿⣿⣿⣿⣿⣿⣋⣷⡄⠄⠄⠄⠄⠄⠄⠄⠄⠄⠄
    ⣿⢟⣩⣶⣾⣿⣿⣿⣶⣮⣭⡂⢛⣭⣭⣭⣭⣭⣍⣛⣂⡀⠄⠄⠄⠄⠄⠄⠄⠄
    ⣿⣿⣿⣿⡿⢟⣫⣭⣷⣶⣾⣭⣼⡻⢛⣛⣭⣭⣶⣶⣬⣭⣅⡀⠄⠄⠄⠄⠄⠄
    ⣿⡿⢏⣵⣾⣿⣿⣿⡿⢉⡉⠙⢿⣇⢻⣿⣿⣿⣿⡟⠉⠉⢻⡷⠄⠄⠄⠄⠄⠄
    ⣿⣷⣾⣍⣛⢿⣿⣿⣿⣤⣁⣤⣿⢏⠸⣿⣿⣿⣿⣷⣬⣥⣾⠁⣿⣿⣷⠄⠄⠄
    ⣿⣿⣿⣿⣭⣕⣒⠿⠭⠭⠭⡷⢖⣫⣶⣶⣬⣭⣭⣭⣭⣥⡶⢣⣿⣿⣿⠄⠄⠄
    ⣿⣿⣿⣿⣿⣿⣿⡿⣟⣛⣭⣾⣿⣿⣿⣝⡛⣿⢟⣛⣛⣁⣀⣸⣿⣿⣿⣀⣀⣀
    ⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⢸⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿
    ⣿⡿⢛⣛⣛⣛⣙⣛⠿⠿⣿⣿⣿⣿⣿⣿⣿⣿⣬⣭⣭⠽⣛⢻⣿⣿⣿⠛⠛⠛
    ⣿⢰⣿⣿⣿⣿⣟⣛⣛⣶⠶⠶⠶⣦⣭⣭⣭⣭⣶⡶⠶⣾⠟⢸⣿⣿⣿⠄⠄⠄
    ⡻⢮⣭⣭⣭⣭⣉⣛⣛⡻⠿⠿⠷⠶⠶⠶⠶⣶⣶⣾⣿⠟⢣⣬⣛⡻⢱⣇⠄⠄
    ⣿⣾⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣶⠶⠒⠄⠄⠄⢸⣿⢟⣫⡥⡆⠄⠄
    ⢭⣭⣝⣛⣛⣛⣛⣛⣛⣛⣿⣿⡿⢛⣋⡉⠁⠄⠄⠄⠄⠄⢸⣿⢸⣿⣧⡅⠄⠄
    ⣶⣶⣶⣭⣭⣭⣭⣭⣭⣵⣶⣶⣶⣿⣿⣿⣦⡀⠄⠄⠄⠄⠈⠡⣿⣿⡯⠁⠄⠄
    */-->
</head>

<body>
    <div class="backdropImage"></div>
    <header class="menu">
        <div class="burgerButton" onclick="menuToggle()">
            <div class="burgerIcon"></div>
        </div>
        <nav>
            <ul>
                <li><a href="#oprojektu" onclick="autoClose()">O projektu</a></li>
                <li><a href="#nastym" onclick="autoClose()">Náš tým</a></li>
                <li><a href="#kurzy" onclick="autoClose()">Kurzy</a></li>
                <li><a href="#kontakt" onclick="autoClose()">Kontakt</a></li>
            </ul>
        </nav>
    </header>
    <h1 hidden>Příměstský tábor Meet and Play</h1>
    <div class="landing">
        <figure class="logo">
            <img sizes="(max-width: 700px) 80vw, (max-width: 1000px) 35vw, 40vw"
            srcset="
            ./img/texturedlogo_lf8iad_c_scale,w_190.png 190w,
            ./img/texturedlogo_lf8iad_c_scale,w_408.png 408w,
            ./img/texturedlogo_lf8iad_c_scale,w_569.png 569w,
            ./img/texturedlogo_lf8iad_c_scale,w_710.png 710w,
            ./img/texturedlogo_lf8iad_c_scale,w_824.png 824w,
            ./img/texturedlogo_lf8iad_c_scale,w_939.png 939w,
            ./img/texturedlogo_lf8iad_c_scale,w_1030.png 1030w,
            ./img/texturedlogo_lf8iad_c_scale,w_1179.png 1179w,
            ./img/texturedlogo_lf8iad_c_scale,w_1286.png 1286w,
            ./img/texturedlogo_lf8iad_c_scale,w_1315.png 1315w,
            ./img/texturedlogo_lf8iad_c_scale,w_1567.png 1567w,
            ./img/texturedlogo_lf8iad_c_scale,w_1589.png 1589w,
            ./img/texturedlogo_lf8iad_c_scale,w_1761.png 1761w,
            ./img/texturedlogo_lf8iad_c_scale,w_1745.png 1745w,
            ./img/texturedlogo_lf8iad_c_scale,w_1794.png 1794w"
            src="./img/texturedlogo_lf8iad_c_scale,w_1794.png" alt="meet and play">
            <figcaption>logo meet and play</figcaption>
        </figure>
        <div class="startButton"><a href="#contactForm">Přihlas se</a></div>
    </div>
    <main>
        <article class="aboutProject" id="oprojektu">
            <h2>O projektu</h2>
            <p class="headline">Tento projekt byl vytvořen s velikým odhodláním usnadnit učení nejpoužívanějšího cizího
                jazyka v ČR, a to přímo u nás v Liberci!</p>
            <p>Koncept Meet&Play je založen především na známém mottu Jana Ámose Komenského "Škola hrou" a přesně v
                tomto
                duchu jsme připravily veškeré aktivity, se kterými se malí nadšení angličtináři mohou na našich
                příměstských táborech setkat.</p>
            <p>Nejdůležitějším cílem naší práce je vhodná a velmi potřebná motivace dětí, bez ohledu na věk či jazykovou
                úroveň. Posláním je pro nás především zpřístupnění možnosti učení cizího jazyka pro každého malého
                zájemce.</p>
            <p>V roce 2021 jsme navázaly spolupráci s katedrou anglického jazyka <a
                    href="https://kaj.fp.tul.cz/">Technické univerzity v
                    Liberci</a>.<br />
                Díky této spolupráci Vám můžeme nabídnout anglický příměstský tábor, kde bude přítomný rodilý mluvčí
                <b>Christopher Muffett</b>.</p>
            <figure>
                <img sizes="(max-width: 1000px) 60vw, 30vw"
                srcset="
                ./img/logo_technicka_univerzita_e3luyx_c_scale,w_230.png 230w,
                ./img/logo_technicka_univerzita_e3luyx_c_scale,w_706.png 706w,
                ./img/logo_technicka_univerzita_e3luyx_c_scale,w_1590.png 1590w"
                src="./img/logo_technicka_univerzita_e3luyx_c_scale,w_1590.png" alt="technická univerzita v liberci">
                <figcaption>logo TUL</figcaption>
            </figure>
        </article>
        <article class="ourTeam" id="nastym">
            <h2>Náš tým</h2>
            <p class="headline">Jsme kreativní dvojka, která se výuce anglického jazyka věnuje již několik let, a to jak
                na základní škole, tak formou individuální výuky klientů různého věku.</p>
            <p>Ivet v roce 2020 úspěšně dokončila bakalářské studium na katedře angličtiny v Liberci a nyní je
                studentkou navazujícího magisterského studia. Stefi dokončila magisterské studium také na katedře
                anglického jazyka v roce 2020.</p>
            <p>Cílem nás obou je vytvářet takové podmínky k učení, aby žádná lekce nebyla nuda!</p>
            <p>Mezi naše oblíbené metody patří výuka formou myšlenkových map, pohybových aktivit či tematických
                projektů. Cílem naší práce je zainteresovat každého jedince. Kromě využívání moderních technologií velmi
                často využíváme vlastnoručně vyrobené pomůcky.</p>
            <p>Pokud s námi chcete zůstat v kontaktu nebo se dozvědět perličky z angličtiny, určitě koukněte na náš <a
                    href="https://www.instagram.com/_meetandplay_/">Instagram</a> a <a
                    href="https://www.facebook.com/meetandplay1">Facebook</a>.</p>
            <figure>
                <img sizes="(max-width: 1000px) 70vw, (max-width: 1400px) 30vw, 20vw" srcset="
                ./img/foto_OUR_TEAM_zxbzka_c_scale,w_200.jpg 200w,
                ./img/foto_OUR_TEAM_zxbzka_c_scale,w_482.jpg 482w,
                ./img/foto_OUR_TEAM_zxbzka_c_scale,w_672.jpg 672w,
                ./img/foto_OUR_TEAM_zxbzka_c_scale,w_848.jpg 848w,
                ./img/foto_OUR_TEAM_zxbzka_c_scale,w_999.jpg 999w,
                ./img/foto_OUR_TEAM_zxbzka_c_scale,w_1140.jpg 1140w,
                ./img/foto_OUR_TEAM_zxbzka_c_scale,w_1264.jpg 1264w,
                ./img/foto_OUR_TEAM_zxbzka_c_scale,w_1597.jpg 1597w,
                ./img/foto_OUR_TEAM_zxbzka_c_scale,w_1800.jpg 1800w"
                src="./img/foto_OUR_TEAM_zxbzka_c_scale,w_1800.jpg" alt="náš tým">
                <figcaption>our team photo</figcaption>
            </figure>
        </article>
        <article class="courses" id="kurzy">
            <h2>Kurzy</h2>
            <p><b>Proč právě k nám?</b> Důvodů je hned několik! Jsme mladá kreativní dvojka plná energie, se kterou se
                rozhodně nebudete nudit! Máme pro Vás připravený nabitý program, díky kterému si odnesete nové znalosti,
                zkušenosti a užijeme si spoustu legrace!</p>
            <section>
                <div class="sectionHeader">
                    <h3>Anglický příměstský tábor</h3>
                </div>
                <p>Rády bychom Vám nabídly možnost přihlásit Vaše děti na anglický příměstský tábor, který se bude konat
                    v červenci a to hned ve dvou termínech. První termín je od 12. – 16. 7. 2021 a druhý termín
                    je od 19. – 23. 7. 2021.</p>
                <p>Co určitě nesmíme zapomenout zmínit, je přítomnost <b>rodilého mluvčího</b>, který s námi díky
                    spolupráci s Technickou univerzitou stráví celý týden! Jeho jméno je <b>Christopher Muffett</b>.</p>
                <p>Christopher se narodil v Londýně a jeho velkou zálibou je zpěv. Pokud se o něm chcete dovědět něco
                    víc, podívejte se <a href="https://kaj.fp.tul.cz/staff/userprofile/muffett">sem</a>.</p>
                <p><b>Kdo se může tábora zúčastnit?</b> Účastnit se může každý, kdo chce! Budeme rády, když dětem bude 7
                    – 15 let. Pokud by měl zájem i ten, komu ještě nebylo 7 let a má již nějaké zkušenosti s
                    angličtinou, je
                    také vítán!</p>
                <p><b>A jak bude takový anglický příměstský tábor probíhat?</b> Sejdeme se každý den v 8 hodin ráno a od
                    8:30 se ze všech koutů začnou ozývat anglická slovíčka a fráze. Okolo 12 hodiny si dáme oběd v
                    jídelně s krátkou pauzou. Po obědě se můžete těšit na odpolední program, který bude končit v 15:30.
                </p>
                <p>Naši angličtináři budou rozděleni do dvou skupinek, které budou mít maximálně 12-14 členů, a to dle
                    obsazenosti termínu.
                    Chceme tak zajistit maximální individuální přístup pro každého účastníka našeho tábora. Skupiny
                    budou rozdělené dle úrovně na začátečníky a pokročilé.
                </p>
                <p><b>Cena</b> příměstského tábora na jeden týden je <b>3.299 Kč</b>. V ceně je zahrnuta jazyková výuka,
                    veškeré
                    pomůcky, obědy, svačiny a pitný režim. Pokud bude odpolední program vyžadovat vstup, může být
                    účtován zvlášť.</p>
                <p>V případě zásahu vyšší moci (nouzový stav, pandemický zákon atd.) a nemožnosti konání akce bude
                    vrácena celá uhrazená částka zpět.
                </p>
                <p class="headline">Vyplňte přihlášku a staňte se součástí letního anglického dobrodružství!</p>
            </section>
        </article>
        <form id="contactForm" class="contact-form" method="post" novalidate>
            <div>
                <label>Jméno účastníka</label>
                <input class="form-control" type="text" name="name" placeholder="Jméno účastníka" required><br>
            </div>
            <div>
                <label>Datum narození účastníka</label>
                <input class="form-control" type="date" name="birthdate"><br>
            </div>
            <div class="date">
                <div class="dateOne">
                    <input type="radio" name="coursedate" id="firstDate" value="12. - 16.7. 2021">
                    <label for="firstDate">12. - 16.7. 2021</label>
                </div>
                <div class="dateTwo">
                    <input type="radio" name="coursedate" id="secondDate" value="19. - 23.7. 2021">
                    <label for="secondDate">19. - 23.7. 2021</label>
                </div>
            </div>
            <div>
                <label>Jméno zákonného zástupce</label>
                <input class="form-control" type="text" name="parentname" placeholder="Jméno zástupce"><br>
            </div>
            <div>
                <label>Kontaktní e-mail</label>
                <input class="form-control" type="email" name="email" placeholder="meetandplay@email.cz" required><br>
            </div>
            <div>
                <label>Kontaktní telefonní číslo</label>
                <input class="form-control" type="tel" name="tel" placeholder="+420 123 456 789"><br>
            </div>
            <div class="g-recaptcha" data-sitekey="xxxxxxxxxxxxxxxxxxx"></div>
            <br />
            <button type="submit" name="submit">Let's play!</button>
        </form>
        <div>
            <div id="statusMessage"><?php echo $statusMessage;?></div>
        </div>
    </main>
    <footer>
        <div id="kontakt">
            <h2>Kontakt</h2>
            <a href="tel:+420607715751">+420 607 715 751</a><br>
            <a href="mailto:kontakt@meetandplay.cz">kontakt@meetandplay.cz</a><br>
            <a href="https://kaj.fp.tul.cz/">Katedra anglického jazyka</a>
            <div class="icons">
                <a href="https://www.facebook.com/meetandplay1" class="icon icon-facebook2"></a>
                <a href="https://www.instagram.com/_meetandplay_/" class="icon icon-instagram"></a>
            </div>
        </div>
        <figure>
            <img src="./img/logo_meetandplay.svg" alt="logo meetandplay">
            <figcaption>logo meet and play</figcaption>
        </figure>
    </footer>
    <div class="credits"><span>website created by <a href="https://www.instagram.com/viktoranriil/">Viktor
                Zoubek</a></span><span><a href="mailto:viktorzoubek7@gmail.com">viktorzoubek7@gmail.com</a></span></div>
    <script>
        const burgerBtn = document.querySelector(".burgerButton");
        const menuBall = document.querySelector(".menu");
        let menuOpen = false;

        function menuToggle() {
            if (!menuOpen) {
                burgerBtn.classList.toggle("open");
                menuBall.classList.toggle("open");
                menuOpen = true;
            } else {
                burgerBtn.classList.toggle("open");
                menuBall.classList.toggle("open");
                menuOpen = false;
            }
        }

        function autoClose() {
            if (menuOpen) {
                burgerBtn.classList.toggle("open");
                menuBall.classList.toggle("open");
                menuOpen = false;
            }
        }
    </script>
</body>

</html>
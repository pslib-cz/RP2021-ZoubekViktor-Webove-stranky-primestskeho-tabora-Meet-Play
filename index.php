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
    <link rel="icon" href="./img/texturedlogo.png">
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/typography.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"
        integrity="sha512-YUkaLm+KJ5lQXDBdqBqk7EVhJAdxRnVdT2vtCzwPHSweCzyMgYV/tgGF4/dCyqtCC2eCphz0lRQgatGVdfR0ww=="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"
        integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg=="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
        integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous">
    </script>
    <script>window.MSInputMethodContext && document.documentMode && document.write('<script src="https://cdn.jsdelivr.net/gh/nuxodin/ie11CustomProperties@4.1.0/ie11CustomProperties.min.js"><\/script>');</script>
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
                <li><a href="#oprojektu" onclick="autoClose()">O PROJEKTU</a></li>
                <li><a href="#nastym" onclick="autoClose()">NÁŠ TÝM</a></li>
                <li><a href="#kurzy" onclick="autoClose()">KURZY</a></li>
                <li><a href="#kontakt" onclick="autoClose()">KONTAKT</a></li>
            </ul>
        </nav>
    </header>
    <h1 hidden>Příměstský tábor Meet and Play</h1>
    <div class="landing">
        <figure class="logo">
            <img src="./img/texturedlogo.png" alt="meet and play">
            <figcaption>logo meet and play</figcaption>
        </figure>
        <div class="startButton"><a href="#contactForm">PŘIHLAŠ SE</a></div>
    </div>
    <main>
        <article class="aboutProject" id="oprojektu">
            <h2>O PROJEKTU</h2>
            <p class="headline">Tento projekt byl vytvořen s velikým odhodláním usnadnit učení nejpoužívanějšího cizího
                jazyka v ČR, a to přímo u nás v Liberci!</p>
            <p>Koncept Meet&Play je založen především na známém mottu Jana Ámose Komenského Škola hrou a přesně v tomto
                duchu jsme připravili veškeré aktivity, se kterými se malí nadšení angličtináři mohou na našich
                příměstských táborech setkat.</p>
            <p>Nejdůležitějším cílem naší práce je vhodná a velmi potřebná motivace dětí, bez ohledu na věk či jazykovou
                úroveň. Posláním je pro nás především zpřístupnění možnosti učení cizího jazyka pro každého malého
                zájemce.</p>
            <p>V roce 2021 jsme navázali spolupráci s katedrou anglického jazyka <a
                    href="https://kaj.fp.tul.cz/">Technické univerzity v
                    Liberci</a>.<br />
                Díky této spolupráci Vám můžeme nabídnout anglický příměstský tábor, kde bude přítomný rodilý mluvčí
                <b>Christopher Muffett</b>.</p>
            <figure>
                <img src="./img/logo_technicka_univerzita.png" alt="technická univerzita v liberci">
                <figcaption>logo TUL</figcaption>
            </figure>
        </article>
        <article class="ourTeam" id="nastym">
            <h2>NÁŠ TÝM</h2>
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
                    href="https://www.instagram.com/_meetandplay_/">instagram</a> a <a
                    href="https://www.facebook.com/meetandplay1">facebook</a>.</p>
            <figure>
                <img src="./img/foto_OUR_TEAM.jpg" alt="náš tým">
                <figcaption>our team photo</figcaption>
            </figure>
        </article>
        <article class="courses" id="kurzy">
            <h2>KURZY</h2>
            <p><b>Proč právě k nám?</b> Důvodů je hned několik! Jsme mladá kreativní dvojka plná energie, se kterou se
                rozhodně nebudete nudit! Máme pro Vás připravený nabitý program, díky kterému si odnesete nové znalosti,
                zkušenosti a užijeme si spoustu legrace!</p>
            <section>
                <div class="sectionHeader">
                    <h3>ANGLICKÝ PŘÍMĚSTSKÝ TÁBOR</h3>
                </div>
                <p>Rády bychom Vám nabídly možnost přihlásit Vaše děti na anglický příměstský tábor, který se bude konat
                    v červenci a to hned ve dvou termínech. První termín je od 12. – 16. 7. 2021 a druhý termín
                    je od 19. – 23. 7. 2021.</p>
                <p>Co určitě nesmíme zapomenout zmínit, je přítomnost <b>rodilého mluvčího</b>, který s námi díky
                    spolupráci s Technickou univerzitou stráví celý týden! Jeho jméno je <b>Christopher Muffett</b>.</p>
                <p>Christopher se narodil v Londýně a jeho velkou zálibou je zpěv. Pokud se o něm chcete dovědět něco
                    víc, podívejte se <a href="https://kaj.fp.tul.cz/staff/userprofile/muffett">sem</a>.</p>
                <p><b>Kdo se může tábora zúčastnit?</b> Účastnit se může každý, kdo chce! Budeme rády, když dětem bude 7
                    – 15 let. Pokud by měl zájem i ten, komu ještě nebylo 7 a má již nějaké zkušenosti s angličtinou, je
                    také vítán!</p>
                <p><b>A jak bude takový anglický příměstský tábor probíhat?</b> Sejdeme se každý den v 8 hodin ráno a od
                    8:30 se ze všech koutů začnou ozývat anglická slovíčka a fráze. Okolo 12 hodiny si dáme oběd v
                    jídelně s krátkou pauzou. Po obědě se můžete těšit na odpolední program, který bude končit v 15:30.
                </p>
                <p>Cena příměstského tábora na jeden týden je <b>3.299Kč</b>. V ceně je zahrnuta jazyková výuka, veškeré
                    pomůcky, obědy, svačiny a pitný režim. Pokud bude odpolední program vyžadovat vstup, může být
                    účtován zvlášť.</p>
                <p class="headline">Vyplňte přihlášku a staňte se součástí letního anglického dobrodružství!</p>
            </section>
        </article>
        <form id="contactForm" class="contact-form" method="post" novalidate>
            <div>
                <label>JMÉNO ÚČASTNÍKA</label>
                <input class="form-control" type="text" name="name" placeholder="Jméno účastníka" required><br>
            </div>
            <div>
                <label>DATUM NAROZENÍ ÚČASTNÍKA</label>
                <input class="form-control" type="date" name="birthdate" required><br>
            </div>
            <div class="date">
                <div class="dateOne">
                    <input type="radio" name="coursedate" id="firstDate" value="1" checked>
                    <label for="firstDate">12. - 16.7. 2021</label>
                </div>
                <div class="dateTwo">
                    <input type="radio" name="coursedate" id="secondDate" value="2">
                    <label for="secondDate">19. - 23.7. 2021</label>
                </div>
            </div>
            <div>
                <label>JMÉNO ZÁKONNÉHO ZÁSTUPCE</label>
                <input class="form-control" type="text" name="parentname" placeholder="Jméno zástupce" required><br>
            </div>
            <div>
                <label>KONTAKTNÍ E-MAIL</label>
                <input class="form-control" type="email" name="email" placeholder="meetandplay@email.cz" required><br>
            </div>
            <div>
                <label>KONTAKTNÍ TELEFONNÍ ČÍSLO</label>
                <input class="form-control" type="tel" name="tel" placeholder="+420 123 456 789" required><br>
            </div>
            <div class="g-recaptcha" data-sitekey="6LesY4oaAAAAAODON4x5c5Dv1MXDXr7HKXtLzANj"></div>
            <br />
            <button type="submit" name="submit">LET'S PLAY!</button>
        </form>
        <div>
            <div id="statusMessage"><?php echo $statusMessage;?></div>
        </div>
    </main>
    <footer>
        <div id="kontakt">
            <h2>KONTAKT</h2>
            <a href="tel:+420607715751">+420 607 715 751</a><br>
            <a href="mailto:kontakt@meetandplay.cz">kontakt@meetandplay.cz</a><br>
            <a href="https://kaj.fp.tul.cz/">Katedra anglického jazyka</a>
            <div class="icons">
                <a href="https://www.facebook.com/meetandplay1" class="icon icon-facebook2"></a>
                <a href="https://www.instagram.com/_meetandplay_/" class="icon icon-instagram"></a>
            </div>
        </div>
        <figure>
            <img src="./img/logo_meetandplay.svg" alt="">
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
    <script>
        $(document).ready(function () {
            $("#contactForm").validate({
                rules: {
                    "name": "required",
                    "birthdate": "required",
                    "coursedate": "required",
                    "parentname": "required",
                    "email": "required",
                    "tel": "required"
                },
                messages: {
                    "name": "Povinné pole",
                    "birthdate": "Povinné pole",
                    "coursedate": "Povinné pole",
                    "parentname": "Povinné pole",
                    "email": "Povinné pole",
                    "tel": "Povinné pole",
                },
                errorElement: "em",
                errorPlacement: function (error, element) {
                    error.addClass("invalid-feedback");

                    if (element.prop("type") === "checkbox") {
                        error.insertAfter(element.next("label"));
                    } else {
                        error.insertAfter(element);
                    }
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass("is-invalid").removeClass("is-valid");
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).addClass("is-valid").removeClass("is-invalid");
                }
            });
        });
    </script>
</body>

</html>
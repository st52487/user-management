<div class="full-width-wrapper">
    <div class="flex-wrap">
        <section>
            <h4>About me</h4>
            <ul>
                <li>
                    <a hre="#">Work with me</a>
                </li>
                <li>
                    <a hre="#">References</a>
                </li>
                <li>
                    <a hre="#">Contact me</a>
                </li>
                <li>
                    <a hre="#">Authors</a>
                </li>
                <li>
                    <a hre="#">Login</a>
                </li>
            </ul>
        </section>
        <section>
            <h4>Blog news</h4>
            <ol>
                <li>
                    <a href="#">New Article #1</a>
                </li>
                <li>
                    <a href="#">New Article #2</a>
                </li>
                <li>
                    <a href="#">New Article #3</a>
                </li>
                <li>
                    <a href="#">New Article #4</a>
                </li>
            </ol>
        </section>
        <section>
            <h4>Contact</h4>
            <address>
                Web 1<br>
                Street 1 City 1<br>
                Country 1<br>
                777 888 999<br>
                Email: <a href="mailto: email@email.cz">email@email.cz</a><br>
            </address>
        </section>
        <section id="footer-newsletter">
            <h4>Newsletter</h4>
            <form method="POST" action="<?= CURRENT_URL; ?>">
                <div>
                    <label>
                        Enter your email adress:
                    </label>
                </div>
                <div>
                    <input type="text" name="email">
                </div>
                <div>
                    <input type="submit" name="newsletter" value="Subscribe">
                </div>
            </form>
        </section>
    </div>
    <section>
        <p>
            Copyleft
            <?= date("Y", strtotime("-1 year")); ?>
            -
            <?php echo date("Y"); ?>
            <a href="https://github.com">
                Me
            </a>
        </p>
    </section>
</div>
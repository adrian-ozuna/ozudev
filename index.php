<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>

<body>
    <?php include 'header.php'; ?>
    <section id="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">¿Estás listo para<br> impulsar tu negocio?</h1>
            <p class="hero-description">Proveemos a nuestros clientes con soluciones web de<br> alta calidad.</p>
            <a href="#contact-us-section" class="button primary-button">Contactanos</a>
        </div>
    </section>
    <section id="services-section" class="anchor-link">
        <div class="section-content">
            <h1 class="section-title">Lo que ofrecemos</h1>
            <div class="service-cards-container">
                <div class="service-card">
                    <div class="card-title">
                        <div class="card-icon">
                            <span class="material-symbols-outlined">
                                design_services
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <h2>Diseño ui/ux</h2>
                    </div>
                </div>

                <div class="service-card">
                    <div class="card-title">
                        <div class="card-icon">
                            <span class="material-symbols-outlined">
                                computer
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <h2>Desarrollo frontend</h2>
                    </div>
                </div>

                <div class="service-card">
                    <div class="card-title">
                        <div class="card-icon">
                            <span class="material-symbols-outlined">
                                conversion_path
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <h2>Desarrollo backend</h2>
                    </div>
                </div>

                <div class="service-card">
                    <div class="card-title">
                        <div class="card-icon">
                            <span class="material-symbols-outlined">
                                storefront
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <h2>E-commerce</h2>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id="contact-us-section" class="anchor-link">
        <div class="section-content">
            <h1 class="section-title">
                ¿Deseas realizar un proyecto?
            </h1>
            <div class="contact-form d-block mx-auto">
                <form action="send-email.php" method="post" id="contact-form">
                    <div class="form-group">
                        <label for="name">Tu nombre</label>
                        <input type="text" name="name" id="name" placeholder="Nombre y apellidos" required>
                        <?php
                        if (isset($_SESSION['nameError'])) {
                            echo '<span class="error">' . $_SESSION['nameError'] . '</span>';
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="name">Tu correo</label>
                        <input type="text" name="email" id="email" placeholder="correo@dominio.com" required>
                        <?php
                        if (isset($_SESSION['emailError'])) {
                            echo '<span class="error">' . $_SESSION['emailError'] . '</span>';
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="description">Descripcion del proyecto</label>
                        <textarea name="description" id="description" cols="4" rows="15"
                            placeholder="Descripcion, referencias, presupuesto..." required></textarea>
                        <?php
                            if (isset($_SESSION['descriptionError'])) {
                                echo '<span class="error">' . $_SESSION['descriptionError'] . '</span>';
                            }
                        ?>
                    </div>
                    <div class="form-group">
                        <div class="h-captcha" data-sitekey="ea083fa3-a07a-481f-ba13-14a92ce9e7bd"></div>
                        <?php
                            if (isset($_SESSION['captchaError'])) {
                                echo '<span class="error">' . $_SESSION['captchaError'] . '</span>';
                            }
                        ?>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="button primary-button" name="submit" value="Enviar">
                    </div>
                    <div class="form-group">
                        <?php
                            if (isset($_SESSION['postmarkError'])) {
                                echo '<span class="error">' . $_SESSION['postmarkError'] . '</span>';
                            }
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>

    <script src="js/stickyOnScroll.js"></script>
    <script src="https://js.hcaptcha.com/1/api.js" async defer></script>
</body>

</html>
<?php
session_destroy();
?>
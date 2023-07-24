<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>

<body>
    <?php include 'header.php'; ?>
    <section id="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">¿Estás listo para<br> impulsar tu negocio?</h1>
            <p class="hero-description">Proveemos a nuestros clientes con paginas web de<br> alta calidad.</p>
            <a href="contactanos.php" class="button primary-button">Contactanos</a>
        </div>
        <!-- <img src="svg/svghero.svg" class="hero-svg" alt=""> -->
    </section>
    <section id="services-section">
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

    <section id="contact-us-section">
        <div class="section-content">
            <h1 class="section-title">
                ¿Deseas realizar un proyecto?
            </h1>
            <div class="contact-form d-block mx-auto">
                <form action="send-email.php" method="post">
                    <div class="form-group">
                        <label for="name">Tu nombre</label>
                        <input type="text" name="name" id="name" placeholder="Nombre y apellidos" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Tu correo</label>
                        <input type="text" name="email" id="email" placeholder="correo@dominio.com" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Descripcion del proyecto</label>
                        <textarea name="description" id="description" cols="4" rows="15" placeholder="Descripcion, referencias, presupuesto..." required></textarea>
                    </div>
                    <!-- <div class="form-group">
                        <div class="g-recaptcha" data-sitekey="6LdQ_UknAAAAAAR-2mKg3Pf7LhMCo0dORzqNCwWt"></div>
                    </div> -->
                    <button class="button primary-button">Enviar</button>
                </form>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>

    <script src="js/stickyOnScroll.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>

</html>
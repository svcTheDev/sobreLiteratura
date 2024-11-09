<?php 
    $header_text = "Explora la literatura universal de una forma distinta";
    require 'includes/functions.php';
    includeTemplate("header", $header_text);
?>
       <!-- END HEADER -->

        <!-- BOOKCARDS -->
        
        <main class="container">

            <div class="text-heading">
                <h2><span>Reseñas de</span>Libros</h2>
            </div>
            <div class="cards_container">

                <?php 

                    $limit = 3;
                    include 'includes/templates/reviews.php';
                ?>

                   
        
            </div>    

        </main>
        
        <!-- END BOOKCARDS -->

        <!-- CONTACT PROMO -->

        <section class="contact-promo">
            <div class="promo-content">
                <h2>¿Qué libro te gustaría ver aquí?</h2>
                <p>Llena el formulario y contacta conmigo, podemos hablar cualquier cosa :)</p>
                <a class="button-inline" href="contact.html">Contáctame</a>
            </div>
        </section>

        <!-- END CONTACT PROMO -->

        <!-- BLOG SECTION -->

        <div class="text-heading">
            <h2><span>Mi</span>Blog</h2>
        </div>

        <section class="blog-articles container">

            <article class="blog">
                <div class="blog-img">
                    <picture>
                        <source srcset="build/img/blog-img.webp" type="image/webp">
                        <source srcset="build/img/blog-img.jpg" type="img/jpeg">
                        <img loading="lazy" src="build/img/book1.jpg" alt="book1">
                    </picture>
                </div>
                <div class="blog-content">
                    <h3>Mi top 5 de libros favoritos (hasta ahora)</h3>
                    <p>Escrito el: <span>26/09/2024</span> por <span>Sergio Vargas</span></p>
                    <p>Hasta diciembre de 2023 había leído 120 libros y me dispongo a realizar un top 5 de los mejores hasta ese momento</p>
                </div>
            </article>
            <article class="blog">
                <div class="blog-img">
                    <picture>
                        <source srcset="build/img/blog-img.webp" type="image/webp">
                        <source srcset="build/img/blog-img.jpg" type="img/jpeg">
                        <img loading="lazy" src="build/img/book1.jpg" alt="book1">
                    </picture>
                </div>
                <div class="blog-content">
                    <h3>Mi top 5 de libros favoritos (hasta ahora)</h3>
                    <p>Escrito el:<span>26/09/2024</span> por <span>Sergio Vargas</span></p>
                    <p>Hasta diciembre de 2023 había leído 120 libros y me dispongo a realizar un top 5 de los mejores hasta ese momento</p>
                </div>
            </article>
            <div class="quote">
                <p>"El secreto de una buena vejez no es otra cosa que un pacto honrado con la soledad"</p>
                <p class="quote-author">Cien años de soledad - Gabriel Garciá Marquez</p>
            </div>
        </section>
        <!-- END BLOG SECTION -->
<?php 
    includeTemplate("Footer", $header_text);
?>

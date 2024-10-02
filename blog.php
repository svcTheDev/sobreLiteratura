<?php 
    $header_text = 4;
    require 'includes/functions.php';
    includeTemplate("header", $header_text);
?>
        <section class="container">

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
        </section>
<?php 
    includeTemplate("Footer", $header_text);
?>
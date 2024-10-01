<?php 
    $header_text = 2;
    include 'includes/templates/header.php';
?>
    
    <section class="about-me container">
        <div class="about-me-img">
            <picture>
                <source srcset="build/img/about-me.webp" type="image/webp">
                <source srcset="build/img/about-me.jpg" type="img/jpeg">
                <img loading="lazy" src="build/img/about-me.jpg" alt="book1">
            </picture>
        </div>
        <div>
            <h2>5 años de estar leyendo en serio</h2>
            <p>En el 2019 a mis 23 años, ya un poco tarde me tope con esta tendencia de contabilizar los libros que se leen y hasta propornerse a leer una cantidad específica de los mismos al año. Al principio me pareció algo muy superficial pero después volví a ello cuando tuve la necesidad de organizar que era lo que iba a leer a continuación cada vez que terminaba un libro, algunas personas parece que hacen incluso eso al azar, pero para mí era un sacrilegio jaja. Realmente “El que no conoce autoridad se torna tirano” dijo Rafael Lechowski y si uno se guía por lo que se antoja leer a cada rato entonces perderá de vista lo que realmente si deseaba leer o terminará por no terminar ninguna obra. Así que se volvió una motivación para mí el crear listas de libros y cumplirlas con cierta flexibilidad, adicionalmente también tener una meta que cumplir al año es muy enriquecedor si se balancea con una lectura en calma y sin presiones, disfrutando al máximo cada obra.
            </p>
            <p> Este blog existe ya que estoy aprendiendo desarrollo web y quería crear algo significativo para mí, así que combiné una pasión con otra para crear una sinergia cuya cereza del pastel es poder compartirla con los demás y que de esa manera pueda saciar la sed de cultura de personas como yo que leerán piezas extrañas, autores antiguos, temas anodinos y existenciales, pero sobre todo una literatura nómada lejos de la moda y sus designios.</p>
        </div>
    </section>

    <!-- ABOUT THE PROJECT -->

    <div class="about container">
        <div class="text-heading">
            <h2><span>EL</span>ARTE</h2>
        </div>

        <div class="icons-boxes">
            <div class="icon">
                <img src="build/img/icon1-nobg.webp" alt="">
            </div>
            <div class="icon-text">
                <h3>"El arte no puede ser obvio, debe subcomunicar"</h6>
                <p>El arte no puede ser obvio, debe sub-comunicar. El arte que es demasiado explícito, que entrega su mensaje de manera directa y sin ambigüedad, corre el riesgo de volverse predecible, superficial, o didáctico, perdiendo así su capacidad de resonar a un nivel más íntimo o intelectual.</p>
            </div>
            <div class="icon-text">
                <h3>"El arte no puede ser vacío de contenido o se hará comedido"</h6>
                <p>Cuando el arte es vacío de contenido, se vuelve comedido en el sentido de que no provoca una reacción emocional intensa ni fomenta una reflexión profunda. En lugar de desafiar o inspirar al espectador, simplemente pasa desapercibido o se percibe como una mera ornamentación. La obra puede parecer decorativa o entretenida, pero no deja una impresión duradera ni contribuye a una experiencia significativa.</p>
            </div>
            <div class="icon">
                <img src="build/img/icon2-nobg.webp" alt="">
            </div>
            <div class="icon">
                <img src="build/img/icon3.2.webp" alt="">
            </div>
            <div class="icon-text">
                <h3>"El arte es por el pueblo y para el pueblo; el arte no es burgués"</h6>
                <p>El arte debe ser una expresión genuina y accesible que refleje la vida cotidiana y las experiencias del pueblo común, en lugar de ser una herramienta de distinción social o elitismo. Para ser verdaderamente significativo, el arte debe superar las barreras de clase y estatus, abordando las inquietudes y esperanzas de la mayoría. </p>
            </div>
        </div>
    </div>
    <!-- END ABOUT THE PROJECT -->

<?php 
    include 'includes/templates/footer.php';
?>
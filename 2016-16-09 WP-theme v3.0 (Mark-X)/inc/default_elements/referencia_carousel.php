<!-- CAROUSEL.PHP -->
<div class="page-header" style="border-bottom:none; margin: 0 0 10px 0;">
    <h1 style="color:#f00">CAROUSEL.PHP</h1>
</div>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active"><img src="<? bloginfo('template_url'); ?>/img/TEMP.jpg" alt="First slide"></div>
        <div class="item"><img src="<? bloginfo('template_url'); ?>/img/TEMP.jpg" alt="Second slide"></div>
        <div class="item"><img src="<? bloginfo('template_url'); ?>/img/TEMP.jpg" alt="Third slide"></div>
    </div>
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<hr style="border-top-color: #f00;">
<!--/ CAROUSEL.PHP -->

<?php get_header('detail'); ?>
<section class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" style="margin-top:50px;">
                <div class="d-flex justify-content-center align-items-center" id="main">
                    <h1 class="mr-3 pr-3 align-top border-right inline-block align-content-center">404</h1>
                    <div class="inline-block align-middle">
                        <h2 class="font-weight-normal lead" id="desc">Halaman yang Anda cari tidak di temukan.</h2>
                    </div>
                </div>
                <hr />
                <div class="text-center mt-4 mb-4">
                    <?php get_search_form(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
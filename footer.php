<?php wp_footer(); ?>
<div class="footer-dark">
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h3>Jadilah yang pertama tahu!</h3>

                    <form name="subscribe" method="post" class="form-inline">
                        <?php
                        if (isset($_POST['kirim'])) :
                            $admin_email    = get_option('admin_email');
                            $newsubs        = $_POST['subscribermail'];

                            //echo $admin_email;

                            $to         = "$admin_email";
                            $subject    = "New Subscriber";
                            $txt        = "Hai.., ada subscriber baru dari";
                            $headers    = "From: $newsubs";
                            mail($to, $subject, $txt, $headers);
                        endif;
                        ?>
                        <label class="sr-only" for="inlineFormInputGroupemail2">Email Anda</label>
                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">@</div>
                            </div>
                            <input type="email" name="subscribermail" class="form-control" id="inlineFormInputGroupemail2" placeholder="email" required>
                        </div>

                        <button type="submit" name="kirim" class="btn btn-primary mb-2">Subscribe</button>
                    </form>
                    <ul>
                        <li><small>Jadilah yang pertama tahu tentang promo dan tips jual beli emas dengan
                                berlangganan
                                newsletter kami</small></li>
                    </ul>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-sm-6 col-md-3 item">
                            <?php
                            if (is_active_sidebar('footer1')) {
                                dynamic_sidebar('footer1');
                            }
                            ?>
                        </div>
                        <div class="col-sm-6 col-md-3 item">
                            <?php
                            if (is_active_sidebar('footer2')) {
                                dynamic_sidebar('footer2');
                            }
                            ?>
                        </div>
                        <div class="col-sm-3 col-md-3 item">
                            <?php
                            if (is_active_sidebar('footer3')) {
                                dynamic_sidebar('footer3');
                            }
                            ?>
                        </div>
                        <div class="col-sm-3 col-md-3 item">
                            <?php
                            if (is_active_sidebar('footer4')) {
                                dynamic_sidebar('footer4');
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="col item social mt-3">
                    <?php
                    if (is_active_sidebar('social')) {
                        dynamic_sidebar('social');
                    }
                    ?>
                </div>
            </div>
            <p class="copyright">Tabung Emas Digital © 2019</p>
        </div>
    </footer>
</div>
<script>
    AOS.init();
</script>
<script>
    $(function() {
        $(window).scroll(function() {

            if ($(this).scrollTop() > 80) {
                $("#navbar-top").addClass("bg-blue");
                $("#navbar-top").addClass("fixed-top");
            } else {
                //$("#to-top").fadeOut();
                $("#navbar-top").removeClass("bg-blue");
                $("#navbar-top").removeClass("fixed-top");
            }
        });
        /*
        $("#to-top").click(function () {
            $("html,body").animate({ scrollTop: 0 }, 600); // melakukan efek scroll dengan kecepatan 0.6 detik
        });
        */
    });
</script>

<script>
    if (window.matchMedia("(max-width: 767px)").matches) {

        // The viewport is less than 768 pixels wide 
        $("#navbar-top").removeClass("padding-lg");
    } else {

        // The viewport is at least 768 pixels wide 
        $("#navbar-top").addClass("padding-lg");
    }
</script>
</body>

</html>
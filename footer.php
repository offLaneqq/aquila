<?php
//  
//  Footer File
// 
?>

</div>
</div>
<footer id="site-footer" class="bg-light p-4">
    <div class="container color-gray">
        <div class="row">
            <section class="col-lg-4 col-md-6 col-sm-12">Lorem Ipsum</section>
            <section class="col-lg-4 col-md-6 col-sm-12">
                <?php
                if (is_active_sidebar('sidebar-2')) {
                    ?>
                    <aside>
                        <?php dynamic_sidebar('sidebar-2') ?>
                    </aside>
                    <?php
                }
                ?>
            </section>
            <section class="col-lg-4 col-md-6 col-sm-12">
                <ul class="d-flex">
                    <li class="list-unstyled"><a href="https://www.facebook.com/" title="facebook">
                            <svg width="48">
                                <use href="#icon-facebook"></use>
                            </svg>
                        </a></li>
                    <li class="list-unstyled"><a href="https://twitter.com/" title="twitter">
                            <svg width="48">
                                <use href="#icon-twitter"></use>
                            </svg>
                        </a></li>
                    <li class="list-unstyled"><a href="https://www.linkedin.com/" title="linkedin">
                            <svg width="48">
                                <use href="#icon-linkedin"></use>
                            </svg>
                        </a></li>
                </ul>
            </section>
        </div>
    </div>

</footer>
<?php
get_template_part('template-parts/content', 'svgs');
wp_footer(); ?>
</body>

</html>
    <footer class="footer">
      <div class="container">
        <div class="footer_inner">
          <?php $custom_logo_url = wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full'); ?>
          <div class="footer_logo">
            <a href="<?php echo home_url('/'); ?>" class="logo_link">
              <img src="<?php echo $custom_logo_url[0]; ?>" alt="company logo" class="logo_img">
            </a>
          </div>
          <div class="company_info">
            <?php if (!empty(get_field('location', 'option'))) { ?>
              <div class="location"><?php the_field('location', 'option'); ?></div>
            <?php } ?>
            <div class="footer_contact_info">
              <?php if (!empty(get_field('email', 'option'))) { ?>
                <a href="mailto:<?php the_field('email', 'option'); ?>" class="info_mail"><?php the_field('email', 'option'); ?></a>
              <?php } ?>
              <?php if (!empty(get_field('tel', 'option'))) { ?>
                <a href="tel:<?php trim(str_replace(" ", "", the_field('tel', 'option')));; ?>" class="info_mail"> <?php the_field('tel', 'option'); ?></a>
              <?php } ?>
            </div>
          </div>

        </div>
      </div>
    </footer>
    <?php wp_footer(); ?>
    </body>

    </html>
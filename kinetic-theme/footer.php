<!-- ============================================================
     FOOTER
     ============================================================ -->
<footer class="bg-slate-950 w-full rounded-t-[2rem] mt-auto" aria-label="<?php esc_attr_e( 'Site footer', 'kinetic' ); ?>">

  <div class="grid grid-cols-1 md:grid-cols-4 gap-12 px-8 md:px-12 py-20 max-w-screen-2xl mx-auto">

    <!-- Brand -->
    <div class="col-span-1 md:col-span-1" data-reveal>
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
         class="text-xl font-bold font-headline text-slate-50 mb-6 inline-block">
        <?php echo esc_html( kinetic_get( 'footer_brand_name', get_bloginfo( 'name' ) ) ); ?>
      </a>
      <p class="font-body text-sm text-slate-400 leading-relaxed">
        <?php echo esc_html( kinetic_get( 'footer_tagline', 'Engineering the future of digital presence through technical precision and visionary design.' ) ); ?>
      </p>
    </div>

    <!-- Agency links -->
    <div data-reveal>
      <h4 class="text-slate-50 font-bold mb-6 font-headline"><?php esc_html_e( 'Agency', 'kinetic' ); ?></h4>
      <ul class="space-y-4 font-body text-sm text-slate-400">
        <li><a class="hover:text-secondary transition-colors duration-300" href="#"><?php esc_html_e( 'Services', 'kinetic' ); ?></a></li>
        <li><a class="hover:text-secondary transition-colors duration-300" href="#"><?php esc_html_e( 'Work', 'kinetic' ); ?></a></li>
        <li><a class="hover:text-secondary transition-colors duration-300" href="#"><?php esc_html_e( 'Lab', 'kinetic' ); ?></a></li>
        <li><a class="hover:text-secondary transition-colors duration-300" href="#"><?php esc_html_e( 'Careers', 'kinetic' ); ?></a></li>
      </ul>
    </div>

    <!-- Connect -->
    <div data-reveal>
      <h4 class="text-slate-50 font-bold mb-6 font-headline"><?php esc_html_e( 'Connect', 'kinetic' ); ?></h4>
      <ul class="space-y-4 font-body text-sm text-slate-400">
        <li><a class="hover:text-secondary transition-colors duration-300" href="#"><?php esc_html_e( 'Twitter', 'kinetic' ); ?></a></li>
        <li><a class="hover:text-secondary transition-colors duration-300" href="#"><?php esc_html_e( 'LinkedIn', 'kinetic' ); ?></a></li>
        <li><a class="hover:text-secondary transition-colors duration-300" href="#"><?php esc_html_e( 'Instagram', 'kinetic' ); ?></a></li>
        <li><a class="hover:text-secondary transition-colors duration-300" href="#"><?php esc_html_e( 'Dribbble', 'kinetic' ); ?></a></li>
      </ul>
    </div>

    <!-- Legal -->
    <div data-reveal>
      <h4 class="text-slate-50 font-bold mb-6 font-headline"><?php esc_html_e( 'Legal', 'kinetic' ); ?></h4>
      <ul class="space-y-4 font-body text-sm text-slate-400">
        <li><a class="hover:text-secondary transition-colors duration-300" href="<?php echo esc_url( get_privacy_policy_url() ); ?>"><?php esc_html_e( 'Privacy', 'kinetic' ); ?></a></li>
        <li><a class="hover:text-secondary transition-colors duration-300" href="#"><?php esc_html_e( 'Terms', 'kinetic' ); ?></a></li>
        <li><a class="hover:text-secondary transition-colors duration-300" href="<?php echo esc_url( get_permalink( get_page_by_path( 'contact' ) ) ); ?>"><?php esc_html_e( 'Contact', 'kinetic' ); ?></a></li>
      </ul>
    </div>

  </div>

  <!-- Bottom bar -->
  <div class="px-8 md:px-12 py-6 border-t border-slate-800/50 max-w-screen-2xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-4 font-body text-sm text-slate-500">
    <div><?php echo esc_html( kinetic_get( 'footer_copyright', '© ' . date( 'Y' ) . ' KineticSEO Agency.' ) ); ?></div>
    <div class="flex items-center gap-3">
      <span class="status-dot w-2 h-2 rounded-full bg-secondary inline-block"></span>
      <?php esc_html_e( 'System Operational', 'kinetic' ); ?>
    </div>
  </div>

</footer>

<?php wp_footer(); ?>
</body>
</html>

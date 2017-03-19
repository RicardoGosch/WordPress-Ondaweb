		</main>
		<?php global $library; ?>
		<footer>
			<div class="copyright">
				<div class="wrap">
					<p>
						© <?php echo date('Y'); ?> <?php bloginfo(); ?>. Todos os direitos reservados.
						<a href="http://ondaweb.com.br/" target="_blank">
							<img src="<?php echo $library; ?>/image/ondaweb-color.png" alt="Logotipo da Agência Digital Ondaweb">
						</a>
					</p>
				</div>
			</div>
		</footer>

		<?php wp_footer(); ?>

		<?php // Modules ?>
		<?php get_template_part('content-modules-footer', get_post_format()); ?>

		<?php // Core Script ?>
		<script src="<?php echo $library; ?>/js/core.js" charset="utf-8"></script>
	</body>
</html>

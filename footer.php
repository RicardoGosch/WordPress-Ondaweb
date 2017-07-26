		</main>
		<?php global $library; ?>
		<footer>
			<div class="copyright">
				<div class="wrap">
					<p>
						© <?php echo date('Y'); ?> <?php bloginfo(); ?>. Todos os direitos reservados.
						<a href="http://ondaweb.com.br/" target="_blank">
							<img src="<?php echo $library; ?>/dist/image/ondaweb/logo-color.png" alt="Logotipo da Agência Digital Ondaweb">
						</a>
					</p>
				</div>
			</div>
		</footer>

		<?php wp_footer(); ?>

		<?php // Script's ?>
		<?php get_template_part('content-script', get_post_format()); ?>
	</body>
</html>

			<?php global $library; ?>
			<footer>
				<div class="copyright">
					<div class="wrap">
						<p>© <?php echo date('Y'); ?> <?php bloginfo(); ?>. Todos os direitos reservados.</p>
					</div>
				</div>
			</footer>

			<?php wp_footer(); ?>

			<!-- Modules -->
			<?php get_template_part('content-modules-footer', get_post_format()); ?>

			<script src="<?php echo $library; ?>/js/core.js" charset="utf-8"></script>
		</main>
	</body>
</html>

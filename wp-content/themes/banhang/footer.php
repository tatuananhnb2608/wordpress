<div id="footer-wrapper">
			<footer id="footer" class="footer">
				<div class="container">
					<div class="row">

<?php dynamic_sidebar('footer1');?>
<?php dynamic_sidebar('footer2');?>
<?php dynamic_sidebar('footer3');?>
<?php dynamic_sidebar('footer4');?>
</div>
				</div>
				<div id="copyright">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<div class="copyright">

<?php do_action('copy_right');?>
<?php do_action('social');?>
</div>
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>

	</div>


<?php wp_footer();?>
</body>






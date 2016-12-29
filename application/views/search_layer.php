<div class="layer-container">
	<div class="menu-layer">
		<?php $this->load->view('menu'); ?>
	</div>
	
	<div class="search-layer">
		<div class="search">
			<form action="pages-search-results.html">
				<div class="form-group">
					<input type="text" id="input-search" class="form-control" placeholder="type something">
					<button type="submit" class="btn btn-default disabled"><i class="ion-search"></i></button>
				</div>
			</form>
		</div><!--.search-->

		<div class="results">
			<div class="row">
				<div class="col-md-4">
					<div class="result result-users">
						<h4>USERS <small>(0)</small></h4>

						<p>No results were found</p>

					</div><!--.results-user-->
				</div><!--.col-->
				<div class="col-md-4">
					<div class="result result-posts">
						<h4>POSTS <small>(0)</small></h4>

						<p>No results were found</p>

					</div><!--.results-posts-->
				</div><!--.col-->
				<div class="col-md-4">
					<div class="result result-files">
						<h4>FILES <small>(0)</small></h4>
						<p>No results were found</p>
					</div><!--.results-files-->
				</div><!--.col-->

			</div><!--.row-->
		</div><!--.results-->
	</div><!--.search-layer-->
</div>
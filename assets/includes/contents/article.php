<div class="container container-article">
	<article class="article-page">
		<div class="article-header">
			<div class="article-data"><?php echo $post["data"];?></div>
			 —
			<div class="article-tag"><?php echo $post["category"];?></div>
		</div>
		<h1 class="article-title"><?php echo $post["title"];?></h1>
		<div class="article-post">
			<?php echo $post["content"];?>
		</div>
		
	</article>
</div>
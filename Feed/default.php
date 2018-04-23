<?php
/**
 * フィード表示
 * 呼出箇所：フィード読込Javascript
 *
 * フィード読込JavascriptよりAjaxとして呼び出される
 */
?>


<?php if (!empty($items)): ?>
	<dl class="row">
	<?php foreach ($items as $key => $item): ?>
		<dt class="col-sm-2 text-md-right text-muted"><small><?php echo date("Y.m.d", strtotime($item['pubDate']['value'])); ?></small></dt>
		<dd class="col-sm-10"><a href="<?php echo $item['link']['value']; ?>"><?php echo $item['title']['value']; ?></a></dd>
	<?php endforeach; ?>
	</dl>
<?php else: ?>
	<p style="text-align:center">－</p>
<?php endif; ?>

<?php
/**
 * パンくずナビゲーション
 *
 * BcBaserHelper::crumbsList() で呼び出す
 * （例）<?php $this->BcBaser->crumbsList() ?>
 */
?>


<div class="mb-3">
<small>
<?php
if ($this->BcBaser->isHome()) {
	echo __('ホーム');
} else {
	$crumbs = $this->BcBaser->getCrumbs();
	if (!empty($crumbs)) {
		foreach ($crumbs as $key => $crumb) {
			if ($this->BcArray->last($crumbs, $key + 1)) {
				if ($crumbs[$key + 1]['name'] == $crumb['name']) {
					continue;
				}
			}
			if ($this->BcArray->last($crumbs, $key)) {
				if ($this->viewPath != 'home' && $crumb['name']) {
					$this->BcBaser->addCrumb($crumb['name']);
				}
			} else {
				$this->BcBaser->addCrumb($crumb['name'], $crumb['url']);
			}
		}
	}
	elseif (empty($crumbs)) {
		if ($this->name == 'CakeError') {
			$this->BcBaser->addCrumb('<strong>404 NOT FOUND</strong>');
		}
	}
	$this->BcBaser->crumbs(' &gt; ', __('ホーム'));
}
?>
</small>
</div>
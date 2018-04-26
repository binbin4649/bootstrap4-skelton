<?php
/**
 * [PUBLISH] サイトマップ
 * @var BcAppView $this
 */

/* 2階層まで。
if (!isset($level)) {
	$level = 1;
}
*/
if(!isset($currentId)) {
	$currentId = null;
}
?>
<div class="collapse navbar-collapse" id="navbarCollapse">
  <?php if (isset($tree)): ?>
    <ul class="navbar-nav mr-auto">
  	<?php foreach ($tree as $content): ?>
  		<?php 
	  		$options = [];
	  		if(!empty($content['Content']['exclude_menu'])) continue;
	  		$liClass = 'nav-item';
	  		if (!empty($content['children'])){
		  		$liClass .= ' dropdown';
		  		$isDropdown = true;
		  	}else{
			  	$isDropdown = false;
			  	$options = ['class' => 'nav-link'];
		  	}
		  	if($content['Content']['id'] == $currentId || $this->BcBaser->isContentsParentId($currentId, $content['Content']['id'])) {
			  	$liClass .= ' active';
		  	}
		  	if(!empty($content['Content']['blank_link'])) {
				$options = ['target' => '_blank'];
			}
	  	?>
  		<li class="<?php echo $liClass ?>">
  		<?php if($isDropdown): ?>
  			<?php $options = ['class'=>'nav-link dropdown-toggle', 'id'=>'navbarDropdown', 'role'=>'button', 'data-toggle'=>'dropdown', 'aria-haspopup'=>'true', 'aria-expanded'=>'false'] ?>
  		<?php endif; ?>
  		<?php $this->BcBaser->link($content['Content']['title'], $this->BcBaser->getContentsUrl($content['Content']['url'], false, null, false), $options) ?>
  		<?php if($isDropdown): ?>
  			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
	  		<?php foreach($content['children'] as $child): ?>
	  			<?php $this->BcBaser->link($child['Content']['title'], $this->BcBaser->getContentsUrl($child['Content']['url'], false, null, false), array('class'=>'dropdown-item')) ?>
	  		<?php endforeach; ?>
  			</div>
  		<?php endif; ?>
  		</li>
    <?php endforeach; ?> 
	</ul>
  <?php endif; ?>
  <!--   Search box -->
	<?php  
		if (Configure::read('BcRequest.isMaintenance')) {
			return;
		}
		if (!empty($this->passedArgs['num'])) {
			$url = ['plugin' => null, 'controller' => 'search_indices', 'action' => 'search', 'num' => $this->passedArgs['num']];
		} else {
			$url = ['plugin' => null, 'controller' => 'search_indices', 'action' => 'search'];
		}
		$folders = $this->BcContents->getContentFolderList($this->request->params['Site']['id'], ['excludeId' => $this->BcContents->getSiteRootId($this->request->params['Site']['id'])]);
	?>
	<?php echo $this->BcForm->create('SearchIndex', ['type'=>'get', 'url'=>$url, 'class'=>'form-inline mt-2 mt-md-0']) ?>
	<?php echo $this->BcForm->input('SearchIndex.q', array('class'=>'form-control mr-sm-2', 'type'=>'text', 'placeholder'=>'Search', 'aria-label'=>'Search')) ?>
	<?php echo $this->BcForm->hidden('SearchIndex.s', ['value' => $this->request->params['Site']['id']]) ?>
	<?php echo $this->BcForm->submit('Search', ['div' => false, 'class' => 'btn btn-outline-success my-2 my-sm-0']) ?>
	<?php echo $this->BcForm->end() ?>
	<!--  //Search box -->
</div>
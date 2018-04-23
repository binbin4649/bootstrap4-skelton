<?php
/**
 * ヘッダー
 *
 * BcBaserHelper::header() で呼び出す
 * （例）<?php $this->BcBaser->header() ?>
 */
?>
<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="<?php echo $this->BcBaser->getSiteUrl() ?>"><?php $this->BcBaser->logo(array('link'=>false)) ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- /Elements/global_menu.php -->
    <?php $this->BcBaser->globalMenu(2) ?>
  </nav>
</header>
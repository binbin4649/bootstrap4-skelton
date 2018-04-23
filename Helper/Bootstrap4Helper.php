<?php

class Bootstrap4Helper extends BcBaserHelper {
	
	public function homeImage() {
		$theme = $this->siteConfig['theme'];
		$pathDir = getViewPath() . 'img' . DS;
		$uri = $this->getUri('/');
		$active = 1;
		for ($i = 1; $i < 6; $i++) {
			$exts = ['png', 'jpg', 'gif'];
			foreach ($exts as $ext) {
				$pathImage = $pathDir.'main_image_'.$i.'.'.$ext;
				if (file_exists($pathImage)){
					$urlImage = $uri.'theme/'.$theme.'/img/main_image_'.$i.'.'.$ext;
					if($active == 1){
						echo '<div class="carousel-item active"><img class="d-block w-100" src="';
					}else{
						echo '<div class="carousel-item"><img class="d-block w-100" src="';
					}
					echo $urlImage;
					echo '"></div>';
					$active++;
				}
			}
		}
	}
	
}
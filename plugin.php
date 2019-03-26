<?php

class pluginFacebookSocial extends Plugin {

	public function init()
	{
		$this->dbFields = array(
			'appId'=>'',
			'fb-lang'=>'en_US',
			
			'fb-save-data-size'=>'small',
			'FBenablePages-save'=>false,
            'FBenablePosts-save'=>true,
			
			'fb-like-width'=>'',
			'fb-like-data-layout'=>'standard',
			'fb-like-data-action'=>'like',
			'fb-like-data-size'=>'small',
			'fb-like-data-show-faces'=>true,
			'fb-like-data-share'=>true,
			'FBenablePages-like'=>false,
            'FBenablePosts-like'=>true,
			
			'fb-comments-width'=>'',
			'fb-comments-data-numposts'=>'',
			'FBenablePages-comments'=>false,
            'FBenablePosts-comments'=>true
		);
	}

	public function form()
	{
		global $Language;		

		$html  = '<div>';
		$html .= '<label>'.$Language->get('fb-appId').'</label>';
		$html .= '<input name="appId" id="jsappId" type="text" value="'.$this->getValue('appId').'">';
		$html .= '<p class="uk-form-help-block">How To Get An App ID and Secret Key From Facebook</p>';
		$html .= '</div>';
		
		// Выбор языка
		$html .= '<div>';
        $html .= '<label>'.$Language->get('fb-lang').'</label>';
        $html .= '<select name="fb-lang">';
        $html .= '<option value="en_US" '.($this->getValue('fb-lang')==='en_US'?'selected':'').'>English (US)</option>';
        $html .= '<option value="ru_RU" '.($this->getValue('fb-lang')==='ru_RU'?'selected':'').'>Russian</option>';
		$html .= '<option value="uk_UA" '.($this->getValue('fb-lang')==='uk_UA'?'selected':'').'>Ukrainian</option>';
        $html .= '</select>';
		$html .= '<p class="uk-form-help-block">'.$Language->get('fb-lang-form-help-block').'</p>';
        $html .= '</div>';
		
		// Кнопка «Сохранить»
		$html .= '<legend >'.$Language->get('fb-save').'</legend>';
		$html .= '<p>'.$Language->get('fb-save-text').'</p>';
		$html .= '<div>';
        $html .= '<label>'.$Language->get('fb-data-size').'</label>';
        $html .= '<select name="fb-save-data-size">';
        $html .= '<option value="small" '.($this->getValue('fb-save-data-size')=='small'?'selected':'').'>'.$Language->get('fb-small').'</option>';
        $html .= '<option value="large" '.($this->getValue('fb-save-data-size')=='large'?'selected':'').'>'.$Language->get('fb-large').'</option>';
        $html .= '</select>';
        $html .= '</div>';
		
		$html .= '<div>';
        $html .= '<label>'.$Language->get('enable-fb-on-pages').'</label>';
        $html .= '<select name="FBenablePages-save">';
        $html .= '<option value="true" '.($this->getValue('FBenablePages-save')===true?'selected':'').'>'.$Language->get('enabled').'</option>';
        $html .= '<option value="false" '.($this->getValue('FBenablePages-save')===false?'selected':'').'>'.$Language->get('disabled').'</option>';
        $html .= '</select>';
        $html .= '</div>';
		
		$html .= '<div>';
        $html .= '<label>'.$Language->get('enable-fb-on-posts').'</label>';
        $html .= '<select name="FBenablePosts-save">';
        $html .= '<option value="true" '.($this->getValue('FBenablePosts-save')===true?'selected':'').'>'.$Language->get('enabled').'</option>';
        $html .= '<option value="false" '.($this->getValue('FBenablePosts-save')===false?'selected':'').'>'.$Language->get('disabled').'</option>';
        $html .= '</select>';
        $html .= '</div>';
		
		// Кнопка «Нравится» для веб-платформы
		// ДОБАВИТЬ - Если сайт или онлайн-сервис (либо часть сервиса) содержат материалы для детей до 13 лет,
		$html .= '<legend >'.$Language->get('fb-like').'</legend>';
		$html .= '<p>'.$Language->get('fb-like-text').'</p>';
		// Width
		$html .= '<div>';
		$html .= '<label>'.$Language->get('fb-width').'</label>';
		$html .= '<input name="fb-like-width" id="fb-like-width" type="text" value="'.$this->getValue('fb-like-width').'">';
		$html .= '<p class="uk-form-help-block">'.$Language->get('fb-width-form-help-block').'</p>';
		$html .= '</div>';
		
		// Композиция standard, button_count, button или box_count
		$html .= '<div>';
        $html .= '<label>'.$Language->get('fb-data-layout').'</label>';
        $html .= '<select name="fb-like-data-layout">';
        $html .= '<option value="standard" '.($this->getValue('fb-like-data-layout')=='standard'?'selected':'').'>standard</option>';
        $html .= '<option value="button_count" '.($this->getValue('fb-like-data-layout')=='button_count'?'selected':'').'>button_count</option>';
		$html .= '<option value="button" '.($this->getValue('fb-like-data-layout')=='button'?'selected':'').'>button</option>';
		$html .= '<option value="box_count" '.($this->getValue('fb-like-data-layout')=='box_count'?'selected':'').'>box_count</option>';
        $html .= '</select>';
        $html .= '</div>';
		
		// Тип действия
		$html .= '<div>';
        $html .= '<label>'.$Language->get('fb-lang').'</label>';
        $html .= '<select name="fb-like-data-action">';
        $html .= '<option value="like" '.($this->getValue('fb-like-data-action')=='like'?'selected':'').'>like</option>';
        $html .= '<option value="recommend" '.($this->getValue('fb-like-data-action')=='recommend'?'selected':'').'>recommend</option>';
        $html .= '</select>';
        $html .= '</div>';
		
		// Размер кнопки
		$html .= '<div>';
        $html .= '<label>'.$Language->get('fb-data-size').'</label>';
        $html .= '<select name="fb-like-data-size">';
        $html .= '<option value="small" '.($this->getValue('fb-like-data-size')=='small'?'selected':'').'>'.$Language->get('fb-small').'</option>';
        $html .= '<option value="large" '.($this->getValue('fb-like-data-size')=='large'?'selected':'').'>'.$Language->get('fb-large').'</option>';
        $html .= '</select>';
        $html .= '</div>';
		
		// Показывать лица друзей
		$html .= '<div>';
		$html .= '<label>'.$Language->get('fb-data-show-faces').'</label>';
		$html .= '<select name="fb-like-data-show-faces">';
        $html .= '<option value="true" '.($this->getValue('fb-like-data-show-faces')===true?'selected':'').'>'.$Language->get('enabled').'</option>';
        $html .= '<option value="false" '.($this->getValue('fb-like-data-show-faces')===false?'selected':'').'>'.$Language->get('disabled').'</option>';
        $html .= '</select>';
		$html .= '</div>';
		
		// Включить кнопку «Поделиться» fb-like-data-share
		$html .= '<div>';
		$html .= '<label>'.$Language->get('fb-data-share').'</label>';
		$html .= '<select name="fb-like-data-share">';
        $html .= '<option value="true" '.($this->getValue('fb-like-data-share')===true?'selected':'').'>'.$Language->get('enabled').'</option>';
        $html .= '<option value="false" '.($this->getValue('fb-like-data-share')===false?'selected':'').'>'.$Language->get('disabled').'</option>';
        $html .= '</select>';
		$html .= '</div>';
		
		$html .= '<div>';
        $html .= '<label>'.$Language->get('enable-fb-on-pages').'</label>';
        $html .= '<select name="FBenablePages-like">';
        $html .= '<option value="true" '.($this->getValue('FBenablePages-like')===true?'selected':'').'>'.$Language->get('enabled').'</option>';
        $html .= '<option value="false" '.($this->getValue('FBenablePages-like')===false?'selected':'').'>'.$Language->get('disabled').'</option>';
        $html .= '</select>';
        $html .= '</div>';
		
		$html .= '<div>';
        $html .= '<label>'.$Language->get('enable-fb-on-posts').'</label>';
        $html .= '<select name="FBenablePosts-like">';
        $html .= '<option value="true" '.($this->getValue('FBenablePosts-like')===true?'selected':'').'>'.$Language->get('enabled').'</option>';
        $html .= '<option value="false" '.($this->getValue('FBenablePosts-like')===false?'selected':'').'>'.$Language->get('disabled').'</option>';
        $html .= '</select>';
        $html .= '</div>';
		
		// Плагин комментариев - добавить Порядок отображения комментариев. 
		$html .= '<legend >'.$Language->get('fb-comments').'</legend>';
		$html .= '<p>'.$Language->get('fb-comments-text').'</p>';
		// Ширина fb-comments-width="25" 
		$html .= '<div>';
		$html .= '<label>'.$Language->get('fb-width').'</label>';
		$html .= '<input name="fb-comments-width" id="fb-comments-width" type="text" value="'.$this->getValue('fb-comments-width').'">';
		$html .= '<p class="uk-form-help-block">'.$Language->get('fb-width-form-help-block').'</p>';
		$html .= '</div>';
		
		// Количество публикаций		
		$html .= '<div>';
		$html .= '<label>'.$Language->get('fb-comments-data-numposts').'</label>';
		$html .= '<input name="fb-comments-data-numposts" id="fb-comments-data-numposts" type="text" value="'.$this->getValue('fb-comments-data-numposts').'">';
		$html .= '<p class="uk-form-help-block">'.$Language->get('fb-numposts-form-help-block').'</p>';
		$html .= '</div>';
		
		$html .= '<div>';
        $html .= '<label>'.$Language->get('enable-fb-on-pages').'</label>';
        $html .= '<select name="FBenablePages-comments">';
        $html .= '<option value="true" '.($this->getValue('FBenablePages-comments')===true?'selected':'').'>'.$Language->get('enabled').'</option>';
        $html .= '<option value="false" '.($this->getValue('FBenablePages-comments')===false?'selected':'').'>'.$Language->get('disabled').'</option>';
        $html .= '</select>';
        $html .= '</div>';
		
		$html .= '<div>';
        $html .= '<label>'.$Language->get('enable-fb-on-posts').'</label>';
        $html .= '<select name="FBenablePosts-comments">';
        $html .= '<option value="true" '.($this->getValue('FBenablePosts-comments')===true?'selected':'').'>'.$Language->get('enabled').'</option>';
        $html .= '<option value="false" '.($this->getValue('FBenablePosts-comments')===false?'selected':'').'>'.$Language->get('disabled').'</option>';
        $html .= '</select>';
        $html .= '</div>';
		
		return $html;
	}
	
	public function siteBodyBegin()
	{
		if (empty($this->getValue('appId'))) {
			return false;
		}
		$html = '<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : "'.$this->getValue('appId').'",
      cookie     : true,
      xfbml      : true,
      version    : "v2.10"
    });
    FB.AppEvents.logPageView();   
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/'.$this->getValue('fb-lang').'/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, "script", "facebook-jssdk"));
</script>';
		return $html;
	}
	
	public function pageEnd()
	{
		global $pages;
		global $Url, $Page;

		$page = $pages[0];
		if (empty($page)) {
			return false;
		}
		if (empty($this->getValue('appId'))) {
			return false;
		}
		
			
		if ( !$Url->notFound() && $Url->whereAmI()=='page' ) {
			$html  = '';
			// Кнопка «Сохранить»	
			if (($this->getDbField('FBenablePosts-save') && $Page->status()=='published') || 
			($this->getDbField('FBenablePages-save') && $Page->status()=='static')) {
				$html  .= '<div class="fb-save" data-uri="'.$page->permalink().'" data-size="'.$this->getValue('fb-save-data-size').'"></div>';				
			}
			
			// кнопки «Нравится»
			if (($this->getDbField('FBenablePosts-like') && $Page->status()=='published') || 
			($this->getDbField('FBenablePages-like') && $Page->status()=='static')) 
			{
				$html .= '<div class="fb-like" data-href="'.$page->permalink().'" ';
				$html .= ($this->getValue('fb-like-width')!=''?'data-width="'.$this->getValue('fb-like-width').'" ':'');
				$html .= 'data-layout="'.$this->getValue('fb-like-data-layout').'" ';
				$html .= 'data-action="'.$this->getValue('fb-like-data-action').'" ';
				$html .= 'data-size="'.$this->getValue('fb-like-data-size').'" ';
				$html .= ($this->getValue('fb-like-data-show-faces')===true?'data-show-faces="true" ':'data-show-faces="false" ');
				$html .= ($this->getValue('fb-like-data-share')===true?'data-share="true" ':'data-share="false" ');
				$html .= '></div>';
			}
			
			// Плагин комментариев
			if ( (($this->getDbField('FBenablePosts-comments') && $Page->status()=='published') || 
				($this->getDbField('FBenablePages-comments') && $Page->status()=='static'))
				 && $page->allowComments() ) 
			{
						$html .= '<div class="fb-comments" data-href="'.$page->permalink().'"';
						$html .= ($this->getValue('fb-comments-width')!=''?' data-width="'.$this->getValue('fb-comments-width').'"':'');
						$html .= ($this->getValue('fb-comments-data-numposts')!=''?' data-numposts="'.$this->getValue('fb-comments-data-numposts').'"':'');
						$html .= '></div>';
			}
			return $html;
		}		

		return false;
	}

}

<?php
class Page extends Base
{
	public function action_index(){
		$this->title .= 'Главная';
        $slogan = "The Brand Of Lux Fashion";
		$this->content = $this->Template('views/index.php', array('slogan' => $slogan));
	}
}

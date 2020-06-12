<?php
namespace app\models;

use app\core\Model;

class Photo extends Model{
  
	public function getSrcs(){
    $src = ['/web.loc/public/assets/img/Cyborg.png','/web.loc/public/assets/img/Cute_Mercy.png',
      '/web.loc/public/assets/img/Junkrat_Cute.png','/web.loc/public/assets/img/Mei_Face.png','/web.loc/public/assets/img/Overwatch_Logo.png',
      '/web.loc/public/assets/img/PI_Ana_Face.png','/web.loc/public/assets/img/PI_Bewitching.png','/web.loc/public/assets/img/widow.png',
      '/web.loc/public/assets/img/D.Va_Cute.png','/web.loc/public/assets/img/PI_Snowman.png','/web.loc/public/assets/img/PI_Sombra_Skull.png',
      '/web.loc/public/assets/img/PI_The_Doctor.png','/web.loc/public/assets/img/PI_The_Reaper.png','/web.loc/public/assets/img/hero.png',
      '/web.loc/public/assets/img/Tracer_Face.png'
    ];
		return $src;
  }

  public function getTitles(){
    $title = [
      "Cyborg", "Mercy","Junkrat","Mei","Overwatch_Logo","Ana_Face",
      "Bewitching","Widow","D.Va","Snowman","Sombra","The_Doctor",
      "The_Doctor","The_Reaper","Torb","Tracer"
  ];
		return $title;
  }
}
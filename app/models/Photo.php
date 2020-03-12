<?php
namespace app\models;

use app\core\Model;

class Photo extends Model{
	public function getSrcs(){
    $src = ['/public/assets/img/Cyborg.png','/public/assets/img/Cute_Mercy.png',
      '/public/assets/img/Junkrat_Cute.png','/public/assets/img/Mei_Face.png','/public/assets/img/Overwatch_Logo.png',
      '/public/assets/img/PI_Ana_Face.png','/public/assets/img/PI_Bewitching.png','/public/assets/img/widow.png',
      '/public/assets/img/D.Va_Cute.png','/public/assets/img/PI_Snowman.png','/public/assets/img/PI_Sombra_Skull.png',
      '/public/assets/img/PI_The_Doctor.png','/public/assets/img/PI_The_Reaper.png','/public/assets/img/hero.png',
      '/public/assets/img/Tracer_Face.png'
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
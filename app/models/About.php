<?php
namespace app\models;

use app\core\Model;

class Interest extends Model{
	public function getAnchors(){
		$anchors = [
			'hobbi', 'Мое хобби',
			'books', 'Мои книги',
			'films', 'Мои фильмы'
		];
		return $anchors;
	}
	public function getFilms(){
		$films = [
			'Начало',
      'Темный рыцарь',
      'Престиж',
      'Железный человек'
		];
		return $films;
	}
	public function getHobbi(){
		$hobbi = [
			'Футбол',
			'Программирование',
			'Компьютерные игры',
			'WEB'
		];
		return $hobbi;
	}
	public function getBooks(){
		$books = [
			'Jorge Orwell "1984"',
			'Ernest Cline "Ready player one"',
			'Desmond Morris "The Naked Ape"',
			'Charles Petzold "Code"'
		];
		return $books;
	}
}

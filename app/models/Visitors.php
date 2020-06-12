<?php

namespace app\models;

use app\core\BaseActiveRecord;
use app\models\validators\BlogValidation;


class Visitors extends BaseActiveRecord
{

  protected static $tablename = 'visitors';

  public $date;

  public $page;

  public $created_at;

  public $ip;

  public $host;

  public $browser;

  public function __construct($validator = null)
  {
    $validator = new BlogValidation;
    parent::__construct($validator);
  }

  public function valid()
  {
    parent::valid();
  }

  public function save_statistic($page)
  {
    //print_r(date('h:m:s d.m.Y')); die();
    $this->created_at = date('h:m:s d.m.Y');
    $this->page = $page;
    $this->ip = $_SERVER['REMOTE_ADDR'];
    $this->host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
    $browser = $this->getBrowser();
    $this->browser = $browser['name'].'  '.$browser['version'];
    $this->save();
  }

  public function linksPages()
  {
    // количество записей, выводимых на странице
    $per_page = 15;

    // получаем номер страницы
    $page = (int) (isset($_GET['page']) ? ($_GET['page'] - 1) : 0);

    // вычисляем первый операнд для LIMIT
    $start = abs($page * $per_page);

    // выполняем запрос и выводим записи
    $query = "SELECT * FROM " . static::$tablename . " ORDER BY `" . static::$tablename . "`.`created_at` DESC LIMIT $start, $per_page";

    $rows = static::$pdo->query($query);

    $pages = [];
    // выводим ссылки на страницы:
    $query = "SELECT count(*) FROM " . static::$tablename;
    $total_rows = static::$pdo->query($query)->fetchColumn();

    // Определяем общее количество страниц
    $num_pages = (int) ceil($total_rows / $per_page);

    for ($i = 1; $i <= $num_pages; $i++) {
      // текущую страницу выводим без ссылки
      if ($i - 1 == $page) {
        $pages[$i] = "$i ";

        if ($i + 1 > $num_pages) $next = "<a  class='disabled' href='show?page=" . $i . "'> Следующая </a> ";
        else $next = "<a  class='disabled' href='show?page=" . ($i + 1) . "'> Следующая </a> ";

        if ($i - 1 == 0) $prev = "<a class='disabled' href='show?page=" . $i . "'> Предыдущая </a> ";
        else $prev = "<a  href='show?page=" . ($i - 1) . "'> Предыдущая </a> ";
      } else {
        $pages[$i] = "<a href='show?page=" . $i . "'>" . $i . "</a> ";
      }
    }

    return [
      'rows' => $rows,
      'pages' => $pages,
      'prev' => $prev,
      'next' => $next
    ];
  }

  function getBrowser()
  {
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version = "";

    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
      $platform = 'linux';
    } elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
      $platform = 'mac';
    } elseif (preg_match('/windows|win32/i', $u_agent)) {
      $platform = 'windows';
    }

    // Next get the name of the useragent yes seperately and for good reason
    if (preg_match('/MSIE/i', $u_agent) && !preg_match('/Opera/i', $u_agent)) {
      $bname = 'Internet Explorer';
      $ub = "MSIE";
    } elseif (preg_match('/Firefox/i', $u_agent)) {
      $bname = 'Mozilla Firefox';
      $ub = "Firefox";
    } elseif (preg_match('/Chrome/i', $u_agent)) {
      $bname = 'Google Chrome';
      $ub = "Chrome";
    } elseif (preg_match('/Safari/i', $u_agent)) {
      $bname = 'Apple Safari';
      $ub = "Safari";
    } elseif (preg_match('/Opera/i', $u_agent)) {
      $bname = 'Opera';
      $ub = "Opera";
    } elseif (preg_match('/Netscape/i', $u_agent)) {
      $bname = 'Netscape';
      $ub = "Netscape";
    }

    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
      ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
      // we have no matching number just continue
    }

    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
      //we will have two since we are not using 'other' argument yet
      //see if version is before or after the name
      if (strripos($u_agent, "Version") < strripos($u_agent, $ub)) {
        $version = $matches['version'][0];
      } else {
        $version = $matches['version'][1];
      }
    } else {
      $version = $matches['version'][0];
    }

    // check if we have a number
    if ($version == null || $version == "") {
      $version = "?";
    }

    return array(
      'userAgent' => $u_agent,
      'name'      => $bname,
      'version'   => $version,
      'platform'  => $platform,
      'pattern'    => $pattern
    );
  }
}

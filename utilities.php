<?php
//Rearranging array by date ascending
function sortDateAscending($articles) {
  usort($articles, function($a, $b) {
    if ($a["dateFormatted"] == $b["dateFormatted"]) {
      return 0;
    } elseif ($a["dateFormatted"] < $b["dateFormatted"]) {
      return -1;
    } else {
      return 1;
    }
  });
  return $articles;
}

//Rearranging array by date descending
function sortDateDescending($articles) {
  usort($articles, function($a, $b) {
    if ($a["dateFormatted"] == $b["dateFormatted"]) {
      return 0;
    } elseif ($a["dateFormatted"] < $b["dateFormatted"]) {
      return 1;
    } else {
      return -1;
    }
  });
  return $articles;
}

//Getting the lang parameter from url
function getLang() {
  $lang = $_GET['lang'] ?? 'es';
  if (!in_array($lang, ['es', 'en'])) {
    $lang = 'es';
  }
  return ($lang);
}

//Rearranging array by alphabetic ascending
function sortAlphabeticAscending($articles) {
  $lang = getLang();
  usort($articles, function($a, $b) use ($lang) {
    return strcmp($a["title"][$lang], $b["title"][$lang]);
  });
  return $articles;
}

//Rearranging array by alphabetic descending
function sortAlphabeticDescending($articles) {
  $lang = getLang();
  usort($articles, function($a, $b) use ($lang) {
    return strcmp($b["title"][$lang], $a["title"][$lang]);
  });
  return $articles;
}

//Trimming content 120 words
function trimContent(&$articles) {
  foreach ($articles as &$article) {
    foreach ($article['content'] as &$content) {
      $contentArr = explode(' ', $content);
      if (count($contentArr) > 120) {
        $contentTrim = array_slice($contentArr, 0, 120);
        $content = implode(' ', $contentTrim);
      }
    }
  }
  return $articles;
}
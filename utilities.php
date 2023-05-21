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

//Rearranging array by alphabetic ascending
function sortAlphabeticAscending($articles) {
  usort($articles, function($a, $b) {
    return strcmp($a["title"], $b["title"]);
  });
  return $articles;
}

//Rearranging array by alphabetic descending
function sortAlphabeticDescending($articles) {
  usort($articles, function($a, $b) {
    return strcmp($b["title"], $a["title"]);
  });
  return $articles;
}
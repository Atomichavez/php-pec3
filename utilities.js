function updateLocation() {
  var sortOrder = document.getElementById('sortOrder').value;
  var lang = document.getElementById('lang').value;
  var href = 'blog.php';

  var params = new URLSearchParams(window.location.search);
  if (sortOrder) {
    params.set('sortOrder', sortOrder);
  }
  if (lang && lang !== 'es') {
    params.set('lang', lang);
  } else {
    params.delete('lang');
  }
  if (Array.from(params).length) {
    href += '?' + params.toString();
  }
  window.location.href = href;
}

function initSelectFields() {
  var params = new URLSearchParams(window.location.search);
  var sortOrder = params.get('sortOrder');
  var lang = params.get('lang') || 'es';

  document.getElementById('sortOrder').value = sortOrder || '';
  document.getElementById('lang').value = lang;
}

window.onload = function() {
  document.getElementById('sortOrder').addEventListener('change', updateLocation);
  document.getElementById('lang').addEventListener('change', updateLocation);
  // Initialize select fields when the page loads
  initSelectFields();
}
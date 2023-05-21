// Definimos la función 'updateLocation', que se encargará de actualizar la URL de la página.
function updateLocation() {
  // Obtenemos el valor de los select 'sortOrder' y 'lang'.
  var sortOrder = document.getElementById('sortOrder').value;
  var lang = document.getElementById('lang').value;
  var href = 'blog.php';

  // Creamos un objeto URLSearchParams con los parámetros actuales de la URL.
  var params = new URLSearchParams(window.location.search);

  // Si 'sortOrder' tiene un valor, lo agregamos a los parámetros.
  if (sortOrder) {
    params.set('sortOrder', sortOrder);
  }

  // Si 'lang' tiene un valor y es distinto de 'es', lo agregamos a los parámetros.
  // Si 'lang' es igual a 'es', eliminamos el parámetro 'lang' (ya que 'es' es el valor por defecto y no necesitamos especificarlo en la URL).
  if (lang && lang !== 'es') {
    params.set('lang', lang);
  } else {
    params.delete('lang');
  }

  // Si hay algún parámetro, lo agregamos a la URL.
  if (Array.from(params).length) {
    href += '?' + params.toString();
  }

  // Redirigimos la página a la nueva URL.
  window.location.href = href;
}

// Definimos la función 'initSelectFields', que se encargará de inicializar los select 'sortOrder' y 'lang' con los valores de los parámetros de la URL.
function initSelectFields() {
  // Creamos un objeto URLSearchParams con los parámetros actuales de la URL.
  var params = new URLSearchParams(window.location.search);

  // Obtenemos los valores de los parámetros 'sortOrder' y 'lang'.
  // Si 'lang' no tiene un valor, usamos 'es' como valor por defecto.
  var sortOrder = params.get('sortOrder');
  var lang = params.get('lang') || 'es';

  // Asignamos los valores obtenidos a los select 'sortOrder' y 'lang'.
  document.getElementById('sortOrder').value = sortOrder || '';
  document.getElementById('lang').value = lang;
}

// Cuando la página se ha cargado completamente...
window.onload = function() {
  // Agregamos un 'event listener' a los select 'sortOrder' y 'lang'. Cuando el valor de uno de estos select cambie, llamaremos a la función 'updateLocation'.
  document.getElementById('sortOrder').addEventListener('change', updateLocation);
  document.getElementById('lang').addEventListener('change', updateLocation);

  // Inicializamos los select 'sortOrder' y 'lang' con los valores de los parámetros de la URL.
  initSelectFields();
}
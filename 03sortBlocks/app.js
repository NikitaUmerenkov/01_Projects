// Получаем все блоки с data-атрибутом
var blocks = $('[data-width]');
// Сортируем блоки по ширине
blocks.sort(function(a, b) {
  var widthA = parseInt($(a).data('width'));
  var widthB = parseInt($(b).data('width'));
  return widthA - widthB;
});
// Перемещаем отсортированные блоки на странице
blocks.each(function() {
  $(this).appendTo('body');
});
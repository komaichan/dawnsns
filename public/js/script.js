/* ハンバーガーメニュー */
$(function () {
  $(`.menu-trigger`).click(function () {
    $(this).toggleClass(`active`);
    $(".user-nav").slideToggle();
    if ($(this).hasClass(`active`)) {
      $(`.user-nav`).addClass(`active`);
    } else {
      $(`.user-nav`).removeClass(`active`);
    }
  });
  $(`.nav-wrapper ul li a`).click(function () {
    $(`.menu-trigger`).removeClass(`active`);
    $(`.user-nav`).removeClass(`active`);
  });
});


/* モーダル（編集画面表示） */

$(function () { //①
  $('.edit').each(function () {
    $(this).on('click', function () {
      $('.edit-trash form').fadeIn();
      return false;
    });
  });
});

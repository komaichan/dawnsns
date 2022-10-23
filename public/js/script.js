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

// $(function () {
//   $('#Modal').each(function () {
//     $(this).on('click', function () {
//       $('.edit-form').fadeIn();
//       return false;
//     });
//   });
// });

$(function () {
  $('.edit-link').each(function () {
    $(this).on('click', function () {
      var target = $(this).data('#Modal');

      var modal = document.getElementById(target);
      $('.edit-trash form').fadeIn();
      return false;
    });
  });
});

addEventListener('click', outsideClose);
function outsideClose(e) {
  if (e.target == modal) {
    modal.style.display = 'none';
  }
}

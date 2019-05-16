/**
 * Toggle Confirm Delete action
 */
const deleteBtn = $('.delete-btn');
if (deleteBtn.length) {
  $(deleteBtn).click((event) => {
    // if ($(event.currentTarget).attr('data-title').length) {
    //   $('.modal-title').text($(event.currentTarget).attr('data-title'));
    // }

    // if ($(event.currentTarget).attr('data-content').length) {
    //   $('.modal-content p').text($(event.currentTarget).attr('data-content'));
    // }

    $('#frmConfirmDelete').attr('action', $(event.currentTarget).attr('href'));

    $('#delete-modal').modal();
  });
}
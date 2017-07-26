let axios = require('axios');

$('body').on('click', '.delete-bookmark', function () {
    alert($(this).data('id'));
    let id = $(this).data('id');

    axios.delete('/bookmarks/' + id)
        .then(function () {
            window.location.reload();
        })
        .catch(function (err) {
            console.log(err);
        });

});
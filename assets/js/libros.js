function editBook(book) {
    document.getElementById('book-id').value = book.id;
    document.getElementById('libro').value = book.libro;
    document.getElementById('estado').value = book.Estado;
    document.getElementById('form-action').value = 'update';
}

function prestarLibro(id) {
    var formData = new FormData();
    formData.append('action', 'prestar');
    formData.append('id', id);

    fetch('', {
        method: 'POST',
        body: formData
    }).then(response => response.text())
      .then(data => location.reload());
}

function devolverLibro(id) {
    var formData = new FormData();
    formData.append('action', 'devolver');
    formData.append('id', id);

    fetch('', {
        method: 'POST',
        body: formData
    }).then(response => response.text())
      .then(data => location.reload());
}
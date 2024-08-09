let pdfDoc = null,
    pageNum = 1,
    pageRendering = false,
    pageNumPending = null,
    scale = 1.5,
    canvas = document.getElementById('pdf-render'),
    ctx = canvas.getContext('2d');

// Render the page
const renderPage = num => {
    pageRendering = true;

    pdfDoc.getPage(num).then(page => {
        const viewport = page.getViewport({ scale });
        canvas.height = viewport.height;
        canvas.width = viewport.width;

        const renderContext = {
            canvasContext: ctx,
            viewport
        };

        const renderTask = page.render(renderContext);

        renderTask.promise.then(() => {
            pageRendering = false;

            if (pageNumPending !== null) {
                renderPage(pageNumPending);
                pageNumPending = null;
            }
        });

        document.getElementById('page-num').textContent = num;
    });
};

// Queue rendering of the next page if another render is in progress
const queueRenderPage = num => {
    if (pageRendering) {
        pageNumPending = num;
    } else {
        renderPage(num);
    }
};

// Show previous page
document.getElementById('prev-page').addEventListener('click', () => {
    if (pageNum <= 1) {
        return;
    }
    pageNum--;
    queueRenderPage(pageNum);
});

// Show next page
document.getElementById('next-page').addEventListener('click', () => {
    if (pageNum >= pdfDoc.numPages) {
        return;
    }
    pageNum++;
    queueRenderPage(pageNum);
});

// Load document
const loadDocument = url => {
    pdfjsLib.getDocument(url).promise.then(pdfDoc_ => {
        pdfDoc = pdfDoc_;
        document.getElementById('page-count').textContent = pdfDoc.numPages;
        document.getElementById('pdf-container').style.display = 'block';
        renderPage(pageNum);
    });
};

document.getElementById('upload-form').addEventListener('submit', event => {
    event.preventDefault();
    const formData = new FormData(event.target);
    fetch('upload.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            loadDocument(data.url);
        } else {
            alert('Error al subir el archivo.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error al subir el archivo.');
    });
});

// Toggle mode
document.getElementById('mode-toggle').addEventListener('click', () => {
    const body = document.body;
    body.classList.toggle('night-mode');
    if (body.classList.contains('night-mode')) {
        document.getElementById('mode-toggle').textContent = 'Day mode';
    } else {
        document.getElementById('mode-toggle').textContent = 'Night mode';
    }
});

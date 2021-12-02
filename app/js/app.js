function copyToClipboard(elementText) {
    navigator.clipboard.writeText(elementText);
}

function loadListeners() {
    document.querySelectorAll('.pl_listed_cell').forEach(function (cell) {
        cell.addEventListener('click', function (e) {
            copyToClipboard(e.target.innerText);
        })
    });
}

function init() {
    if (!navigator.clipboard) {
        document.getElementById("clipboardNotSupported").classList.add('show-msg');
    } else {
        loadListeners();
    }
}

window.addEventListener('DOMContentLoaded', init);
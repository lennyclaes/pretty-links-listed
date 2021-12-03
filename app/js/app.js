/**
 * Author: Lenny Claes
 * Copies a clicked link to the clipboard
 * Next version: show a tooltip
 */

function copyToClipboard(elementText) {
    // Add the text to the clipboard
    navigator.clipboard.writeText(elementText);
}

function loadListeners() {
    document.querySelectorAll('.pl_listed_cell-url').forEach(function (cell) {
        // Add a listener on each URL cell and pass it the text
        cell.addEventListener('click', function (e) {
            copyToClipboard(e.target.innerText);
        })
    });
}

// Checks if clipboard API is supported by the browser
function init() {
    if (!navigator.clipboard) {
        // If not supported: show error message
        // Done this way to support IE
        document.getElementById("clipboardNotSupported").classList.add('show-msg');
    } else {
        // Load the eventlisteners on the items
        loadListeners();
    }
}

// Wait for the DOM to be loaded so that we can add listeners
window.addEventListener('DOMContentLoaded', init);
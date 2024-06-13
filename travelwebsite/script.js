document.addEventListener('DOMContentLoaded', (event) => {
    const logoutLink = document.getElementById('logout-link');
    const logoutModal = document.getElementById('logout-modal');
    const closeButton = document.getElementById('close-button');
    const confirmLogout = document.getElementById('confirm-logout');
    const cancelLogout = document.getElementById('cancel-logout');

    logoutLink.onclick = function() {
        logoutModal.style.display = "block";
    };

    closeButton.onclick = function() {
        logoutModal.style.display = "none";
    };

    cancelLogout.onclick = function() {
        logoutModal.style.display = "none";
    };

    confirmLogout.onclick = function() {
        // Add your logout logic here, for example:
        // window.location.href = '/logout-url';
        alert('Logged out successfully!'); // This is just a placeholder
        logoutModal.style.display = "none";
    };

    window.onclick = function(event) {
        if (event.target == logoutModal) {
            logoutModal.style.display = "none";
        }
    };
});

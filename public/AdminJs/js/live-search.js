// Live Search Functionality for Admin Manage Pages
document.addEventListener('DOMContentLoaded', function() {
    // Check if there's a search input on the page
    const searchInput = document.querySelector('.live-search-input');
    if (!searchInput) return;

    const searchTableBody = searchInput.getAttribute('data-search-target') || 'table tbody';
    const tableBody = document.querySelector(searchTableBody);

    if (!tableBody) return;

    searchInput.addEventListener('input', function(e) {
        const searchTerm = e.target.value.toLowerCase().trim();
        const rows = tableBody.querySelectorAll('.user-item-admin');

        rows.forEach(row => {
            // Get all data attributes that contain searchable content
            const dataName = row.getAttribute('data-user-name') || '';
            const dataEmail = row.getAttribute('data-user-email') || '';
            const dataRole = row.getAttribute('data-user-role') || '';

            // Check if any data attribute contains the search term
            const matches = dataName.includes(searchTerm) ||
                           dataEmail.includes(searchTerm) ||
                           dataRole.includes(searchTerm) ||
                           row.textContent.toLowerCase().includes(searchTerm);

            if (matches) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });

        // Update no results message
        updateNoResultsMessage(tableBody, searchTerm);
    });

    function updateNoResultsMessage(tableBody, searchTerm) {
        let noResultsMsg = tableBody.querySelector('.no-results-message');
        const visibleRows = tableBody.querySelectorAll('.user-item-admin:not([style*="display: none"])');

        if (visibleRows.length === 0) {
            if (!noResultsMsg) {
                noResultsMsg = document.createElement('tr');
                noResultsMsg.className = 'no-results-message';
                noResultsMsg.innerHTML = `<td colspan="10" class="text-center py-4 text-muted">No results found for "${searchTerm}"</td>`;
                tableBody.appendChild(noResultsMsg);
            }
            noResultsMsg.style.display = '';
        } else {
            if (noResultsMsg) {
                noResultsMsg.style.display = 'none';
            }
        }
    }
});

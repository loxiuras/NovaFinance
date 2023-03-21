
const pageHeaderUserDropdownName = 'page-header-user-dropdown';
const pageHeaderUserDropdownContainerName = 'page-header-user-dropdown-container';

const pageHeaderUserDropdown = document.getElementById(pageHeaderUserDropdownName);
const pageHeaderUserDropdownContainer = document.getElementById(pageHeaderUserDropdownContainerName);

if (pageHeaderUserDropdown && pageHeaderUserDropdownContainer) {
    pageHeaderUserDropdown.addEventListener('click', () => {
        pageHeaderUserDropdown.classList.toggle('show');
        pageHeaderUserDropdownContainer.classList.toggle('show');
    });
}

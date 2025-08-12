const nav = document.getElementById('nav');
const site = document.getElementById('site');

nav.addEventListener('click', function() {
    if(nav.checked) {
      site.style.maxHeight = site.scrollHeight + 'px';
    } else {
      site.style.removeProperty('max-height');
    }
});
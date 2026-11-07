/** Shared mobile navigation, optional on pages without the portfolio navbar. */
export function initNavigation() {
  const toggle = document.querySelector('#burger-nav');
  const nav = document.querySelector('.main-nav');
  const aside = document.querySelector('.in-page-content-navigation');
  if (!toggle || !nav) return;

  function closeMenu() {
    nav.classList.remove('show');
    aside?.classList.remove('slide-nav');
    toggle.className = 'ri-menu-line';
    toggle.setAttribute('aria-expanded', 'false');
  }
  toggle.setAttribute('role', 'button');
  toggle.setAttribute('tabindex', '0');
  toggle.setAttribute('aria-label', 'Toggle navigation');
  toggle.setAttribute('aria-expanded', 'false');
  const toggleMenu = () => {
    const opened = nav.classList.toggle('show');
    aside?.classList.toggle('slide-nav', opened);
    toggle.className = opened ? 'ri-close-line' : 'ri-menu-line';
    toggle.setAttribute('aria-expanded', String(opened));
  };
  toggle.addEventListener('click', toggleMenu);
  toggle.addEventListener('keydown', (event) => {
    if (event.key === 'Enter' || event.key === ' ') {
      event.preventDefault();
      toggleMenu();
    }
  });
  nav.querySelectorAll('a').forEach((link) => link.addEventListener('click', closeMenu));
  document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') closeMenu();
  });
}

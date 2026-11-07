import { observeReveals } from '../common/reveal.js';

/** PHP renders project cards and category counts; JS provides instant filters. */
export function initProjectsPage() {
  const grid = document.getElementById('projectGrid');
  const filterBar = document.getElementById('projectFilters');
  const search = document.getElementById('projectSearch');
  const count = document.getElementById('projectResultCount');
  const empty = document.getElementById('projectsEmpty');
  if (!grid || !filterBar || !search || !count || !empty) return;

  const cards = [...grid.querySelectorAll('.project-card[data-category]')];
  const buttons = [...filterBar.querySelectorAll('button[data-category]')];
  const categories = new Set(buttons.map((button) => button.dataset.category));
  function readUrl() {
    const params = new URLSearchParams(window.location.search);
    const category = params.get('category') || '';
    return {
      category: categories.has(category) ? category : '',
      term: params.get('search') || '',
    };
  }
  let { category: selectedCategory, term } = readUrl();
  search.value = term;

  function syncUrl() {
    const url = new URL(window.location.href);
    if (selectedCategory) url.searchParams.set('category', selectedCategory);
    else url.searchParams.delete('category');
    if (term.trim()) url.searchParams.set('search', term.trim());
    else url.searchParams.delete('search');
    window.history.replaceState(null, '', url);
  }

  function render() {
    const normalized = term.trim().toLocaleLowerCase();
    let visible = 0;
    cards.forEach((card) => {
      const show = (!selectedCategory || card.dataset.category === selectedCategory)
        && (!normalized || card.dataset.search.includes(normalized));
      card.hidden = !show;
      if (show) visible += 1;
    });
    count.textContent = `${visible} ${visible === 1 ? 'project' : 'projects'}`;
    empty.hidden = visible !== 0;
    buttons.forEach((button) => {
      const active = button.dataset.category === selectedCategory;
      button.classList.toggle('is-active', active);
      button.setAttribute('aria-pressed', String(active));
    });
    observeReveals(grid);
  }

  filterBar.addEventListener('click', (event) => {
    const button = event.target.closest('button[data-category]');
    if (!button) return;
    selectedCategory = button.dataset.category;
    syncUrl();
    render();
  });
  search.addEventListener('input', () => {
    term = search.value;
    syncUrl();
    render();
  });
  function reset() {
    selectedCategory = '';
    term = '';
    search.value = '';
    syncUrl();
    render();
  }
  document.getElementById('resetProjectFilters')?.addEventListener('click', reset);
  document.addEventListener('keydown', (event) => {
    const element = event.target;
    const typing = element.isContentEditable || ['INPUT', 'TEXTAREA', 'SELECT'].includes(element.tagName);
    if (event.key === '/' && !typing && !event.ctrlKey && !event.metaKey && !event.altKey) {
      event.preventDefault();
      search.focus();
    } else if (event.key === 'Escape' && document.activeElement === search) {
      search.value = '';
      term = '';
      syncUrl();
      render();
      search.blur();
    }
  });
  window.addEventListener('popstate', () => {
    ({ category: selectedCategory, term } = readUrl());
    search.value = term;
    render();
  });
  render();
}

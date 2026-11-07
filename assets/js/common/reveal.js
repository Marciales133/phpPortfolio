/** Existing scroll-reveal animation. New elements can be observed after rendering. */
let observer;
export function observeReveals(root = document) {
  const elements = root.querySelectorAll('.reveal:not(.show)');
  if (!('IntersectionObserver' in window)) {
    elements.forEach((el) => el.classList.add('show'));
    return;
  }
  observer ??= new IntersectionObserver((entries) => {
    for (const entry of entries) {
      if (!entry.isIntersecting) continue;
      entry.target.classList.add('show');
      observer.unobserve(entry.target);
    }
  }, { threshold: 0.2 });
  elements.forEach((el) => observer.observe(el));
}

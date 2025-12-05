(function () {
  const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  document.addEventListener('DOMContentLoaded', () => {
    if (!prefersReduced) {
      document.body.classList.remove('is-preloading');
    }
  });

  document.addEventListener('click', (e) => {
    const a = e.target.closest('a');
    if (!a) return;

    const href = a.getAttribute('href') || '';

    const isHash = href.startsWith('#');
    const isExternal = a.target === '_blank' || (a.origin && a.origin !== location.origin);
    const isSpecial = href.startsWith('mailto:') || href.startsWith('tel:') || href.startsWith('javascript:');

    if (isHash || isExternal || isSpecial) return;

    if (prefersReduced) return;

    e.preventDefault();
    document.body.classList.add('is-transitioning');

    setTimeout(() => {
      window.location.href = href;
    }, 350);
  });
})();
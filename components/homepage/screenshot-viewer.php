<style>
    button.screenshot-open {
        display: block;
        padding: 0;
        border: 0;
        background: transparent;
        cursor: zoom-in;
        scale: 1 !important;
        transition: none !important;
    }
    [data-ne6-slide] .screenshot-open,
    [data-ne6-transition-ghost] .screenshot-open { width: 100%; height: 100%; }
    .screenshot-open img { cursor: inherit; }
    .screenshot-open:focus-visible { outline: none; }
    .screenshot-open:focus-visible img { outline: 2px solid #fff; outline-offset: -4px; box-shadow: inset 0 0 0 4px #171717; }
    .motion-device-layer > div > .screenshot-open { flex: 1 1 0; min-height: 0; width: 100%; height: auto; overflow: hidden; }
    .motion-device-layer > div > .screenshot-open > img { display: block; width: 100%; height: 100%; aspect-ratio: auto; object-fit: cover; object-position: top; }
    html:has(#screenshot-overlay[open]) { overflow: hidden; scrollbar-gutter: stable; }
    #screenshot-overlay {
        position: fixed;
        inset: 0;
        margin: 0;
        padding: 0;
        border: 0;
        width: 100%;
        height: 100%;
        max-width: none;
        max-height: none;
        background: transparent;
        color: #fff;
        overflow: hidden;
        box-sizing: border-box;
    }
    #screenshot-overlay:not([open]) { display: none; }
    #screenshot-overlay[open] {
        display: grid;
        place-items: center;
        padding: 56px 16px 16px;
        animation: screenshot-appear 180ms ease-out;
    }
    #screenshot-overlay::backdrop { background: rgb(0 0 0 / 85%); }
    #screenshot-overlay img {
        display: block;
        width: auto;
        height: auto;
        max-width: 100%;
        max-height: calc(100dvh - 72px);
        object-fit: contain;
        border-radius: 4px;
        box-shadow: 0 8px 40px #0006;
    }
    #screenshot-overlay .screenshot-close {
        position: absolute;
        top: 8px;
        right: 12px;
        display: grid;
        place-items: center;
        width: 44px;
        height: 44px;
        padding: 0;
        border: 1px solid #ffffff60;
        border-radius: 50%;
        background: #171717;
        color: #fff;
        cursor: pointer;
        scale: 1 !important;
    }
    #screenshot-overlay .screenshot-close:focus-visible { outline: 2px solid #fff; outline-offset: 2px; }
    @keyframes screenshot-appear { from { opacity: 0; } to { opacity: 1; } }
    @media (prefers-reduced-motion: reduce) { #screenshot-overlay[open] { animation: none; } }
</style>
<dialog id="screenshot-overlay" aria-label="Full-size screenshot">
    <button type="button" class="screenshot-close" aria-label="Close screenshot" autofocus>
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><path d="M6 6l12 12M18 6L6 18"/></svg>
    </button>
    <img alt="">
</dialog>
<script>
(() => {
    const overlay = document.getElementById('screenshot-overlay');
    if (!overlay || typeof overlay.showModal !== 'function') return;
    const full = overlay.querySelector('img');
    const close = overlay.querySelector('.screenshot-close');
    let opener = null;
    document.body.append(overlay);

    for (const image of document.querySelectorAll('[data-ne6-slide] img, #project-spotlight [data-preview-view] img')) {
        if (image.closest('a, button') || !image.getAttribute('src')) continue;
        const button = document.createElement('button');
        button.type = 'button';
        button.className = 'screenshot-open';
        button.setAttribute('aria-label', `View full-size ${image.alt || 'screenshot'}`);
        button.setAttribute('aria-haspopup', 'dialog');
        image.before(button);
        button.append(image);
    }

    document.addEventListener('click', event => {
        const button = event.target.closest?.('.screenshot-open');
        if (!button || button.closest('[inert], [aria-hidden="true"]') || overlay.open) return;
        const image = button.querySelector('img');
        const url = image?.getAttribute('src');
        if (!url) return;
        opener = button;
        full.alt = image.alt || 'Full-size screenshot';
        full.src = url;
        overlay.showModal();
    });
    close.addEventListener('click', () => overlay.close());
    overlay.addEventListener('click', event => {
        if (event.target === overlay) overlay.close();
    });
    overlay.addEventListener('close', () => {
        full.removeAttribute('src');
        if (opener?.isConnected) opener.focus({ preventScroll: true });
        opener = null;
    });
})();
</script>

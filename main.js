// ============================================
//     SISTEMA DE BIBLIOTECA — JavaScript
// ============================================

document.querySelectorAll('.alert').forEach(el => {
    setTimeout(() => {
        el.style.transition = 'opacity .4s';
        el.style.opacity = '0';
        setTimeout(() => el.remove(), 400);
    }, 4000);
});

document.querySelectorAll('[data-confirm]').forEach(btn => {
    btn.addEventListener('click', e => {
        if (!confirm(btn.dataset.confirm)) e.preventDefault();
    });
});


const current = window.location.pathname.split('/').pop();
document.querySelectorAll('.sidebar-nav a').forEach(a => {
    const href = a.getAttribute('href').split('/').pop().split('?')[0];
    if (href && current.startsWith(href)) a.classList.add('active');
});


const capaInput = document.getElementById('capa_url');
const capaPreview = document.getElementById('capa-preview');
if (capaInput && capaPreview) {
    function updatePreview() {
        const url = capaInput.value.trim();
        if (url) {
            capaPreview.src = url;
            capaPreview.style.display = 'block';
        } else {
            capaPreview.style.display = 'none';
        }
    }
    capaInput.addEventListener('input', updatePreview);
    updatePreview();
}

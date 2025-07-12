document.addEventListener("DOMContentLoaded", function () {
    // Toggle class active untuk hamburger menu
    const navbarNav = document.querySelector(".custom-navbar-nav");
    const hm = document.querySelector("#hamburger-menu");

    if (hm && navbarNav) {
        hm.onclick = () => {
            navbarNav.classList.toggle("active");
        };
    }

    // Toggle class active untuk search form
    const searchForm = document.querySelector(".search-form");
    const searchBox = document.querySelector("#search-box");
    const sb = document.querySelector("#search-button");

    if (sb && searchForm && searchBox) {
        sb.onclick = (e) => {
            searchForm.classList.toggle("active");
            searchBox.focus();
            e.preventDefault();
        };
    }

    // Klik di luar elemen hamburger atau search
    document.addEventListener("click", function (e) {
        if (hm && navbarNav && !hm.contains(e.target) && !navbarNav.contains(e.target)) {
            navbarNav.classList.remove("active");
        }

        if (sb && searchForm && !sb.contains(e.target) && !searchForm.contains(e.target)) {
            searchForm.classList.remove("active");
        }
    });

    // MODAL
    const itemDetailModal = document.querySelector("#item-detail-modal");
    const itemDetailButtons = document.querySelectorAll(".item-detail-button");

    if (itemDetailModal && itemDetailButtons.length > 0) {
        itemDetailButtons.forEach((btn) => {
            btn.onclick = (e) => {
                e.preventDefault();

                // Ambil data dari data-* attribute
                const name = btn.dataset.name || '';
                const desc = btn.dataset.desc || '';
                const price = btn.dataset.price || '';
                const image = btn.dataset.image || '';

                // Set isi modal
                document.querySelector("#modal-title").textContent = name;
                document.querySelector("#modal-desc").textContent = desc;
                document.querySelector("#modal-price").textContent = price;
                document.querySelector("#modal-image").src = image;

                // Tampilkan modal
                itemDetailModal.style.display = "flex";
            };
        });

        // Klik tombol close modal
        const closeIcon = document.querySelector(".modal .close-icon");
        if (closeIcon) {
            closeIcon.onclick = (e) => {
                e.preventDefault();
                itemDetailModal.style.display = "none";
            };
        }

        // Klik di luar modal
        window.addEventListener("click", (e) => {
            if (e.target === itemDetailModal) {
                itemDetailModal.style.display = "none";
            }
        });
    }
});

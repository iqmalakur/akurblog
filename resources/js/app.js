import "./bootstrap";

document
    .getElementById("logout-button")
    .addEventListener("click", function (e) {
        e.preventDefault();

        Swal.fire({
            title: "Yakin ingin logout?",
            text: "Kamu akan keluar dari sesi ini.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, logout",
            cancelButtonText: "Batal",
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById("logout-form").submit();
            }
        });
    });

document
    .getElementById("delete-post-button")
    .addEventListener("click", function (e) {
        e.preventDefault();

        Swal.fire({
            title: "Yakin ingin menghapus postingan ini?",
            text: "Tindakan ini tidak dapat dibatalkan.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Ya, hapus",
            cancelButtonText: "Batal",
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById("delete-post-form").submit();
            }
        });
    });

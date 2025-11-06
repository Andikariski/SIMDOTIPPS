import * as bootstrap from "bootstrap";
import Swal from "sweetalert2";
import ApexCharts from "apexcharts";
window.bootstrap = bootstrap;

// Setup Toast sekali saja
const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
});

// sweetalert modal
const Swal2 = Swal.mixin({
    customClass: {
        confirmButton: "btn btn-danger me-2",
        cancelButton: "btn btn-light",
    },
    buttonsStyling: false,
});

// Jalankan ulang setiap kali Livewire selesai morph/render halaman baru

document.addEventListener("livewire:init", () => {
    // Memanggil fungsi pertama kali page di load
    // initAllSelect2();

    Livewire.hook("morph.updated", () => {
        // Memanggil fungsi ketika setelah pilih select
        initAllSelect2();
    });

    document.addEventListener("livewire:navigated", () => {
        // Memanggil fungsi ketika setelah pindah halaman
        initAllSelect2();
    });

    Livewire.on("success-login", (data) => {
        Toast.fire({
            icon: "success",
            title: `${data.message} ${data.name}`,
        });
        setTimeout(() => {
            window.location.href = "/dashboard";
        }, 2000);
    });

    // Notifikasi Berhasil Tambah Data All Global
    Livewire.on("success-add-data", (data) => {
        Toast.fire({
            icon: "success",
            title: data.message,
        });
    });

    // Notifikasi Berhasil Hapus Data All Global
    Livewire.on("success-delete-data", (data) => {
        Toast.fire({
            icon: "success",
            title: data.message,
        });
    });

    // Notifikasi Gagal Hapus Data All Global
    Livewire.on("failed-delete-data", (data) => {
        Toast.fire({
            icon: "error",
            title: data.message,
        });
    });

    // Notifikasi Buka Kunci
    Livewire.on("succes-change", (data) => {
        Toast.fire({
            icon: "success",
            title: data.message,
        });
    });

    // Notifikasi Validasi rap
    Livewire.on("failed-add-rap", (data) => {
        Toast.fire({
            icon: "error",
            title: data.message,
        });
    });

    //sweetalert data hapus OPD
    Livewire.on("confirm-delete-data-opd", (data) => {
        Swal2.fire({
            icon: "question",
            title:
                "Yakin ingin hapus permanen Data OPD <strong class='text-primary'>" +
                data["nama_opd"] +
                "</strong> ?",
            showCancelButton: true,
            cancelButtonText: "Batal",
            confirmButtonText: "Ya, Hapus Permanen",
            footer: '<strong class="text-danger">Data OPD yang di hapus tidak akan bisa dikembalikan!</strong>',
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch("delete-data-opd", {
                    id: data["id"],
                });
            }
        });
    });

    //sweetalert data hapus Operator
    Livewire.on("confirm-delete-data-operator", (data) => {
        Swal2.fire({
            icon: "question",
            title:
                "Yakin ingin menghapus <strong class='text-primary'>" +
                data["name"] +
                "</strong> ?" +
                "Dari Operator",
            showCancelButton: true,
            cancelButtonText: "Batal",
            confirmButtonText: "Ya, Hapus Permanen",
            footer: '<strong class="text-danger">Data Operator yang di hapus tidak akan bisa dikembalikan!</strong>',
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch("delete-data-operator", {
                    id: data["id"],
                });
            }
        });
    });

    //sweetalert data hapus Pagu OPD
    Livewire.on("confirm-delete-data-paguOPD", (data) => {
        Swal2.fire({
            icon: "question",
            title:
                "Yakin ingin menghapus pagu <strong class='text-primary'>" +
                data["opd"]["kode_opd"] +
                "</strong> ?",
            showCancelButton: true,
            cancelButtonText: "Batal",
            confirmButtonText: "Ya, Hapus Permanen",
            footer: '<strong class="text-danger">Data Pagu yang di hapus tidak akan bisa dikembalikan!</strong>',
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch("delete-data-paguOPD", {
                    id: data["id"],
                });
            }
        });
    });

    //sweetalert data hapus Pagu Induk
    Livewire.on("confirm-delete-data-paguInduk", (data) => {
        Swal2.fire({
            icon: "question",
            title:
                "Yakin ingin menghapus pagu <strong class='text-primary'>" +
                data["tahun_pagu"] +
                "</strong> ?",
            showCancelButton: true,
            cancelButtonText: "Batal",
            confirmButtonText: "Ya, Hapus Permanen",
            footer: '<strong class="text-danger">Data Pagu yang di hapus tidak akan bisa dikembalikan!</strong>',
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch("delete-data-paguInduk", {
                    id: data["id"],
                });
            }
        });
    });

    //sweetalert data hapus subKegiatan
    Livewire.on("confirm-delete-data-subKegiatan", (data) => {
        Swal2.fire({
            icon: "question",
            title:
                "Yakin ingin menghapus sub kegiatan <strong class='text-primary'>" +
                data["kode_klasifikasi"] +
                "</strong> ?",
            showCancelButton: true,
            cancelButtonText: "Batal",
            confirmButtonText: "Ya, Hapus Permanen",
            footer: '<strong class="text-danger">Data sub kegiatan yang di hapus tidak akan bisa dikembalikan!</strong>',
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch("delete-data-subKegiatan", {
                    id: data["id"],
                });
            }
        });
    });

    function initAllSelect2() {
        // Inisialisasi semua select dengan AJAX

        const $selectSK = $("#selectSubKegiatan");
        const subKegiatanUrl = $selectSK.data("url"); // otomatis ambil dari atribut data-url

        const $selectAK = $("#selectActivitasUtama");
        const aktivitasUtamaUrl = $selectAK.data("url"); // otomatis ambil dari atribut data-url

        initSelect2(
            "#selectSubKegiatan",
            "subKegiatanChanged",
            subKegiatanUrl,
            "sub_kegiatan"
        );
        initSelect2(
            "#selectActivitasUtama",
            "activitasUtamaChanged",
            aktivitasUtamaUrl,
            "aktivitas_utama"
        );
    }

    /**
     * Fungsi generik untuk inisialisasi Select2 (mendukung AJAX)
     * @param {string} selector - ID elemen select
     * @param {string} eventName - Nama event Livewire
     * @param {string|null} ajaxUrl - URL endpoint untuk pencarian AJAX
     * @param {string|null} textField - Nama field teks yang ditampilkan dari hasil JSON
     */

    function initSelect2(
        selector,
        eventName,
        ajaxUrl = null,
        textField = null
    ) {
        const $select = $(selector);
        if ($select.length === 0) return;

        // Hancurkan Select2 lama jika sudah terpasang
        if ($select.hasClass("select2-hidden-accessible")) {
            $select.off("change.select2");
            $select.select2("destroy");
        }

        // Delay sedikit supaya DOM sudah siap sepenuhnya
        setTimeout(() => {
            const config = {
                // theme: "bootstrap-5",
                width: "100%",
                // placeholder: "-- Pilih Opsi --",
                allowClear: true,
            };

            // Jika pakai AJAX
            if (ajaxUrl) {
                config.ajax = {
                    url: ajaxUrl,
                    dataType: "json",
                    delay: 300,
                    data: (params) => ({
                        q: params.term, // parameter pencarian
                    }),
                    processResults: (data) => ({
                        results: data.map((item) => ({
                            id: item.id,
                            text: textField ? item[textField] : item.text,
                        })),
                    }),
                };
                config.minimumInputLength = 2; // baru cari setelah ketik 2 huruf
            }

            // Inisialisasi Select2
            $select.select2(config);

            // Event perubahan
            $select.on("change.select2", function () {
                const value = $(this).val();
                console.log(`${selector} changed:`, value);
                Livewire.dispatch(eventName, { id: value });
            });
        }, 300);
    }
});

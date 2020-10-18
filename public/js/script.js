$(function () {
    $(".tombolTambahData").on("click", function () {
        $("#exampleModalLabel").html("Tambah Data Siswa");
        $(".modal-footer button[type=submit]").html("Tambah Data");
    });

    $(".tampilUbahData").on("click", function () {
        $("#exampleModalLabel").html("Ubah Data Siswa");
        $(".modal-footer button[type=submit]").html("Ubah Data");
        $(".modal-body form").attr(
            "action",
            "http://127.0.0.1:8000/siswa/edit"
        );

        const id = $(this).data("id");

        // $.ajax({
        //     url: "",
        //     data: {
        //         id: id,
        //     },
        //     method: "POST",
        //     dataType: "JSON",
        //     success: function (data) {
        //         console.log(data);
        //         // $('#nama_depan').val(data.nama_depan);
        //         // $('#nama_belakang').val(data.nama_belakang);
        //     },
        // });
    });
});

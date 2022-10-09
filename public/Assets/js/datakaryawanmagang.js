// Auto reload data karyawan magang
function reloadTable(id) {
    var table = $(id).DataTable();
    table.cleanData;
    table.ajax.reload();
}

//Menampilkan data karyawan magang
$("#table").DataTable({
    ordering: true,
    serverSide: true,
    processing: true,
    autoWidth: false,
    responsive: true,
    ajax: {
        'url': $("#url-get").val(),
    },

    columns: [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex',
            width: '10px',
            orderable: false,
            searchable: false
        },
        {
            data: 'name',
            name: 'name'
        },
        {
            data: 'email',
            name: 'email'
        },
        {
            data: 'opsi',
            name: 'opsi',
            orderable: false,
            searchable: false
        },
    ],
});

// Fungsi submit form 
$("#formTambah").submit(function(e) {
    e.preventDefault();

    let formData = new FormData(this);
    let id = $("#id_user").val();

    if(id == "") {
        var url = "/data-karyawan-magang";
        var status = "create";
    } else {
        var url = "/data-karyawan-magang/"+id;
        var status = "update";
    }

    var button    = "#btn-form";
    var valButton = $(button).html();
    var loading   = "<div class='spinner-border text-light' role='status' id='spinner'></div>";

    $.ajax({
        url: url,
        type: "POST",
        data: formData,
        dataType: 'json',
        contentType: false,
        processData: false,
        beforeSend: function () {
            if (button !== null) {
                $(button).empty().append(loading).prop('disabled', true).css('cursor', 'wait');
            }
        },
        complete: function () {
            if (button !== null) {
            $(button).empty().append(valButton).prop('disabled', false).css('cursor', 'auto');
            }
        }
    }).done(function() {
        reloadTable("#table");
        $('#KaryawanMagangModal').modal('hide')
        if(status == "update"){
            alert = "Satu Data Berhasil Dirubah"
        } else{
            alert = "Satu Data Berhasil Ditambahkan"
        }
        Swal.fire({
            position: 'top',
            title: 'Sukses!',
            text: alert,
            icon: 'success',
            confirmButtonColor: '#4cb8c4',
        })
    }).fail(function (data) {
        $("#name_error").html("")
        $("#email_error").html("")
        $("#password_error").html("")
        $("#name_error").html(data.responseJSON.errors.name)
        $("#email_error").html(data.responseJSON.errors.email)
        $("#password_error").html(data.responseJSON.errors.password)
    })
});

// Menampilkan modal form tambah data
$('#create-btn').click(function (e) { 
    e.preventDefault();
    
    $("label.error").remove()
    $(".form-outline input").removeClass("error")

    $("#KaryawanMagangModalLabel").html("Tambah Karyawan Magang")
    $("#btn-form").html("Tambah Data")
    $("#KaryawanMagangModal").modal("show")

    // form 
    $("#id_user").val("")
    $("#name").val("")
    $("#email").val("")
    $("#password").val("")

    // span error 
    $("#name_error").html("")
    $("#email_error").html("")
    $("#password_error").html("")
    $(".form-outline input").removeClass("error")
});

// Menampilkan modal form info
function info(data_id) {
    $("#infoModal").modal("show") 
    $.get("/data-karyawan-magang/"+data_id+"/edit", function(data){
        $("#colNama").html(data.datauser.name)
        $("#colEmail").html(data.datauser.email)
        $("#colPosisi").html('Karyawan Magang')
        $("#colKehadiran").html(data.dataabsensi + " Kali")
    });
}

// Menampilkan modal form edit data
function edit(data_id) {
    $("label.error").remove()
    $(".form-outline input").removeClass("error")
    
    $("#KaryawanMagangModalLabel").html("Edit Karyawan Magang")
    $("#btn-form").html("Edit Data")
    $("#KaryawanMagangModal").modal("show")

    // form
    $("#password").val("")

    $.getJSON("data-karyawan-magang/"+data_id+"/edit", function(data){
        $("#id_user").val(data.datauser.id)
        $("#name").val(data.datauser.name)
        $("#email").val(data.datauser.email)
    });

    // span error 
    $("#name_error").html("")
    $("#email_error").html("")
    $("#password_error").html("")
    $(".form-outline input").removeClass("error")
}

// menghapus data
function destroy(data_id) {
    Swal.fire({
        position: 'top',
        title: 'Apakah anda yakin ingin menghapus data ini?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#4cb8c4',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/data-karyawan-magang/"+data_id,
                type: "DELETE",
                dataType: 'json',
                contentType: false,
                processData: false,
            }).done(function() {
                reloadTable("#table");
                Swal.fire({
                    position: 'top',
                    title: 'Deleted!',
                    text: 'Satu Data Berhasil Dihapus.',
                    icon :'success',
                    confirmButtonColor: '#4cb8c4',
                })
            }).fail(function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops Gagal Menghapus Data!',
                    text: 'Silahkan coba lagi atau hubungi bagian admin untuk keterangan lebih lanjut.',
                    confirmButtonColor: '#4cb8c4',
                })
            })
        }
    })
}
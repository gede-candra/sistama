// Menampilkan data karyawan
function reloadTable(id) {
    var table = $(id).DataTable();
    table.cleanData;
    table.ajax.reload();
}

//Menampilkan data karyawan
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
        var url = "/hrd/karyawan";
    } else {
        var url = "/hrd/updatekaryawan";
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
        $('#KaryawanModal').modal('hide')
        if(url == "/hrd/updatekaryawan"){
            alert = "Satu Data Berhasil Dirubah"
        } else{
            alert = "Satu Data Berhasil Ditambahkan"
        }
        Swal.fire({
            position: 'top',
            title: 'Sukses!',
            text: alert,
            icon: 'success',
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

// Menampilkan modal form info
function info(data_id) {
    $("#infoModal").modal("show")
    $.getJSON("karyawan/"+data_id+"/edit", function(data){
        $("#colNama").html(data.datauser.name)
        $("#colEmail").html(data.datauser.email)
        $("#colPosisi").html(data.datauser.posisi)
        $("#colKehadiran").html(data.dataabsensi + " Kali")
    });
}

// Menampilkan modal form tambah data
function create() {
    $("label.error").remove()
    $(".form-outline input").removeClass("error")

    $("#KaryawanModalLabel").html("Tambah Karyawan")
    $("#btn-form").html("Tambah Data")
    $("#KaryawanModal").modal("show")

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
}

// Menampilkan modal form tambah data
function edit(data_id) {
    $("label.error").remove()
    $(".form-outline input").removeClass("error")
    
    $("#KaryawanModalLabel").html("Edit Karyawan")
    $("#btn-form").html("Edit Data")
    $("#KaryawanModal").modal("show")

    // form
    $("#password").val("")

    $.getJSON("karyawan/"+data_id+"/edit", function(data){
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

function destroy(data_id) {
        Swal.fire({
            position: 'top',
            title: 'Apakah anda yakin ingin menghapus data ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "/hrd/karyawan/"+data_id,
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
                        icon :'success'
                    })
                }).fail(function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops Gagal Menghapus Data!',
                        text: 'Silahkan coba lagi atau hubungi bagian admin untuk keterangan lebih lanjut.',
                    })
                })
            }
        })
}
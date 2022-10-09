$(document).ready(function () {

    $('.select2-on').select2({
        placeholder: 'Masukkan user...',
        dropdownParent: $('#PicketSchedule'),
        width: '100%',
        theme: 'classic',
        ajax: {
            url: $('#search-url').val(),
            datatype: 'json',
            type: 'GET',
            data: function(params) {
                return {
                    search: params.term
                }
            },
            processResults: function (data) {
                return {
                    results: $.map(data.users, function (item) {
                        return {
                            text: item.name,
                            id: item.name
                        }
                    })
                };
            }
        }
    });
    
    // Auto reload data jadwal piket
    function reloadTable(id) {
       var table = $(id).DataTable();
       table.cleanData;
       table.ajax.reload();
    }
    
    //Menampilkan data jadwal piket
    $("#picket-table").DataTable({
        info: false,
        paging: false,
        lengthChange: false,
        searching: false,
        ordering: false,
        serverSide: true,
        processing: true,
        autoWidth: false,
        responsive: true,
        ajax: {
            'url': $("#table-url").val(),
        },
        
        columns: [
            {
                data: 'senin',
                name: 'senin'
            },
            {
                data: 'selasa',
                name: 'selasa'
            },
            {
                data: 'rabu',
                name: 'rabu'
            },
            {
                data: 'kamis',
                name: 'kamis'
            },
            {
                data: 'jumat',
                name: 'jumat'
            },
        ],
    });
    
    $('#edit-jadwal').click(function (e) { 
       e.preventDefault();
       
       $('#PicketSchedule').modal('show');
       $('.select2-on').val('').change();
       $('.error').hide();

        $.get($('#search-url').val(), function(data){
            if (data.picket_schedule != null) {
                $('#id-picket').val(1);
            } else{
                $('#id-picket').val('');
            }
        });
    });
    
    $('#form-submit').submit(function (e) { 
        e.preventDefault();
        
        const formData = new FormData(this)
        var id = $("#id-picket").val();
        var url = $('#update-url').val();

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
                   $(button).empty().append(valButton).prop('disabled', false).css('cursor', 'pointer');
                }
             }
        }).done(function() {
            reloadTable("#picket-table");
            $('#PicketSchedule').modal('hide')
            alert = "Jadwal berhasil diubah"
            Swal.fire({
                position: 'top',
                title: 'Sukses!',
                text: alert,
                icon: 'success',
                confirmButtonColor: '#4cb8c4',
            })
        }).fail(function (data) {
            $("#senin_error").html("")
            $("#selasa_error").html("")
            $("#rabu_error").html("")
            $("#kamis_error").html("")
            $("#jumat_error").html("")
            $("#senin_error").html(data.responseJSON.errors.senin)
            $("#selasa_error").html(data.responseJSON.errors.selasa)
            $("#rabu_error").html(data.responseJSON.errors.rabu)
            $("#kamis_error").html(data.responseJSON.errors.kamis)
            $("#jumat_error").html(data.responseJSON.errors.jumat)
        })
    });
});
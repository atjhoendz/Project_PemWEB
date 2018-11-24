$(document).ready(function () {
    var baseUrl = $('#baseUrl').val();
    var tinggifooter = $('#footer').height();
    var setTinggi = tinggifooter+'px';
    $('#main .container').css({"margin-bottom":setTinggi});
    
    var dateInterval = setInterval(function(){
        var momentNow = moment();
        $('#txt-tanggal').html(momentNow.format('dddd, DD ') + momentNow.format('MMMM').substring(0, 3) + momentNow.format(' YYYY'));
        $('#txt-jam').html(momentNow.format('HH:mm:ss'));
    }, 1000);   

    //on window resize will set margin-bottom of mainContainer
    $(window).on('resize', function(){
        var win = $(this);
        if(win.width() <= 768){
            var tinggifooter = $('#footer').height();
            var setTinggi = tinggifooter+'px';
            $('#main .container').css({"margin-bottom":setTinggi});
        }
    });

    // collapse sidebar
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar, #content').toggleClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        if($(window).width() <= 768){
            $('#main').toggleClass('hide');
            $('#nameHome').toggleClass('hide');
        }
    });

    // Home button
    $('#btnHome').on('click', function () {
        window.location.replace(baseUrl);
    });

    // Sidebar Home Button
    $('#homeBtn').on('click', function () {
        $('#mainContainer').removeClass('hide');
        $('#taskContainer').addClass('hide');
        $('#housemateContainer').addClass('hide');
        $('#financeContainer').addClass('hide');
        if($(window).width() <= 768){
            $('#sidebarCollapse').click();    
        }
    });

    // Sidebar Housemate Button
    $('#housemateBtn').on('click', function () {
        $('#mainContainer').addClass('hide');
        $('#taskContainer').addClass('hide');
        $('#housemateContainer').removeClass('hide');
        $('#financeContainer').addClass('hide');

        if($(window).width() <= 768){
            $('#sidebarCollapse').click();    
        }

    });

    // Add housemate
    $('#addHousemate').on('click', function(){
        $('#modalPopUp').removeClass('hide');
        $('#modalPopUp').addClass('modalAdd-container');
        $('#modal-title').text('Add Housemate');
        $('#modalContent').html(
            '<form method="POST" class="formAdd">' +
                '<div class="form-group">'+
                    '<input class="form-control" type="text" name="nama_anggota" id="nama-anggota" placeholder="Nama Anggota">' +
                    '<input class="form-control" type="text" name="url_foto" id="url-foto" placeholder="URL Foto">' +
                '</div>' +
                '<div class="form-group">'+
                    '<img id="previewImg" class="img_anggota" src="" alt="Image Url Invalid"></img>' +
                '</div>' +
                '<input id="btnAddHousemate" type="submit" class="btn" value="Add">'+
            '</form>'
        );
        if($('#btnAddHousemate').length){
            btnReady();
        }else{
            alert('not ready');
        }
    });

    function btnReady(){

        $('#url-foto').on('change paste keyup', function(){
            $('#previewImg').attr('src', $(this).val());
        });

        $('#btnAddHousemate').on('click', function(e){
            var name = $('#nama-anggota').val();
            var url_foto = $('#url-foto').val();

            if(name == '' || url_foto == ''){
                alert('Empty Data');
            }else{
                var url = baseUrl + '/addHousemate';
                $.post(url, {'nama_anggota':name, 'url_foto':url_foto},
                    function (data){
                        if(data == 'Success'){
                            alert('Data Tersimpan');
                            $('#closePopUp').click();
                            location.reload();
                            $('#housemateBtn').click();
                        }else{
                            alert(data);
                        }
                    }
                );
            }
            e.preventDefault();
        });

        var listAnggota = $('#list_housemate');
        listAnggota.empty();
        listAnggota.append('<option>Pilih Anggota</option>');
        listAnggota.prop('selectedIndex', 0);

        var url = baseUrl + '/getHousemate';
        var dataAnggota = new Array();
        $.getJSON(url, function (data) {
                if(data == ''){
                    listAnggota.html('<option disabled>No Anggota</option>');
                }else{
                    $.each(data, function (index, value) { 
                        listAnggota.append($('<option></option>').attr('value', value.url_fotoanggota).text(value.nama_anggota));
                        dataAnggota.push(value);
                   });
                }
            }
        );
        
        var idAnggota;
        $('#list_housemate').change(function(){
            var selectedAnggota = $('#list_housemate').find(':selected');
            var namaAnggota = selectedAnggota.text();
            var urlFoto = selectedAnggota.val();

            for(var i=0;i<dataAnggota.length;i++){
                if(dataAnggota[i].nama_anggota == namaAnggota){
                    idAnggota = dataAnggota[i].id_anggota;
                    break;
                }
            }

            if(namaAnggota != 'Pilih Anggota'){
                $('#nama_anggota').val(namaAnggota);
                $('#url_foto').val(urlFoto);
            }else{
                $('#nama_anggota').val('');
                $('#url_foto').val('');
            }
        });

        $('#btnEditHousemate').on('click', function(e){
            var nama = $('#nama_anggota').val();
            var urlFoto = $('#url_foto').val();

            var url = baseUrl + '/updateHousemate';
            $.post(url, {'nama_anggota':nama,'url_foto':urlFoto,'id_anggota':idAnggota},
                function (data) {
                    if(data == 'Success'){
                        alert('Data Berhasil di Update');
                        $('#closePopUp').click();
                        location.reload();
                        $('#housemateBtn').click();
                    }else{
                        alert(data);
                    }
                },
            );  
            e.preventDefault();
        });
    }

    // Edit Housemate
    $('#editHousemate').on('click', function(){
        $('#modalPopUp').removeClass('hide');
        $('#modalPopUp').addClass('modalAdd-container');
        $('#modal-title').text('Edit Housemate');
        $('#modalContent').html(
            '<form method="POST" class="formAdd">' +
                '<div class="form-group">' +
                    '<select id="list_housemate" class="form-control select">' +
                    '</select>' +
                '</div>' +
                '<div class="form-group">' +
                    '<input class="form-control" type="text" id="nama_anggota" placeholder="Nama Anggota">' +
                    '<input class="form-control" type="text" id="url_foto" placeholder="URL Foto">' +
                '</div>' +
                '<input id="btnEditHousemate" type="submit" class="btn" value="Update">' +
            '</form>'
        );
        if($('#btnEditHousemate').length){
            btnReady();
        }else{
            alert('not ready');
        }
    });

    // Close Modal
    $('#closePopUp').on('click', function(){
        $('#modalPopUp').addClass('hide');
        $('#modalPopUp').removeClass('modalAdd-container');
    });

    // Sidebar Finance Button
    $('#financeBtn').on('click', function () {
        $('#mainContainer').addClass('hide');
        $('#taskContainer').addClass('hide');
        $('#housemateContainer').addClass('hide');
        $('#financeContainer').removeClass('hide');
        if($(window).width() <= 768){
            $('#sidebarCollapse').click();    
        }
    });

    // Sidebar Task Button
    $('#btnTask').on('click', function () {
        $('#taskContainer').removeClass('hide');
        $('#mainContainer').addClass('hide');
        $('#housemateContainer').addClass('hide');
        $('#financeContainer').addClass('hide');
        if($(window).width() <= 768){
            $('#sidebarCollapse').click();    
        }
    });   
});
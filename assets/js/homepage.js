$(document).ready(function () {
    var baseUrl = $('#baseUrl').val();
    var tinggifooter = $('#footer').height();
    var setTinggi = tinggifooter+'px';
    $('#main .container').css({"margin-bottom":setTinggi});
    var win = $(window);
    if(win.width() <= 768){
        var tinggifooter = $('#footer').height();
        var setTinggi = tinggifooter+'px';
        $('#main .container').css({"margin-bottom":setTinggi});
        $('#date-circle').hide();
    }
    
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
            $('#date-circle').hide();
        }else{
            $('#date-circle').show();
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
        $('#IncomeContainer').addClass('hide');         
        $('#ExpensesContainer').addClass('hide');
        $('#sideHome').addClass('active');
        $('#sideHousemate').removeClass('active');
        $('#sideFinance').removeClass('active');
        $('#sideTask').removeClass('active');
        $('#gotoHome').addClass('imgMenuFocus');
        $('#gotoHousemate').removeClass('imgMenuFocus');
        $('#gotoFinance').removeClass('imgMenuFocus');
        $('#gotoTask').removeClass('imgMenuFocus');
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
        $('#IncomeContainer').addClass('hide');         
        $('#ExpensesContainer').addClass('hide');
        $('#sideHome').removeClass('active');
        $('#sideHousemate').addClass('active');
        $('#sideFinance').removeClass('active');
        $('#sideTask').removeClass('active');
        $('#gotoHome').removeClass('imgMenuFocus');
        $('#gotoHousemate').addClass('imgMenuFocus');
        $('#gotoFinance').removeClass('imgMenuFocus');
        $('#gotoTask').removeClass('imgMenuFocus');
        if($(window).width() <= 768){
            $('#sidebarCollapse').click();    
        }

    });

    // Add housemate
    $('#addHousemate').on('click', function(){
        $('#modalPopUp').removeClass('hide');
        $('#modalPopUp').addClass('modalAdd-container');
        $('#modalHeader').removeClass('modalAbout-header');
        $('#modalHeader').addClass('modalAdd-header');
        $('#modalContent').removeClass('modalAbout-content');
        $('#modalContent').addClass('modalAdd-content');
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
        $('#modalFooter').addClass('hide');
        if($('#btnAddHousemate').length){
            btnReady();
        }else{
            alert('not ready');
        }
    });
    
    var selectedAnggotaTask;

    function btnReady(){

        $('#url-foto').on('change paste keyup', function(){
            $('#previewImg').attr('src', $(this).val());
        });

        $('#btnAddHousemate').on('click', function(e){
            var name = $('#nama-anggota').val();
            var url_foto = $('#url-foto').val();

            if(name == '' || url_foto == ''){
                alert('Masukan Data!');
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
        var listTaskAnggota = $('#listTaskAnggota');
        var listTaskAddAnggota = $('#listTaskAddAnggota');
        listAnggota.empty();
        listTaskAnggota.empty();
        listTaskAddAnggota.empty();
        listAnggota.append('<option>Pilih Anggota</option>');
        listTaskAnggota.append('<option>Pilih Anggota</option>');
        listTaskAddAnggota.append('<option>Pilih Anggota</option>');
        listAnggota.prop('selectedIndex', 0);
        listTaskAnggota.prop('selectedIndex', 0);
        listTaskAddAnggota.prop('selectedIndex', 0);

        var url = baseUrl + '/getHousemate';
        var dataAnggota = new Array();
        $.getJSON(url, function (data) {
                if(data == ''){
                    listAnggota.html('<option disabled>No Anggota</option>');
                    listTaskAnggota.html('<option disabled>No Anggota</option>');
                    listTaskAddAnggota.html('<option disabled>No Anggota</option>');
                }else{
                    $.each(data, function (index, value) { 
                        listAnggota.append($('<option></option>').attr('value', value.url_fotoanggota).text(value.nama_anggota));
                        listTaskAnggota.append($('<option></option>').attr('value', value.id_anggota).text(value.nama_anggota));
                        listTaskAddAnggota.append($('<option></option>').attr('value', value.id_anggota).text(value.nama_anggota));
                        dataAnggota.push(value);
                   });
                }
                listTaskAnggota.val(selectedAnggotaTask);
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

        $('#btnUpdateHousemate').on('click', function(e){
            var nama = $('#nama_anggota').val();
            var urlFoto = $('#url_foto').val();

            if(nama == '' || urlFoto == ''){
                alert('Tidak Ada data yang diupdate');
            }else{
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
            }
            e.preventDefault();
        });

        $('#btnDeleteHousemate').on('click', function(e){
            var nama = $('#nama_anggota').val();
            var urlFoto = $('#url_foto').val();

            if(nama == '' || urlFoto == ''){
                alert('Pilih Anggota yang akan dihapus.');
            }else{
                var url = baseUrl + '/deleteHousemate';
                $.post(url, {'id_anggota' : idAnggota},
                    function (data) {
                        if(data == 'Success'){
                            alert('Housemate ' + nama + ' berhasil dihapus.');
                            $('#closePopUp').click();
                            location.reload();
                            $('#housemateBtn').click();
                        }else{
                            alert('Gagal Menghapus Housemate');
                        }
                    }
                );
            }            
            e.preventDefault();
        });

        $('#btnAddFinance').on('click', function(e){
            var status = '1';
            if($('#statusFinance input:checked').length){
                status = '0';
            }else{
                status = '1';
            }
            var detail = $('#detailTransaksi').val();
            var jml = $('#jmlTransaksi').val();
            var tgl = $('#tglTransaksi').val();
            
            if(detail == '' || jml == '' || tgl == ''){
                alert("Semua Form Finance Wajib DIISI!");
            }else{
                var url = baseUrl + '/addFinance';
                $.post(url, {'detailTrans':detail, 'jmlTrans':jml, 'tglTrans':tgl, 'statusTrans':status},
                    function (data) {
                        if(data == 'Success'){
                            alert('Finance berhasil ditambahkan');
                            $('#closePopUp').click();
                            location.reload();
                        }else{
                            alert(data);
                        } 
                    }
                );
            }

            e.preventDefault();
        });

        $('#btnAddTask').on('click', function(e){
            var taskDetail = $('#txtTaskAddDetail').val();
            var tglDeadline = $('#deadlineAddTask').val();
            var id_anggota = $('#listTaskAddAnggota').val();
            var nama_anggota = $('#listTaskAddAnggota').find(':selected').text();
            var url = baseUrl + '/addTask';
            $.post(url, {'idAnggota':id_anggota, 'taskDetail':taskDetail, 'namaAnggota':nama_anggota, 'deadlineTask':tglDeadline},
                function (data) {
                    if(data == 'Success'){
                        alert('Task Berhasil Ditambahkan');
                        location.reload();
                        $window.onload = $('#homeTask').click();
                    }else{
                        alert(data);
                    }
                }
            );
            e.preventDefault();
        });

        

    }

    // Get & Set Finance Balance

    function GetSetBalance(){
        var url = baseUrl + '/getBalanceJSON';
        var bal;
        $.getJSON(url, function (data) {
                if(data != ''){
                    $.each(data, function (index, value) { 
                         bal = value.balance; 
                    });
                    if(bal != null){
                        if(bal < 0){
                            $('#txtBalance').css({'color':'red'});
                            $('#txtBalance').text('Rp' + bal);
                        }else{
                            $('#txtBalance').css({'color':'lightgreen'});
                            $('#txtBalance').text('Rp' + bal);
                        }
                    } else {
                        $('#txtBalance').text('Rp0');
                    }
                    
                }
            }
        );
    }

    // Edit Housemate
    $('#editHousemate').on('click', function(){
        $('#modalPopUp').removeClass('hide');
        $('#modalPopUp').addClass('modalAdd-container');
        $('#modalHeader').removeClass('modalAbout-header');
        $('#modalHeader').addClass('modalAdd-header');
        $('#modalContent').removeClass('modalAbout-content');
        $('#modalContent').addClass('modalAdd-content');
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
                '<input id="btnUpdateHousemate" type="submit" class="btn" value="Update">' +
                '<input id="btnDeleteHousemate" type="submit" class="btn" value="Delete">' +
            '</form>'
        );
        $('#modalFooter').addClass('hide');
        if($('#btnUpdateHousemate').length){
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
        $('#IncomeContainer').addClass('hide');         
        $('#ExpensesContainer').addClass('hide');
        $('#sideHome').removeClass('active');
        $('#sideHousemate').removeClass('active');
        $('#sideFinance').addClass('active');
        $('#sideTask').removeClass('active');
        $('#gotoHome').removeClass('imgMenuFocus');
        $('#gotoHousemate').removeClass('imgMenuFocus');
        $('#gotoFinance').addClass('imgMenuFocus');
        $('#gotoTask').removeClass('imgMenuFocus');
        GetSetBalance();
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
        $('#IncomeContainer').addClass('hide');         
        $('#ExpensesContainer').addClass('hide');
        $('#sideHome').removeClass('active');
        $('#sideHousemate').removeClass('active');
        $('#sideFinance').removeClass('active');
        $('#sideTask').addClass('active');
        $('#gotoHome').removeClass('imgMenuFocus');
        $('#gotoHousemate').removeClass('imgMenuFocus');
        $('#gotoFinance').removeClass('imgMenuFocus');
        $('#gotoTask').addClass('imgMenuFocus');
        if($(window).width() <= 768){
            $('#sidebarCollapse').click();    
        }
    });
    
    // Sidebar About Button
    $('#btnAbout').on('click', function(){
        $('#modalPopUp').removeClass('hide');
        $('#modalPopUp').addClass('modalAdd-container');
        $('#modalHeader').removeClass('modalAdd-header');
        $('#modalHeader').addClass('modalAbout-header');
        $('#modalContent').removeClass('modalAdd-content');
        $('#modalContent').addClass('modalAbout-content');
        $('#modal-title').text('About');
        $('#modalContent').html(
            '<h2>Meet The Team</h2>' +
            '<table class="table table-borderless table-responsive text-center">'+
                '<tr>'+
                    '<td>' +
                        '<div class="contributor">' +
                            '<img alt="achun" src="assets/image/acun.jpg" class="image">' +
                            '<div class="middle">'+
                                '<a href="https://github.com/atjhoendz" target="_blank">' +
                                    '<div class="text";">Moh Achun Armando</div>' +
                                '</a>' +
                            '</div>' +
                        '</div>' +
                    '</td>' +
                    '<td>' +
                        '<div class="contributor">' +
                            '<img alt="ikan" src="assets/image/ikan.jpg" class="image">' +
                            '<div class="middle">' +
                                '<a href="https://github.com/fish-irl" target="_blank">' +
                                    '<div class="text";">Hafizh Adwinsyah</div>' +
                                '</a>' +
                            '</div>' +
                        '</div>' +
                    '</td>' +
                    '<td>' +
                        '<div class="contributor">' +
                            '<img alt="miwan" src="assets/image/miwan.jpg" class="image">' +
                            '<div class="middle">' +
                                '<a href="https://github.com/MeOneIRL" target="_blank">' +
                                    '<div class="text";">Muhammad Fahmi Alwan</div>' +
                                '</a>' +
                            '</div>' +
                        '</div>' +
                    '</td>' +
                '</tr>' +
            '</table>' +
            '<span>Teknik Informatika 2017</span><br>' +
            '<span>Fakultas Matematika dan Ilmu Pengetahuan Alam</span><br>' +
            '<span>Universitas Padjadjaran</span><br>' +
            '<span>{Delphi 2017}</span>'
        );
        $('#modalFooter').removeClass('hide');
        $('#modalFooter').html(
            '&copy Project Pemrograman Web 2018 | E-Work Corp.'
        );

        if($(window).width() <= 768){
            $('#sidebarCollapse').click();
            $('#modalHeader').css({'width':'90%'});
            $('#modalContent').css({'width':'90%'});
        }
    });

    $('#addFinance').on('click', function(){
        $('#modalPopUp').removeClass('hide');
        $('#modalPopUp').addClass('modalAdd-container');
        $('#modalHeader').removeClass('modalAdd-header');
        $('#modalHeader').addClass('modalAdd-header');
        $('#modalContent').removeClass('modalAdd-content');
        $('#modalContent').addClass('modalAdd-content');
        $('#modal-title').text('Add Finance');
        $('#modalContent').html(
            '<form class="formAdd" method="POST">'+
            '	<div class="form-group">'+
            '    	<input type="text" name="detailTrans" id="detailTransaksi" class="form-control" placeholder="Masukan Detail Transaksi">'+
            '        <input type="number" name="jmlTrans" id="jmlTransaksi" class="form-control" placeholder="Masukan Jumlah Uang">'+
            '        <input type="date" name="tglTrans" id="tglTransaksi" class="form-control" placeholder="Masukan Tanggal Transaksi">'+
            '    </div>'+
            '    <div class="centerSlider" id="slider">'+
            '        <span class="txtIncome">Pemasukan</span>'+
            '        <label class="switch" id="statusFinance">'+
            '            <input id="status" type="checkbox">'+
            '        	<span class="slider round"></span>'+
            '        </label>'+
            '        <span class="txtExpenses">Pengeluaran</span>'+
            '    </div>'+
            '    <div class="form-group">'+
            '        <input type="submit" class="btn" value="Add" id="btnAddFinance">'+
            '    </div>'+
            '</form>'
        );
        
        $('#modalFooter').addClass('hide');
        if($('#btnAddFinance').length){
            btnReady();
        }else{
            alert('not ready');
        }
    });



    $("button[id^='btnDeleteFinance']").on('click', function(){
        var id = $(this).val();
        var url = baseUrl + '/deleteFinance';
        $.post(url, {'id_Transaksi':id},
            function (data) {
                if(data == 'Success'){
                    alert('Transaksi berhasil dihapus');
                    location.reload();
                }else{
                    alert(data);
                }
            }
        );
    });

    $('#addTask').on('click', function(){
        $('#modalPopUp').removeClass('hide');
        $('#modalPopUp').addClass('modalAdd-container');
        $('#modalHeader').removeClass('modalAdd-header');
        $('#modalHeader').addClass('modalAdd-header');
        $('#modalContent').removeClass('modalAdd-content');
        $('#modalContent').addClass('modalAdd-content');
        $('#modal-title').text('Add Task');
        $('#modalContent').html(
            '<form class="formAdd" method="post">'+
            '	<div class="form-group">'+
            '        <input type="text" class="form-control" name="txtAddTask" id="txtTaskAddDetail" placeholder="Task Detail">'+
            '    </div>'+
            '    <div class="form-group">'+
            '    	<small class="left select">Deadline</small>'+
            '        <input type="date" name="tglAddTask" id="deadlineAddTask" class="form-control">'+
            '    </div>'+
            '    <div class="form-group">'+
            '        <select class="form-control select" name="listAddAnggota" id="listTaskAddAnggota">'+
            '            <option>Pilih Anggota</option>'+
            '        </select>'+
            '    </div>'+
            '    <div class="form-group">'+
            '	    <input type="submit" class="btn" value="Add" id="btnAddTask">'+
            '    </div>'+
            '</form>'
        );
        $('#modalFooter').addClass('hide');
        if($('#listTaskAddAnggota').length){
            btnReady();
        }else{
            alert('not ready');
        }
    });
    
    $('#taskContainer').on('click', 'tr', function(){
        var taskDetail = $(this).find("td").eq(1).text();
        var tglDeadline = $(this).find("td").eq(2).text();
        var selectedIdTask = $(this).find("td").eq(4).text();
        selectedAnggotaTask = $(this).find("td").eq(5).text();

        $('#modalPopUp').removeClass('hide');
        $('#modalPopUp').addClass('modalAdd-container');
        $('#modalHeader').removeClass('modalAdd-header');
        $('#modalHeader').addClass('modalAdd-header');
        $('#modalContent').removeClass('modalAdd-content');
        $('#modalContent').addClass('modalAdd-content');
        $('#modal-title').text('Options');
        $('#modalContent').html(
            '<form class="formAdd" method="post">'+
            '	<div class="form-group">'+
            '        <input type="text" class="form-control" name="txtTask" id="txtTaskDetail" placeholder="Task Detail" value="'+ taskDetail +'">'+
            '    </div>'+
            '    <div class="form-group">'+
            '    	<small class="left select">Deadline</small>'+
            '        <input type="date" name="tglTask" id="deadlineTask" class="form-control" value="'+ tglDeadline +'">'+
            '    </div>'+
            '    <div class="form-group">'+
            '        <select class="form-control select" name="listAnggota" id="listTaskAnggota">'+
            '            <option>Pilih Anggota</option>'+
            '        </select>'+
            '    </div>'+
            '    <div class="form-group">'+
            '	    <input type="submit" class="btn" value="Update" id="btnUpdateTask">'+
            '    	<input type="submit" class="btn" value="Delete" id="btnDeleteTask">'+
            '    </div>'+
            '</form>'
        );
        $('#modalFooter').addClass('hide');
        if($('#listTaskAnggota').length){
            btnReady();
            $('#btnDeleteTask').on('click', function(e){
                var url = baseUrl + '/deleteTask';
                $.post(url, {'idTask':selectedIdTask},
                    function (data) {
                        if(data == 'Success'){
                            alert("Task berhasil dihapus");
                            location.reload();
                        }else{
                            alert(data);
                        }
                    }
                );
                e.preventDefault();
            })
    
            $('#btnUpdateTask').on('click', function(e){
                var task = $('#txtTaskDetail').val();
                var deadline = $('#deadlineTask').val();
                var selectedTaskAnggota = $('#listTaskAnggota').find(':selected');
                var idAnggota = selectedTaskAnggota.val();
                var namaAnggota = selectedTaskAnggota.text();

                var url = baseUrl + '/updateTask';
                $.post(url, {'idTask' : selectedIdTask, 'idAnggota':idAnggota, 'taskDetail':task, 'namaAnggota':namaAnggota, 'deadlineTask':deadline},
                    function (data) {
                        if(data == 'Success'){
                            alert('Memperbarui Data Berhasil');
                            location.reload();
                        }else{
                            alert(data);
                        }
                    }
                );
                e.preventDefault();
            });
        }else{
            alert('not ready');
        }
    });

    $('#homeFinance').on('click', function(){
        $('#mainContainer').addClass('hide');
        $('#taskContainer').addClass('hide');
        $('#housemateContainer').addClass('hide');
        $('#financeContainer').removeClass('hide');
        $('#IncomeContainer').addClass('hide');         
        $('#ExpensesContainer').addClass('hide');
        $('#sideHome').removeClass('active');
        $('#sideHousemate').removeClass('active');
        $('#sideFinance').addClass('active');
        $('#sideTask').removeClass('active');
        $('#gotoHome').removeClass('imgMenuFocus');
        $('#gotoHousemate').removeClass('imgMenuFocus');
        $('#gotoFinance').addClass('imgMenuFocus');
        $('#gotoTask').removeClass('imgMenuFocus');
        GetSetBalance();
    });

    $('#homeTask').on('click', function(){
        $('#mainContainer').addClass('hide');
        $('#taskContainer').removeClass('hide');
        $('#housemateContainer').addClass('hide');
        $('#financeContainer').addClass('hide');
        $('#IncomeContainer').addClass('hide');         
        $('#ExpensesContainer').addClass('hide');
        $('#sideHome').removeClass('active');
        $('#sideHousemate').removeClass('active');
        $('#sideFinance').removeClass('active');
        $('#sideTask').addClass('active');
        $('#gotoHome').removeClass('imgMenuFocus');
        $('#gotoHousemate').removeClass('imgMenuFocus');
        $('#gotoFinance').removeClass('imgMenuFocus');
        $('#gotoTask').addClass('imgMenuFocus');
    });

    $('#homeHousemate').on('click', function(){
        $('#mainContainer').addClass('hide');
        $('#taskContainer').addClass('hide');
        $('#housemateContainer').removeClass('hide');
        $('#financeContainer').addClass('hide');
        $('#IncomeContainer').addClass('hide');
        $('#ExpensesContainer').addClass('hide');
        $('#sideHome').removeClass('active');
        $('#sideHousemate').addClass('active');
        $('#sideFinance').removeClass('active');
        $('#sideTask').removeClass('active');
        $('#gotoHome').removeClass('imgMenuFocus');
        $('#gotoHousemate').addClass('imgMenuFocus');
        $('#gotoFinance').removeClass('imgMenuFocus');
        $('#gotoTask').removeClass('imgMenuFocus');
    });

    $('#homeAddHousemate').on('click', function(){
        $('#addHousemate').click();
    });

    $('#homeUpdateHousemate').on('click', function(){
        $('#editHousemate').click();
    });

    $('#homeAddFinance').on('click', function(){
        $('#addFinance').click();
    });

    $('#homeAddTask').on('click', function(){
        $('#addTask').click();
    });

    $('#gotoHome').on('click', function(){
        $('#mainContainer').removeClass('hide');
        $('#taskContainer').addClass('hide');
        $('#housemateContainer').addClass('hide');
        $('#financeContainer').addClass('hide');
        $('#IncomeContainer').addClass('hide');
        $('#ExpensesContainer').addClass('hide');
        $('#sideHome').addClass('active');
        $('#sideHousemate').removeClass('active');
        $('#sideFinance').removeClass('active');
        $('#sideTask').removeClass('active');
        $('#gotoHome').addClass('imgMenuFocus');
        $('#gotoHousemate').removeClass('imgMenuFocus');
        $('#gotoFinance').removeClass('imgMenuFocus');
        $('#gotoTask').removeClass('imgMenuFocus');
    });

    $('#gotoHousemate').on('click', function(){
        $('#sideHome').removeClass('active');
        $('#sideHousemate').addClass('active');
        $('#sideFinance').removeClass('active');
        $('#sideTask').removeClass('active');
        $('#gotoHome').removeClass('imgMenuFocus');
        $('#gotoHousemate').addClass('imgMenuFocus');
        $('#gotoFinance').removeClass('imgMenuFocus');
        $('#gotoTask').removeClass('imgMenuFocus');
        $('#homeHousemate').click();
    });

    $('#gotoFinance').on('click', function(){
        $('#sideHome').removeClass('active');
        $('#sideHousemate').removeClass('active');
        $('#sideFinance').addClass('active');
        $('#sideTask').removeClass('active');
        $('#gotoHome').removeClass('imgMenuFocus');
        $('#gotoHousemate').removeClass('imgMenuFocus');
        $('#gotoFinance').addClass('imgMenuFocus');
        $('#gotoTask').removeClass('imgMenuFocus');
        $('#homeFinance').click();
    });

    $('#gotoTask').on('click', function(){
        $('#sideHome').removeClass('active');
        $('#sideHousemate').removeClass('active');
        $('#sideFinance').removeClass('active');
        $('#sideTask').addClass('active');
        $('#gotoHome').removeClass('imgMenuFocus');
        $('#gotoHousemate').removeClass('imgMenuFocus');
        $('#gotoFinance').removeClass('imgMenuFocus');
        $('#gotoTask').addClass('imgMenuFocus');
        $('#homeTask').click();
    });

    $('#sideIncome').on('click', function(){
        $('#sideHome').removeClass('active');
        $('#sideHousemate').removeClass('active');
        $('#sideFinance').addClass('active');
        $('#sideTask').removeClass('active');
        $('#gotoHome').removeClass('imgMenuFocus');
        $('#gotoHousemate').removeClass('imgMenuFocus');
        $('#gotoFinance').addClass('imgMenuFocus');
        $('#gotoTask').removeClass('imgMenuFocus');
        $('#IncomeContainer').removeClass('hide');
        $('#ExpensesContainer').addClass('hide');
        $('#mainContainer').addClass('hide');
        $('#taskContainer').addClass('hide');
        $('#housemateContainer').addClass('hide');
        $('#financeContainer').addClass('hide');
    });

    $('#sideExpenses').on('click', function(){
        $('#sideHome').removeClass('active');
        $('#sideHousemate').removeClass('active');
        $('#sideFinance').addClass('active');
        $('#sideTask').removeClass('active');
        $('#gotoHome').removeClass('imgMenuFocus');
        $('#gotoHousemate').removeClass('imgMenuFocus');
        $('#gotoFinance').addClass('imgMenuFocus');
        $('#gotoTask').removeClass('imgMenuFocus');
        $('#ExpensesContainer').removeClass('hide');
        $('#IncomeContainer').addClass('hide');
        $('#mainContainer').addClass('hide');
        $('#taskContainer').addClass('hide');
        $('#housemateContainer').addClass('hide');
        $('#financeContainer').addClass('hide');
    });
    
    $('#addIncome').on('click', function(){
        $('#addFinance').click();
        if($('#btnAddFinance').length){
            $('#modal-title').text('Add Income');
            $('#status').prop("checked", false);
            $('#slider').hide();
        }
    });

    $('#addExpenses').on('click', function(){
        $('#addFinance').click();
        if($('#btnAddFinance').length){
            $('#modal-title').text('Add Expenses');
            $('#status').prop("checked", true);
            $('#slider').hide();
        }
    })
});;
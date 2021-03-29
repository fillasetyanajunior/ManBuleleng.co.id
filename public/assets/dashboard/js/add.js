$(document).ready(function () {
    $('#tambahmenu').on('click', function () {
        $('.footer_menu button[type=submit]').html('Add');
        $('#ModalMenuLabel').html('Tambah Menu');
        $('.body_menu form').attr('action', '/menu/store');
        $('.body_menu form').attr('method', 'post');

        $("#title").val('');
        $("#icon").val('');
    });
    $('#editmenu*').on('click', function () {
        $('.footer_menu* button[type=submit]').html('Edit');
        $('#ModalMenuLabel*').html('Edit Menu');
        const id = $(this).data('id');
        $('.body_menu form*').attr('action', '/menu/update/' + id);
        $('.body_menu form*').attr('method', 'post');
        
        let _url = '/menu/edit';
        let _token = $('meta[name="csrf-token"]').attr('content');
        
        $.ajax({
            type: 'POST',
            url: _url,
            data: {
                id: id,
                _token: _token
            },
            success: function (hasil) {
                console.log(id)
                $('#title').val(hasil.data[0].title)
                $('#icon').val(hasil.data[0].icon)
            }
        });
    });

    $('#tambahsubmenu').on('click', function () {
        $('.footer_submenu button[type=submit]').html('Add');
        $('#ModalSubMenuLabel').html('Tambah Sub Menu');
        $('.body_submenu form').attr('action', '/submenu/store');
        $('.body_submenu form').attr('method', 'post');

        $("#id_menu").val('');
        $("#title").val('');
        $("#icon").val('');
        $("#url").val('');
    });
    $('#editsubmenu*').on('click', function () {
        $('.footer_submenu* button[type=submit]').html('Edit');
        $('#ModalSubMenuLabel*').html('Edit Sub Menu');
        const id = $(this).data('id');
        $('.body_submenu form*').attr('action', '/submenu/update/' + id);
        $('.body_submenu form*').attr('method', 'post');

        let _url = '/submenu/edit';
        let _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'POST',
            url: _url,
            data: {
                id: id,
                _token: _token
            },
            success: function (hasil) {
                console.log(id)
                $('#id_menu').val(hasil.data[0].id_menu)
                $('#title').val(hasil.data[0].title)
                $('#icon').val(hasil.data[0].icon)
                $('#url').val(hasil.data[0].url)
            }
        });
    });

    $('#tambahaccessmenu').on('click', function () {
        $('.footer_accessmenu button[type=submit]').html('Add');
        $('#ModalAccessMenuLabel').html('Tambah Access Menu');
        $('.body_accessmenu form').attr('action', '/accessmenu/store');
        $('.body_accessmenu form').attr('method', 'post');

        $("#id_menu").val('');
        $("#id_role").val('');
    });
    $('#editaccessmenu*').on('click', function () {
        $('.footer_accessmenu* button[type=submit]').html('Edit');
        $('#ModalAccessMenuLabel*').html('Edit Access Menu');
        const id = $(this).data('id');
        $('.body_accessmenu form*').attr('action', '/accessmenu/update/' + id);
        $('.body_accessmenu form*').attr('method', 'post');

        let _url = '/accessmenu/edit';
        let _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'POST',
            url: _url,
            data: {
                id: id,
                _token: _token
            },
            success: function (hasil) {
                console.log(id)
                $('#id_menu').val(hasil.data[0].id_menu)
                $('#id_role').val(hasil.data[0].id_role)
            }
        });
    });

    $('#tambahmateri').on('click', function () {
        $('.footer_materi button[type=submit]').html('Add');
        $('#ModalMateriLabel').html('Tambah Materi');
        $('.body_materi form').attr('action', '/materi/store');
        $('.body_materi form').attr('method', 'post');

        $("#mapel").val('');
        $("#judul").val('');
        $("#kelas").val('');
    });
    $('#editmateri*').on('click', function () {
        $('.footer_materi* button[type=submit]').html('Edit');
        $('#ModalMateriLabel*').html('Edit Materi');
        const id = $(this).data('id');
        $('.body_materi form*').attr('action', '/materi/update/' + id);
        $('.body_materi form*').attr('method', 'post');

        let _url = '/materi/edit';
        let _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'POST',
            url: _url,
            data: {
                id: id,
                _token: _token
            },
            success: function (hasil) {
                console.log(id)
                $('#mapel').val(hasil.data[0].mapel)
                $('#judul').val(hasil.data[0].judul)
                $('#kelas').val(hasil.data[0].kelas)
            }
        });
    });

    $('#tambahjadwal10').on('click', function () {
        $('.footer_jadwal10 button[type=submit]').html('Add');
        $('#ModalJadwal10Label').html('Tambah Jadwal Kelas');
        $('.body_jadwal10 form').attr('action', '/jadwal10/store');
        $('.body_jadwal10 form').attr('method', 'post');

        $("#hari").val('');
        $("#jam").val('');
        $("#matapelajaran").val('');
        $("#guru").val('');
        $("#tahun").val('');
        $("#jurusan").val('');
    });
    $('#editjadwal10*').on('click', function () {
        $('.footer_jadwal10* button[type=submit]').html('Edit');
        $('#ModalJadwal10Label*').html('Edit Jadwal Kelas');
        const id = $(this).data('id');
        $('.body_jadwal10 form*').attr('action', '/jadwal10/update/' + id);
        $('.body_jadwal10 form*').attr('method', 'post');

        let _url = '/jadwal10/edit';
        let _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'POST',
            url: _url,
            data: {
                id: id,
                _token: _token
            },
            success: function (hasil) {
                console.log(id)
                $('#hari').val(hasil.data[0].hari)
                $('#jam').val(hasil.data[0].jam)
                $('#matapelajaran').val(hasil.data[0].matapelajaran)
                $('#guru').val(hasil.data[0].guru)
                $('#tahun').val(hasil.data[0].tahun)
                $('#jurusan').val(hasil.data[0].jurusan)
            }
        });
    });

    $('#tambahjadwal11').on('click', function () {
        $('.footer_jadwal11 button[type=submit]').html('Add');
        $('#ModalJadwal11Label').html('Tambah Jadwal Kelas');
        $('.body_jadwal11 form').attr('action', '/jadwal11/store');
        $('.body_jadwal11 form').attr('method', 'post');

        $("#hari").val('');
        $("#jam").val('');
        $("#matapelajaran").val('');
        $("#guru").val('');
        $("#tahun").val('');
        $("#jurusan").val('');
    });
    $('#editjadwal11*').on('click', function () {
        $('.footer_jadwal11* button[type=submit]').html('Edit');
        $('#ModalJadwal11Label*').html('Edit Jadwal Kelas');
        const id = $(this).data('id');
        $('.body_jadwal11 form*').attr('action', '/jadwal11/update/' + id);
        $('.body_jadwal11 form*').attr('method', 'post');

        let _url = '/jadwal11/edit';
        let _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'POST',
            url: _url,
            data: {
                id: id,
                _token: _token
            },
            success: function (hasil) {
                console.log(id)
                $('#hari').val(hasil.data[0].hari)
                $('#jam').val(hasil.data[0].jam)
                $('#matapelajaran').val(hasil.data[0].matapelajaran)
                $('#guru').val(hasil.data[0].guru)
                $('#tahun').val(hasil.data[0].tahun)
                $('#jurusan').val(hasil.data[0].jurusan)
            }
        });
    });

    $('#tambahjadwal12').on('click', function () {
        $('.footer_jadwal12 button[type=submit]').html('Add');
        $('#ModalJadwal12Label').html('Tambah Jadwal Kelas');
        $('.body_jadwal12 form').attr('action', '/jadwal12/store');
        $('.body_jadwal12 form').attr('method', 'post');

        $("#hari").val('');
        $("#jam").val('');
        $("#matapelajaran").val('');
        $("#guru").val('');
        $("#tahun").val('');
        $("#jurusan").val('');
    });
    $('#editjadwal12*').on('click', function () {
        $('.footer_jadwal12* button[type=submit]').html('Edit');
        $('#ModalJadwal12Label*').html('Edit Jadwal Kelas');
        const id = $(this).data('id');
        $('.body_jadwal12 form*').attr('action', '/jadwal12/update/' + id);
        $('.body_jadwal12 form*').attr('method', 'post');

        let _url = '/jadwal12/edit';
        let _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'POST',
            url: _url,
            data: {
                id: id,
                _token: _token
            },
            success: function (hasil) {
                console.log(id)
                $('#hari').val(hasil.data[0].hari)
                $('#jam').val(hasil.data[0].jam)
                $('#matapelajaran').val(hasil.data[0].matapelajaran)
                $('#guru').val(hasil.data[0].guru)
                $('#tahun').val(hasil.data[0].tahun)
                $('#jurusan').val(hasil.data[0].jurusan)
            }
        });
    });

    $('#tambahulangan10').on('click', function () {
        $('.footer_ulangan10 button[type=submit]').html('Add');
        $('#ModalUlangan10Label').html('Tambah Jadwal Ulangan');
        $('.body_ulangan10 form').attr('action', '/ulangan10/store');
        $('.body_ulangan10 form').attr('method', 'post');

        $("#tanggal").val('');
        $("#jam").val('');
        $("#matapelajaran").val('');
        $("#tahun").val('');
        $("#jurusan").val('');
        $("#kursi").val('');
    });
    $('#editulangan10*').on('click', function () {
        $('.footer_ulangan10* button[type=submit]').html('Edit');
        $('#ModalUlangan10Label*').html('Edit Jadwal Ulangan');
        const id = $(this).data('id');
        $('.body_ulangan10 form*').attr('action', '/ulangan10/update/' + id);
        $('.body_ulangan10 form*').attr('method', 'post');

        let _url = '/ulangan10/edit';
        let _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'POST',
            url: _url,
            data: {
                id: id,
                _token: _token
            },
            success: function (hasil) {
                console.log(id)
                $('#tanggal').val(hasil.data[0].tanggal)
                $('#jam').val(hasil.data[0].jam)
                $('#matapelajaran').val(hasil.data[0].matapelajaran)
                $('#tahun').val(hasil.data[0].tahun)
                $('#jurusan').val(hasil.data[0].jurusan)
                $('#kursi').val(hasil.data[0].kursi)
            }
        });
    });

    $('#tambahulangan11').on('click', function () {
        $('.footer_ulangan11 button[type=submit]').html('Add');
        $('#ModalUlangan11Label').html('Tambah Jadwal Ulangan');
        $('.body_ulangan11 form').attr('action', '/ulangan11/store');
        $('.body_ulangan11 form').attr('method', 'post');

        $("#tanggal").val('');
        $("#jam").val('');
        $("#matapelajaran").val('');
        $("#tahun").val('');
        $("#jurusan").val('');
        $("#kursi").val('');
    });
    $('#editulangan11*').on('click', function () {
        $('.footer_ulangan11* button[type=submit]').html('Edit');
        $('#ModalUlangan11Label*').html('Edit Jadwal Ulangan');
        const id = $(this).data('id');
        $('.body_ulangan11 form*').attr('action', '/ulangan11/update/' + id);
        $('.body_ulangan11 form*').attr('method', 'post');

        let _url = '/ulangan11/edit';
        let _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'POST',
            url: _url,
            data: {
                id: id,
                _token: _token
            },
            success: function (hasil) {
                console.log(id)
                $('#tanggal').val(hasil.data[0].tanggal)
                $('#jam').val(hasil.data[0].jam)
                $('#matapelajaran').val(hasil.data[0].matapelajaran)
                $('#tahun').val(hasil.data[0].tahun)
                $('#jurusan').val(hasil.data[0].jurusan)
                $('#kursi').val(hasil.data[0].kursi)
            }
        });
    });

    $('#tambahulangan12').on('click', function () {
        $('.footer_ulangan12 button[type=submit]').html('Add');
        $('#ModalUlangan12Label').html('Tambah Jadwal Ulangan');
        $('.body_ulangan12 form').attr('action', '/ulangan12/store');
        $('.body_ulangan12 form').attr('method', 'post');

        $("#tanggal").val('');
        $("#jam").val('');
        $("#matapelajaran").val('');
        $("#tahun").val('');
        $("#jurusan").val('');
        $("#kursi").val('');
    });
    $('#editulangan12*').on('click', function () {
        $('.footer_ulangan12* button[type=submit]').html('Edit');
        $('#ModalUlangan12Label*').html('Edit Jadwal Ulangan');
        const id = $(this).data('id');
        $('.body_ulangan12 form*').attr('action', '/ulangan12/update/' + id);
        $('.body_ulangan12 form*').attr('method', 'post');

        let _url = '/ulangan12/edit';
        let _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'POST',
            url: _url,
            data: {
                id: id,
                _token: _token
            },
            success: function (hasil) {
                console.log(id)
                $('#tanggal').val(hasil.data[0].tanggal)
                $('#jam').val(hasil.data[0].jam)
                $('#matapelajaran').val(hasil.data[0].matapelajaran)
                $('#tahun').val(hasil.data[0].tahun)
                $('#jurusan').val(hasil.data[0].jurusan)
                $('#kursi').val(hasil.data[0].kursi)
            }
        });
    });

    $('#tambahtahun').on('click', function () {
        $('.footer_tahun button[type=submit]').html('Add');
        $('#ModalTahunLabel').html('Tambah Tahun Ajaran');
        $('.body_tahun form').attr('action', '/tahun/store');
        $('.body_tahun form').attr('method', 'post');

        $("#tahun").val('');
    });
    $('#edittahun*').on('click', function () {
        $('.footer_tahun* button[type=submit]').html('Edit');
        $('#ModalTahunLabel*').html('Edit Tahun Ajaran');
        const id = $(this).data('id');
        $('.body_tahun form*').attr('action', '/tahun/update/' + id);
        $('.body_tahun form*').attr('method', 'post');

        let _url = '/tahun/edit';
        let _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'POST',
            url: _url,
            data: {
                id: id,
                _token: _token
            },
            success: function (hasil) {
                console.log(id)
                $('#tahun').val(hasil.data[0].tahun)
            }
        });
    });

    $('#tambahmatapelajaran').on('click', function () {
        $('.footer_matapelajaran button[type=submit]').html('Add');
        $('#ModalMatapelajaranLabel').html('Tambah Matapelajaran');
        $('.body_matapelajaran form').attr('action', '/matapelajaran/store');
        $('.body_matapelajaran form').attr('method', 'post');

        $("#matapelajaran").val('');
    });
    $('#editmatapelajaran*').on('click', function () {
        $('.footer_matapelajaran* button[type=submit]').html('Edit');
        $('#ModalMatapelajaranLabel*').html('Edit Matapelajaran');
        const id = $(this).data('id');
        $('.body_matapelajaran form*').attr('action', '/matapelajaran/update/' + id);
        $('.body_matapelajaran form*').attr('method', 'post');

        let _url = '/matapelajaran/edit';
        let _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'POST',
            url: _url,
            data: {
                id: id,
                _token: _token
            },
            success: function (hasil) {
                console.log(id)
                $('#matapelajaran').val(hasil.data[0].matapelajaran)
            }
        });
    });

    $('#tambahjurusan').on('click', function () {
        $('.footer_jurusan button[type=submit]').html('Add');
        $('#ModalJurusanLabel').html('Tambah Jurusan');
        $('.body_jurusan form').attr('action', '/jurusan/store');
        $('.body_jurusan form').attr('method', 'post');

        $("#jurusan").val('');
    });
    $('#editjurusan*').on('click', function () {
        $('.footer_jurusan* button[type=submit]').html('Edit');
        $('#ModalJurusanLabel*').html('Edit Jurusan');
        const id = $(this).data('id');
        $('.body_jurusan form*').attr('action', '/jurusan/update/' + id);
        $('.body_jurusan form*').attr('method', 'post');

        let _url = '/jurusan/edit';
        let _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'POST',
            url: _url,
            data: {
                id: id,
                _token: _token
            },
            success: function (hasil) {
                console.log(id)
                $('#jurusan').val(hasil.data[0].jurusan)
            }
        });
    });

    $('#tambahuser').on('click', function () {
        $('.footer_user button[type=submit]').html('Add');
        $('#ModalUserLabel').html('Tambah User');
        $('.body_user form').attr('action', '/user/store');
        $('.body_user form').attr('method', 'post');

        $('#name').val('')
        $('.username').hide()
        $('.password').hide()
        $('#role').val('3')
    });
    $('#edituser*').on('click', function () {
        $('.footer_user* button[type=submit]').html('Edit');
        $('#ModalUserLabel*').html('Edit User');
        const id = $(this).data('id');
        $('.body_user form*').attr('action', '/user/update/' + id);
        $('.body_user form*').attr('method', 'post');

        $('.username').show()
        $('.password').show()

        let _url = '/user/edit';
        let _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'POST',
            url: _url,
            data: {
                id: id,
                _token: _token
            },
            success: function (hasil) {
                console.log(id)

                $('#name').val(hasil.data[0].name)
                $('#username').val(hasil.data[0].username)
                $('#password').val(hasil.data[0].password1)
                $('#role').val(hasil.data[0].role)
            }
        });
    });

    $('#tambahguru').on('click', function () {
        $('.footer_guru button[type=submit]').html('Add');
        $('#ModalGuruLabel').html('Tambah User Guru');
        $('.body_guru form').attr('action', '/user/store');
        $('.body_guru form').attr('method', 'post');

        $('#names').val('')
        $('.usernames').hide()
        $('.passwords').hide()
        $('#roles').val('')
    });
    $('#editguru*').on('click', function () {
        $('.footer_guru* button[type=submit]').html('Edit');
        $('#ModalGuruLabel*').html('Edit User Guru');
        const id = $(this).data('id');
        $('.body_guru form*').attr('action', '/user/update/' + id);
        $('.body_guru form*').attr('method', 'post');

        $('.usernames').show()
        $('.passwords').show()

        let _url = '/user/edit';
        let _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'POST',
            url: _url,
            data: {
                id: id,
                _token: _token
            },
            success: function (hasil) {
                console.log(id)
                $('#names').val(hasil.data[0].name)
                $('#usernames').val(hasil.data[0].username)
                $('#passwords').val(hasil.data[0].password1)
                $('#roles').val(hasil.data[0].role)
            }
        });
    });

    $('#editpendaftaran*').on('click', function () {
        $('.footer_pendaftaran* button[type=submit]').html('Edit');
        $('#ModalPendaftaranLabel*').html('Edit Pendaftaran');
        const id = $(this).data('id');
        $('.body_pendaftaran form*').attr('action', '/pendaftaran/update/' + id);
        $('.body_pendaftaran form*').attr('method', 'post');

        let _url = '/pendaftaran/edit';
        let _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'POST',
            url: _url,
            data: {
                id: id,
                _token: _token
            },
            success: function (hasil) {
                console.log(id)
                $('#name').val(hasil.data[0].nama)
                $('#nisn').val(hasil.data[0].nisn)
                $('#kode').val(hasil.data[0].kode)
                $('#active').val(hasil.data[0].is_active)
            }
        });
    });

    $('#tambahnilai').on('click', function () {
        $('.footer_nilai button[type=submit]').html('Add');
        $('#ModalNilaiLabel').html('Tambah Nilai');
        $('.body_nilai form').attr('action', '/inputnilai');
        $('.body_nilai form').attr('method', 'post');

        $('.angka').hide()
        $('.huruf').hide()
        $('.import_excel').show()
    });
    $('#editnilai*').on('click', function () {
        $('.footer_nilai* button[type=submit]').html('Edit');
        $('#ModalNilaiLabel*').html('Edit Nilai');
        const id = $(this).data('id');
        $('.body_nilai form*').attr('action', '/inputnilai/update/' + id);
        $('.body_nilai form*').attr('method', 'post');

        $('.angka').show()
        $('.huruf').show()
        $('.import_excel').hide()

        let _url = '/inputnilai/edit';
        let _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'POST',
            url: _url,
            data: {
                id: id,
                _token: _token
            },
            success: function (hasil) {
                console.log(id)
                $('#angka').val(hasil.data[0].angka)
                $('#huruf').val(hasil.data[0].huruf)
            }
        });
    });

})
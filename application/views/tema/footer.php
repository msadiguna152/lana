
<footer class="main-footer text-sm">
  <div class="d-flex align-items-center justify-content-between flex-wrap">
    <div class="d-flex align-items-center">
      <img src="<?= base_url('assets/logo.png');?>" 
           alt="SIP ATK" 
           style="height:25px;" 
           class="mr-2">
      <span>
        <strong>Sistem Informasi Persediaan ATK</strong><br>
        <small>Kantah Kab. Tanah Laut</small>
      </span>
    </div>

    <div class="text-right">
      <strong>Copyright &copy; <?= date('Y');?> </strong>
      <a href="https://adminlte.io" target="_blank">AdminLTE</a>.
      All rights reserved.
    </div>
  </div>
</footer>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('assets/');?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/');?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/');?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/');?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/');?>dist/js/adminlte.js"></script>
<script src="<?= base_url('assets/');?>dist/js/pages/dashboard.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url('assets/');?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/');?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/');?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/');?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/');?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<!-- pace-progress -->
<script src="<?= base_url('assets/');?>plugins/pace-progress/pace.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url('assets/')?>plugins/select2/js/select2.full.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Bootstrap Switch -->
<script src="<?= base_url('assets/')?>plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

<script>
  function animateCounter(element, target) {
    let start = 0;
    let increment = target / 40;

    let interval = setInterval(() => {
      start += increment;
      if (start >= target) {
        element.innerText = target;
        clearInterval(interval);
      } else {
        element.innerText = Math.floor(start);
      }
    }, 20);
  }

  function loadDashboardData() {
    fetch("<?= site_url('Beranda/get_dashboard_data'); ?>")
    .then(response => response.json())
    .then(data => {
      animateCounter(document.getElementById('total_barang'), data.total_barang);
      animateCounter(document.getElementById('barang_masuk'), data.barang_masuk);
      animateCounter(document.getElementById('barang_keluar'), data.barang_keluar);
      animateCounter(document.getElementById('stok_menipis'), data.stok_menipis);
    });
  }

/* Load awal */
  document.addEventListener("DOMContentLoaded", function(){
    loadDashboardData();
  });

/* 🔄 Refresh otomatis tiap 10 detik */
  setInterval(loadDashboardData, 10000);
</script>

<script>
  $(document).ready(function () {

    $('#id_pegawai').on('change', function () {
      let id_pegawai = $(this).val();

      if (id_pegawai) {
        $.ajax({
          url: "<?= base_url('Barang_keluar/get_seksi_by_pegawai'); ?>",
          type: "POST",
          data: { id_pegawai: id_pegawai },
          dataType: "json",
          success: function (res) {
            if (res.status === true) {
              $('#asal_permintaan').val(res.nama_bidang);
            } else {
              $('#asal_permintaan').val('');
            }
          }
        });
      } else {
        $('#asal_permintaan').val('');
      }

    });

  });
</script>

<script>
  $(document).ready(function () {

    $('#id_bidang').on('change', function () {
      let id_bidang = $(this).val();

      $('#id_jabatan').html('<option value="">Loading...</option>');

      if (id_bidang !== '') {
        $.ajax({
          url: "<?= base_url('Pegawai/get_by_bidang'); ?>",
          type: "POST",
          data: {id_bidang: id_bidang},
          dataType: "json",
          success: function (data) {
            let option = '<option value="">--- Pilih Jabatan ---</option>';
            $.each(data, function (i, val) {
              option += '<option value="'+val.id_jabatan+'">'+val.nama_jabatan+'</option>';
            });
            $('#id_jabatan').html(option).trigger('change');
          }
        });
      } else {
        $('#id_jabatan').html('<option value="">--- Pilih Jabatan ---</option>');
      }
    });

  });
</script>


<script type="text/javascript">
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
  
  $("input[data-bootstrap-switch]").each(function(){
    $(this).bootstrapSwitch('state', $(this).prop('checked'));
  })

  const flashData = $('.flash-data').data('flashdata');
  const flashData2 = $('.flash-data2').data('flashdata');
  const flashData3 = $('.flash-data3').data('flashdata');

  console.log(flashData3);
  if (flashData) {
    if (flashData=='berhasil_login') {
      Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Anda berhasil login sebagai <?= $this->session->userdata('level');?>!',
        showConfirmButton: true,
        // timer: 1000
      })
    } else {
      Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Data berhasil '+flashData+'!',
        showConfirmButton: false,
        timer: 1000
      })
    }
    
  };

  if (flashData3) {
    Swal.fire({
      position: 'center',
      icon: 'warning',
      title: 'Perhatian!',
      html: '<label class="text text-danger">'+flashData3+'<label>',
      showConfirmButton: true,
    })
  };

  $('.tombol-hapus').on('click', function(e) {
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
      title: 'Apakah anda yakin?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!',
      cancelButtonText: 'Batal!',
    }).then((result) => {
      if (result.value) {
        document.location.href = href;
      }
    })
  });

  $('.tombol-logout').on('click', function(e) {
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
      title: 'Apakah anda yakin?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, logout!',
      cancelButtonText: 'Batal!',
    }).then((result) => {
      if (result.value) {
        document.location.href = href;
      }
    })
  })
</script>

<script>
  $(function () {

    screenWidth = window.screen.width;
    screenHeight = window.screen.height;

    if (screenHeight<450) {
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        language: {
          url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json',
        },

      });
    } else {
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": false,
        language: {
          url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json',
        },
      });
    };

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });
  });
</script>

<script>
  function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))

      return false;
    return true;
  }
</script>

<script type="text/javascript">
  $(function () {
    $("#btnSubmit").click(function () {
      var password = $("#txtPassword").val();
      var confirmPassword = $("#txtConfirmPassword").val();
      if (password != confirmPassword) {
        alert("Masukan konfirmasi password dengan benar!");
        return false;
      }
      return true;
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    cek_select();
    $("#add-delete").hide();
    $("#get_tabel").find("select").select2({theme: 'bootstrap4'});
    $("#add-more").on('click', function (e) {
      // remove select2 from the row to be cloned
      var origin = $("#get_tabel tbody tr:last");
      origin.find('.select2-hidden-accessible').select2('destroy');
      // clone the origin row 
      var newrow = origin.clone();
      // reset new row values
      newrow.find(':input').val('');
      newrow.find(':input').attr("disabled", false);
      newrow.find('#label_stok_barang').html('');

      // menghitung jumlah tr
      var no = $('#get_tabel tbody').find('tr').length;
      // $('#nomor').html(no);
      newrow.find('#nomor').html(no+1);
      // add the new row to the #get_tabel tbody
      $("#get_tabel tbody").append(newrow);
      if (no<=1) {
        $("#add-delete").hide();
      } else {
        $("#add-delete").show();
      }
      //reapply select2 to origin and newRow
      origin.find('.select2').select2({theme: 'bootstrap4'});
      newrow.find('.select2').select2({theme: 'bootstrap4'});
      $("#add-delete").show();
      cek_select();
    });

    $("#add-delete").on('click', function (e) {
      var origin = $("#get_tabel tbody tr:last");
      origin.remove();
      var no = $('#get_tabel tbody').find('tr').length;
      if (no<=1) {
        $("#add-delete").hide();
      } else {
        $("#add-delete").show();
      }
      cek_select();
    });

    function cek_select() {
      $(".select2").change(function() {
        var origin = $(this).closest("tr");

        var cek_barang = $('option:selected',this).val();
        if (cek_barang=='Hapus Barang') {
          origin.find('#label_stok_barang').html('-');
          origin.find('#stok_barang_masuk').attr("disabled", true);
          origin.find('#harga_barang_masuk').attr("disabled", true);
          origin.find('#permintaan').attr("disabled", true);
          origin.find('#stok_barang_keluar').attr("disabled", true);
          origin.find('#rincian').attr("disabled", true);
          origin.find('.barang').attr('name', 'NULL');
        } else {
          origin.find('#permintaan').attr("disabled", false);
          origin.find('#stok_barang_keluar').attr("disabled", false);
          origin.find('#rincian').attr("disabled", false);
          origin.find('#stok_barang_masuk').attr("disabled", false);
          origin.find('#harga_barang_masuk').attr("disabled", false);
          origin.find('.barang').attr('name', 'id_barang[]');

          var stok_barang = $('option:selected',this).data("stok_barang");
          var nama_satuan = $('option:selected',this).data("nama_satuan");

          origin.find('#label_stok_barang').html(stok_barang+' '+nama_satuan);
          var harga_barang = $('option:selected',this).data("harga_barang");
          num = rupiah(harga_barang);
          origin.find('#label_harga_barang').html('Rp. '+num);

          origin.find('#stok_barang_keluar').attr("placeholder","Maksimal "+stok_barang);
          origin.find('#stok_barang_keluar').attr("max",stok_barang);

        }

      });

    };

    function rupiah(nStr)
    {
      nStr += '';
      x = nStr.split('.');
      x1 = x[0];
      x2 = x.length > 1 ? '.' + x[1] : '';
      var rgx = /(\d+)(\d{3})/;
      while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + '.' + '$2');
      }
      return x1 + x2;
    };

    $('#add-more').bind("click", function () {
      $('html,body').animate({ scrollTop: 9999 }, 'slow');
    });

  });
</script>

</body>
</html>

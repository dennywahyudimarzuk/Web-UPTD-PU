$(function() {
    'use strict';
    let language = $("html")[0].lang;
    let id = '';
    let table = '';
    let var_url = '';
    let btn_add = '';
    let btn_edit = '';
    let btn_delete = '';
    
    $(function() {
      table = $('#tblCategory').DataTable({
        processing: true,
        serverside: true,
        ajax: window.location.origin + '/tags',
        columns: [
          {
            data: 'DT_RowIndex',
            name: 'DT_RowIndex',
            orderable: true,
            searchable: false
          },
          {
            data: 'name',
            name: 'name'
          },
          {
            data: 'status',
            name: 'status'
          },
          {
            data: 'action',
            name: 'Action',
            orderable: false,
            searchable: false
          }
        ],
        aLengthMenu: [
          [10, 30, 50, -1],
          [10, 30, 50, "All"]
        ],
        iDisplayLength: 10,
        language: {
          search: "",
          decimal: "",
          emptyTable: language == "en" ? "No data available in table" : "Tak ada data yang tersedia pada tabel ini",
          info: language == "en" ? "Showing _START_ to _END_ of _TOTAL_ entries" : "Menampilkan _START_ hingga _END_ dari _TOTAL_ entri",
          infoEmpty: language == "en" ? "Showing 0 to 0 of 0 entries" : "Menampilkan 0 hingga 0 dari 0 entri",
          infoFiltered: language == "en" ? "(filtered from _MAX_ total entries)" : "(difilter dari _MAX_ total entri)",
          infoPostFix: "",
          thousands: ",",
          lengthMenu: language == "en" ? "Show _MENU_ entries" : "Tampilkan _MENU_ entri",
          loadingRecords: language == "en" ? "Loading..." : "Memuat...",
          processing: "",
          zeroRecords: language == "en" ? "No matching records found" : "Tidak ditemukan catatan yang cocok",
          paginate: {
              first: language == "en" ? "First" : "Pertama",
              last: language == "en" ? "Last" : "Terakhir",
              next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
              previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
          },
          aria: {
              sortAscending: language == "en" ? ": activate to sort column ascending" : ": aktifkan untuk mengurutkan kolom secara menaik",
              sortDescending: language == "en" ? ": activate to sort column descending" : ": aktifkan untuk mengurutkan kolom secara manurun"
          }
        }
      });

      $('#tblCategory').each(function() {
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
        var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
        search_input.attr('placeholder', language == "en" ? "Search" : "Cari");
        search_input.removeClass('form-control-sm');
        // LENGTH - Inline-Form control
        var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
        length_sel.removeClass('form-control-sm');
      });
    });

    //click button add
    $('body').on('click', '.create', function(){
      if(id != ''){
        clear();
      }
      id = '';
      btn_add = $(this).html(language == "en" ? '<i class="fa fa-refresh fa-spin"></i> Create News Category' : '<i class="fa fa-refresh fa-spin"></i> Tambah Kategori Berita');
      $('#modal_cu').modal('show');
      $('#modal_cu .modal-title').text(language == "en" ? "Create News Tags" : "Tambah Tag Berita");
      
      var_url = '/tags';
    })
  
    //click button edit
    $('body').on('click', '.edit', function(){
      id = $(this).data('id');
       
      btn_edit = $(this).html('<i class="fa fa-refresh fa-spin"></i>');
      $.ajax({
        url: window.location.origin + '/tags/'+ id +'/edit',
        type: 'GET',
        success: function(response){
          $('#modal_cu').modal('show');
          $('#modal_cu .modal-title').text(language == "en" ? "Update News Tags" : "Ubah Tags Berita");
          
          $('#modal_cu #name').val(response.name);
        },
        error: function (response) {
          if (response.status == 401 || response.status == 419)
          {
            showSwal('message-with-auto-close');
          }
        }
      })
      var_url = '/tags/'+ id;
    })
  
    //save or update
    $('.save').click(function(e){
      e.preventDefault();
      $('.save').html(language == "en" ? '<i class="fa fa-spinner fa-spin"></i> Save' : '<i class="fa fa-spinner fa-spin"></i> Simpan').attr("disabled", true);
      let form = $('#categoryForm')[0];
      let data = new FormData(form);
      
      if(id != ''){
        data.append("_method", 'PATCH');
      } 
      $.ajax({
        url: window.location.origin + var_url,
        type: 'POST',
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        data: data,
        dataType: 'json',
        success: function(response){
          if(response[0] == "error"){
            showSwal('mixin', 'error', response[1]);
          }else {
            if(id == ""){
              clear();
            }else{
              $('#modal_cu').modal('hide');
            }
            table.ajax.reload( null, false );
            showSwal('mixin', 'success', response.success);
          }
          $('.save').html(language == "en" ? " Save" : " Simpan").attr("disabled", false);
        },
        error: function (response) {
          if (response.status == 401 || response.status == 419)
          {
            showSwal('message-with-auto-close');
          }
        }
      })
    });

    //hide modal
    $('#modal_cu').on('hidden.bs.modal', function(){
      btn_add != "" ? btn_add.html(language == "en" ? "Create News Category" : "Tambah Kategori Berita") : null;
      btn_edit != "" ? btn_edit.html('<i class="fa fa-edit"></i>') : null;
    });
  
    //delete
    $('body').on('click', '.delete', function(){
      id = $(this).data('id');
      btn_delete = $(this).html('<i class="fa fa-refresh fa-spin"></i>').attr("disabled", true);
      
      swal({
        title: language == "en" ? "Are you sure to delete ?" : "Apakah Anda yakin akan menghapusnya?",
        text: language == "en" ? "You will not be able to recover this !!" : "Anda tidak akan dapat memulihkan ini!!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: language == "en" ? "Yes, delete it !!" : "Ya, hapus !!",
        cancelButtonText: language == "en" ? "No, cancel it !!" : "Tidak, batalkan!!",
        reverseButtons: true
      }).then((result) => {
        if (result.value) {
          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          $.ajax({
            url: window.location.origin + '/tags/' + id,
            type: "DELETE",
            dataType: 'json',
            success: function(response) {
              table.ajax.reload( null, false );
              showSwal('mixin', 'success', response.success);
            },
            error: function (response) {
              if (response.status == 401 || response.status == 419)
              {
                showSwal('message-with-auto-close');
              }
            }
          });
        }
        else{
          btn_delete != "" ? btn_delete.html('<i class="fa fa-trash"></i>').attr("disabled", false) : null;
  
        }
      })
    })
  
    //change status
    $('body').on('click', '.status', function(){
      id = $(this).data('id');
      let status = $(this).data('status');
      $(this).html('<span><i class="fa fa-refresh fa-spin"></i></span>');
      
      swal({
        title: 'Are you sure?',
        text: "You changed status!",
        showCancelButton: true,
        confirmButtonText: 'Yes, change it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
      }).then((result) => {
        if (result.value) {
          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          $.ajax({
            url: window.location.origin + '/tags/changed/' + id  + '/' + status,
            type: "PATCH",
            dataType: 'json',
            success: function(response) {
              table.ajax.reload( null, false );
              showSwal('mixin', 'success', response.success);
            },
            error: function (response) {
              if (response.status == 401 || response.status == 419)
              {
                showSwal('message-with-auto-close');
              }
            }
          });
        }
        else{
          if(status === 0){
            $(this).html(language == "en" ? "<span>Active</span>" : "<span>Aktif</span>");
          }else{
            $(this).html(language == "en" ? "<span>Not Active</span>" : "<span>Tidak aktif</span>");
          }
        }
      })
    })
  
    //default
    function clear(){
      $('#modal_cu #name').val("");
    }
  });
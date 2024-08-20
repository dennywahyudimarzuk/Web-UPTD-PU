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
        ajax: window.location.origin + '/dashboard/news',
        columns: [
          {
            data: 'DT_RowIndex',
            name: 'DT_RowIndex',
            orderable: true,
            searchable: false
          },
          {
            data: 'title',
            name: 'title'
          },
          {
            data: 'publish_date',
            name: 'publish_date'
          },
          {
            data: 'news_categories_id',
            name: 'news_categories_id'
          },
         
          {
            data: 'action',
            name: 'action',
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
            url: window.location.origin + '/dashboard/news/' + id,
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

 
 
   
  });
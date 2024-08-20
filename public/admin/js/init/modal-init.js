(function ($) {
    "use strict"
    let language = $("html")[0].lang;
    let id = '';

    $('body').on('click', '.create-user', function(){
        id = '';
        $('#modal_cu').modal('show');
        $('#modal_cu .modal-title').text(language == "en" ? "Create User" : "Tambah Pengguna");
        $("#modal_cu #userForm").attr('method', 'POST');
        $("#modal_cu #userForm").attr('action', window.location.origin + '/users');
        
        if($("#modal_cu #_method").val() != ""){
          clear_user();
        }
        $("#modal_cu #_method").val("");
            
      });

    $('body').on('click', '.update-user', function(){
        id = $(this).data('id');
        $.ajax({
          url: window.location.origin + '/users/'+ id +'/edit',
          type: 'GET',
          success: function(response){
            $('#modal_cu').modal('show');
            $('#modal_cu .modal-title').text(language == "en" ? "Update User" : "Ubah Pengguna");
            $("#modal_cu #userForm").attr('method', 'POST');
            $("#modal_cu #userForm").attr('action', window.location.origin + '/users/' + id);
            $("#modal_cu #_method").val("PATCH");
            
            $('#modal_cu #name').val(response.name);
            $('#modal_cu #email').val(response.email);
            $('#modal_cu #password').val("");
          },
          error: function (response) {
            if (response.status == 401 || response.status == 419)
            {
              showSwal('message-with-auto-close');
            }
          }
        })
      });

      $('body').on('click', '.delete-user', function(){
        id = $(this).data('id');
    
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
              url: window.location.origin + '/users/' + id,
              type: "DELETE",
              dataType: 'json',
              success: function(response) {
                location.reload();
              },
              error: function (response) {
                location.reload();
                if (response.status == 401 || response.status == 419)
                {
                  showSwal('message-with-auto-close');
                }
              }
            });
          }
          else{
          }
        })
      })

      function clear_user() {
        $('#modal_cu #name').val("");
        $('#modal_cu #email').val("");
        $('#modal_cu #password').val("");
      }

    })(jQuery);
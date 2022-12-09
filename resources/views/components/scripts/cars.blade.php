<script>
    let car_id

    // const create = () => {
    //     $('#createForm').trigger('reset');
    //     $('#createModal').modal('show');
    // }

    // const deleteData = (id) => {
    //     Swal.fire({
    //         title: 'Apa anda yakin untuk menghapus mobil ini?',
    //         icon: 'warning',
    //         showCancelButton: true,
    //         confirmButtonText: 'Ya',
    //         cancelButtonText: 'Tidak'
    //     }).then((result) => {
    //         Swal.close();

    //         if (result.value) {
    //             Swal.fire({
    //                 title: 'Mohon tunggu',
    //                 showConfirmButton: false,
    //                 allowOutsideClick: false,
    //                 willOpen: () => {
    //                     Swal.showLoading()
    //                 }
    //             });

    //             $.ajax({
    //                 type: "delete",
    //                 url: `/cars/${id}`,
    //                 dataType: "json",
    //                 success: function(response) {
    //                     Swal.close();
    //                     if (response.status) {
    //                         Swal.fire(
    //                             'Success!',
    //                             response.msg,
    //                             'success'
    //                         )
    //                         $('#table').DataTable().ajax.reload();
    //                     } else {
    //                         Swal.fire(
    //                             'Error!',
    //                             response.msg,
    //                             'warning'
    //                         )
    //                     }
    //                 }
    //             });
    //         }
    //     });
    // }

    // const edit = (id) => {
    //     Swal.fire({
    //         title: 'Mohon tunggu',
    //         showConfirmButton: false,
    //         allowOutsideClick: false,
    //         willOpen: () => {
    //             Swal.showLoading()
    //         }
    //     });
    //     supplier_id = id;

    //     $.ajax({
    //         type: "get",
    //         url: `/supplier/${supplier_id}`,
    //         dataType: "json",
    //         success: function(response) {
    //             $('#editname').val(response.name);
    //             $('#editaddress').val(response.address);

    //             Swal.close();
    //             $('#editModal').modal('show');
    //         }
    //     })
    // }

    $(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        $('#table').DataTable({
            dom: 'Bfrtip',
            // Configure the drop down options.
            lengthMenu: [
                [10, 25, 50, -1],
                ['10 rows', '25 rows', '50 rows', 'Show all']
            ],
            buttons: [
                'pageLength', 'excel', 'print'
            ],
            filter: true,
            processing: true,
            responsive: true,
            serverSide: true,
            ajax: {
                url: '/cars/data'
            },
            "columns": [{
                    data: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'name',
                },
                {
                    data: 'type',
                },
                {
                    data: 'lisence_plate',
                },
                {
                    data: 'owner',
                },
                {
                    data: 'action',
                    orderable: false,
                    searchable: false
                },

            ]
        });

        // $('#createSubmit').click(function(e) {
        //     e.preventDefault();

        //     var formData = $('#createForm').serialize();

        //     Swal.fire({
        //         title: 'Mohon tunggu',
        //         showConfirmButton: false,
        //         allowOutsideClick: false,
        //         willOpen: () => {
        //             Swal.showLoading()
        //         }
        //     });

        //     $.ajax({
        //         type: "post",
        //         url: "/supplier",
        //         data: formData,
        //         dataType: "json",
        //         cache: false,
        //         processData: false,
        //         success: function(data) {
        //             Swal.close();
        //             if (data.status) {
        //                 Swal.fire(
        //                     'Success!',
        //                     data.msg,
        //                     'success'
        //                 )

        //                 $('#createModal').modal('hide');
        //                 $('#table').DataTable().ajax.reload();
        //             } else {
        //                 Swal.fire(
        //                     'Error!',
        //                     data.msg,
        //                     'warning'
        //                 )
        //             }
        //         }
        //     })
        // });

        // $('#editSubmit').click(function(e) {
        //     e.preventDefault();

        //     var formData = $('#editForm').serialize();

        //     Swal.fire({
        //         title: 'Mohon tunggu',
        //         showConfirmButton: false,
        //         allowOutsideClick: false,
        //         willOpen: () => {
        //             Swal.showLoading()
        //         }
        //     });

        //     $.ajax({
        //         type: "post",
        //         url: `/supplier/${supplier_id}`,
        //         dataType: "json",
        //         data: formData,
        //         cache: false,
        //         proccessData: false,
        //         success: function(data) {
        //             Swal.close();

        //             if (data.status) {
        //                 Swal.fire(
        //                     'Success!',
        //                     data.msg,
        //                     'success'
        //                 )
        //                 supplier_id = null;
        //                 $('#editModal').modal('hide');
        //                 $('#table').DataTable().ajax.reload();
        //             } else {
        //                 Swal.fire(
        //                     'Error!',
        //                     data.msg,
        //                     'warning'
        //                 )
        //             }
        //         }
        //     });
        // });
    });
</script>

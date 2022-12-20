<script>
    let approvals_id

    // const create = () => {
    //     $('#createForm').trigger('reset');
    //     $('#createModal').modal('show');
    // }

    // const deleteData = (id) => {
    //     Swal.fire({
    //         title: 'Apa anda yakin untuk menghapus pesanan ini?',
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
    //                 url: `/bookings/${id}`,
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

    // const update = (id) => {
    //     Swal.fire({
    //         title: 'Mohon tunggu',
    //         showConfirmButton: false,
    //         allowOutsideClick: false,
    //         willOpen: () => {
    //             Swal.showLoading()
    //         }
    //     });
    //     approvals_id = id;

    //     $.ajax({
    //         type: "get",
    //         url: `/approvals/${id}`,
    //         dataType: "json",
    //         success: function(response) {
    //             $('#driver_name-update').val(response.driver_name);
    //             $('#car_id-update').val(response.car_id);
    //             $('#lisence_plate-update').val(response.lisence_plate);
    //             $('#date_from-update').val(response.date_from);
    //             $('#date_to-update').val(response.date_to);
    //             $('#user_id-update').val(response.user_id);
    //             $('#status-update').val(response.status);

    //             Swal.close();
    //             $('#updateModal').modal('show');
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
                url: '/approval-histories/data'
            },
            "columns": [{
                    data: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'driver_name',
                },
                {
                    data: 'car_id',
                },
                {
                    data: 'lisence_plate',
                },
                {
                    data: 'date_from',
                },
                {
                    data: 'date_to',
                },
                {
                    data: 'duration',
                },
                {
                    data: 'status',
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
        //         url: "/bookings",
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

        // $('#updateSubmit').click(function(e) {
        //     e.preventDefault();

        //     var formData = $('#updateForm').serialize();

        //     Swal.fire({
        //         title: 'Mohon tunggu',
        //         showConfirmButton: false,
        //         allowOutsideClick: false,
        //         willOpen: () => {
        //             Swal.showLoading()
        //         }
        //     });

        //     $.ajax({
        //         type: "put",
        //         url: `/approvals/${approvals_id}`,
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
        //                 $('#updateModal').modal('hide');
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

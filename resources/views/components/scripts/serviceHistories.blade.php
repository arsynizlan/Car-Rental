<script>
    let service_hisory_id

    const create = () => {
        $('#createForm').trigger('reset');
        $('#createModal').modal('show');
    }

    const deleteData = (id) => {
        Swal.fire({
            title: 'Apa anda yakin untuk menghapus riwayat ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            Swal.close();

            if (result.value) {
                Swal.fire({
                    title: 'Mohon tunggu',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    willOpen: () => {
                        Swal.showLoading()
                    }
                });

                $.ajax({
                    type: "delete",
                    url: `/service-histories/${id}`,
                    dataType: "json",
                    success: function(response) {
                        Swal.close();
                        if (response.status) {
                            Swal.fire(
                                'Success!',
                                response.msg,
                                'success'
                            )
                            $('#table').DataTable().ajax.reload();
                        } else {
                            Swal.fire(
                                'Error!',
                                response.msg,
                                'warning'
                            )
                        }
                    }
                });
            }
        });
    }

    // const update = (id) => {
    //     Swal.fire({
    //         title: 'Mohon tunggu',
    //         showConfirmButton: false,
    //         allowOutsideClick: false,
    //         willOpen: () => {
    //             Swal.showLoading()
    //         }
    //     });
    //     car_id = id;

    //     $.ajax({
    //         type: "get",
    //         url: `/cars/${id}`,
    //         dataType: "json",
    //         success: function(response) {
    //             $('#name-update').val(response.name);
    //             $('#type-update').val(response.type);
    //             $('#lisence_plate-update').val(response.lisence_plate);
    //             $('#owner-update').val(response.owner);

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
                url: '/service-histories/data'
            },
            "columns": [{
                    data: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'car_id',
                },
                {
                    data: 'lisence_plate',
                },
                {
                    data: 'date',
                },
                {
                    data: 'description',
                },
                {
                    data: 'action',
                    orderable: false,
                    searchable: false
                },

            ]
        });

        $('#createSubmit').click(function(e) {
            e.preventDefault();

            var formData = $('#createForm').serialize();

            Swal.fire({
                title: 'Mohon tunggu',
                showConfirmButton: false,
                allowOutsideClick: false,
                willOpen: () => {
                    Swal.showLoading()
                }
            });

            $.ajax({
                type: "post",
                url: "/service-histories",
                data: formData,
                dataType: "json",
                cache: false,
                processData: false,
                success: function(data) {
                    Swal.close();
                    if (data.status) {
                        Swal.fire(
                            'Success!',
                            data.msg,
                            'success'
                        )
                        $('#createModal').modal('hide');
                        $('#table').DataTable().ajax.reload();
                    } else {
                        Swal.fire(
                            'Error!',
                            data.msg,
                            'warning'
                        )
                    }
                }
            })
        });

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
        //         url: `/cars/${car_id}`,
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

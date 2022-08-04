<div class="container pt-1">
    @csrf
    <div id="jsGrid"></div>

</div>


@section('scripts')
    <script>
        $(document).ready(function() {


            $("#jsGrid").jsGrid({
                height: "auto",
                width: "100%",
                filtering: true,
                inserting: true,
                sorting: true,
                paging: true,
                autoload: true,
                editing: true,
                pageSize: 10,
                pageButtonCount: 5,
                pageFirstText: 'الأول',
                pageLastText: 'الأخير',
                pageNextText: 'التالي',
                pagePrevText: 'السابق',
                pagerFormat: " ورقة {pageIndex} من {pageCount} : {first} {prev} {pages} {next} {last} &nbsp;&nbsp",

                controller: {
                    loadData: function(filter) {
                        return $.ajax({
                            url: "{{ route('departments') }}",
                            type: 'Get',
                            data: filter,
                        });
                    },
                    insertItem: function(item) {

                        return $.ajax({
                            type: "POST",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: "department/store",
                            data: item,
                            success: function() {
                                toastsuccess();
                            },
                            error: function(er) {
                                toastError(er);
                            }

                        });
                    },
                    updateItem: function(item) {

                        return $.ajax({
                            type: "PUT",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: "department/" + item.id,
                            data: item,
                            success: function() {
                                console.log('updated');
                            },
                            error: function(err) {
                                toastError(err);
                            }
                        });
                    },
                    deleteItem: function(item) {
                        return $.ajax({
                            type: "DELETE",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: "department/" + item.id,
                            data: item,
                            success: function(res) {
                                toastr.info('تم الحذف بنجاح', 'السلام عليكم', {
                                    positionClass: 'toast-top-left',
                                    containerId: 'toast-top-left'
                                });

                            },
                            error: function(er) {
                                toastr.error('هناك خطأ في الحدف', 'السلام عليكم', {
                                    positionClass: 'toast-top-left',
                                    containerId: 'toast-top-left'
                                });
                                console.log(er);
                            }
                        });
                    },
                },

                fields: [
                    // id field
                    {
                        name: 'id',
                        type: "number",
                        title: 'م.',
                        readOnly: false,
                        inserting: false,
                        editing: false,
                    },
                    // name
                    {
                        name: "name",
                        type: "text",
                        title: 'اسم الدائرة/ القسم',
                        width: 'auto'
                    },
                    // director name
                    {
                        name: "director_name",
                        type: "text",
                        title: 'اسم المدير',
                        width: 'auto'
                    },
                    // controls
                    {
                        type: "control",
                        width: 100,
                    }

                ]
            });

        });
    </script>
@endsection

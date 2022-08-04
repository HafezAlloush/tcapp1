@extends('layouts.app')
@section('contnet')
    <div>الدوائر والأقسام</div>
    <div class="container pt-1">
        <div id="jsGrid"></div>
    </div>
@endsection


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
                pageSize: 5,
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
                                toastsuccess();
                            },
                            error: function(er) {
                                toastError(er);
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
                            success: function() {
                                toastsuccess();
                            },
                            error: function(er) {
                                toastError(er);
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
            
            // set active list
            activeList('#departments')
        });
    </script>
@endsection

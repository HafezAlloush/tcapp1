@extends('layouts.app')
@section('contnet')
    <div>الطلاب</div>
    {{-- <div>
        @foreach ($students as $student )
            {{ $student->full_name }}
        @endforeach
    </div> --}}
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
                inserting: false,
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
                            url: "{{ route('students') }}",
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
                        name: 'PID',
                        type: "number",
                        title: 'الهوية',
                        readOnly: false,
                        inserting: false,
                        editing: false,
                        width: 120
                    },
                    // first name
                    {
                        name: "first_name",
                        type: "text",
                        title: 'اسم الطالب',
                        width: 'auto'
                    },
                    // father name
                    {
                        name: "father_name",
                        type: "text",
                        title: 'الأب',
                        width: 'auto'
                    },
                    // grand
                    {
                        name: "grand_name",
                        type: "text",
                        title: 'الجد',
                        width: 'auto'
                    },
                    // family
                    {
                        name: "family_name",
                        type: "text",
                        title: 'العائلة',
                        width: 'auto'
                    },
                   
                    // department Name
                    {
                        name: "department.name",
                        type: "text",
                        title: 'الدائرة/القسم',
                        width: 'auto'
                    },
                    // city
                    {
                        name: "city",
                        type: "text",
                        title: 'العنوان',
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
            activeList('#students')
        });
    </script>
@endsection

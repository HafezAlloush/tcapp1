<div class="container pt-1">

    @csrf
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
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
                pageFirstText :'الأول',
                pageLastText  :'الأخير',
                pageNextText:'التالي',
                pagePrevText:'السابق',
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
                            data: item
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

                                console.log(err.responseJSON.errors.name);
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
                            data: item
                        });
                    },



                },

                fields: [

                    {
                        name: 'id',
                        type: "number",
                        title: 'م.',
                        readOnly: false
                    },
                    {
                        name: "name",
                        type: "text",
                        title: 'اسم الدائرة/ القسم',
                        width: 'auto'
                    },
                    {
                        name: "director_name",
                        type: "text",
                        title: 'اسم المدير',
                        width: 'auto'
                    },
                    {
                        type: "control",
                        width: 100,
                    }

                ]
            });

        });
    </script>
@endsection

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
                pageSize: 6,
                pageButtonCount: 5,

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
                            error: function(e1, e2, e3) {
                                console.log(e1.responseJSON.errors.name);
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
                        type: "control",
                        width: 100,
                    }

                ]
            });

        });
    </script>
@endsection

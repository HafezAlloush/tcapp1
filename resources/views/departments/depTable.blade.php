<div class="container pt-3">
    <button class="btn btn-success middle" onclick="getdata()">click me</button>

    <div id="jsGrid"></div>
</div>

<script>
      $(document).ready(function() {
            $("#jsGrid").jsGrid({
                height: "auto",
                width: "100%",
                filtering: true,
                sorting: true,
                paging: true,
                autoload: true,
                editing: true,
                pageSize: 6,
                pageButtonCount: 5,

                controller: {
                    loadData: function(filter) {
                        return $.ajax({
                            url: "{{ route('deplist') }}",
                            type: 'Get',
                            data: filter,
                        });
                    }
                },

                fields: [

                    {
                        name: 'id',
                        type: "number",
                        readOnly:true
                    },
                    {
                        name: "name",
                        type: "text",
                        width:'auto'
                    },
                    {
                        type: "control"
                    }

                ]
            });

        });
</script>
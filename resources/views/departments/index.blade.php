@extends('layouts.app')
@section('contnet')
    <div>
        <div id="jsGrid"></div>
        <button class="btn btn-success" id="btn" onclick="getdep()">click me</button>
    </div>


    {{-- <!-- Basic scenario start -->
    <section id="basic">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Basic Scenario</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard ">
                            <p>Grid with filtering, editing, inserting, deleting, sorting and
                                paging. Data provided by controller.</p>
                            <div id="basicScenario"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Basic scenario end -->
    <!-- OData service scenario start -->
    <section id="odata-service">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">OData Service Scenario</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard ">
                            <p>Controller loadData method requests data from OData service with
                                ajax. Any asynchronous source could be used instead. Just return
                                jQuery.promise from controller method. Field option itemTemplate
                                allows to render any custom cell content, just return your
                                markup as string, DOM Node or jQuery Element.</p>
                            <div id="serviceScenario"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- OData service scenario end -->

    <!-- Validation scenario start -->
    <section id="validation-scenario">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Validation Scenario</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard ">
                            <p>Grid supports field values validation for inserting and editing.
                                There are plenty of built-in validators available. Furthermore
                                custom validators can be easily added.</p>
                            <div id="validation"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Validation scenario end --> --}}
@endsection

@section('scripts')
    <script>
        $(function() {
            $('#departments').addClass('active');

            var clients = [{
                    "Name": "Otto Clay",
                    "Age": 25,
                    "Country": 1,
                    "Address": "Ap #897-1459 Quam Avenue",
                    "Married": false
                },
                {
                    "Name": "Connor Johnston",
                    "Age": 45,
                    "Country": 2,
                    "Address": "Ap #370-4647 Dis Av.",
                    "Married": true
                },
                {
                    "Name": "Lacey Hess",
                    "Age": 29,
                    "Country": 3,
                    "Address": "Ap #365-8835 Integer St.",
                    "Married": false
                },
                {
                    "Name": "Timothy Henson",
                    "Age": 56,
                    "Country": 1,
                    "Address": "911-5143 Luctus Ave",
                    "Married": true
                },
                {
                    "Name": "Ramona Benton",
                    "Age": 32,
                    "Country": 3,
                    "Address": "Ap #614-689 Vehicula Street",
                    "Married": false
                }
            ];

            var countries = [{
                    Name: "",
                    Id: 0
                },
                {
                    Name: "United States",
                    Id: 1
                },
                {
                    Name: "Canada",
                    Id: 2
                },
                {
                    Name: "United Kingdom",
                    Id: 3
                }
            ];

            $("#jsGrid").jsGrid({
                width: "100%",
                height: "400px",

                inserting: true,
                editing: true,
                sorting: true,
                paging: true,

                controller: {
                    loadData: function() {
                        var d = $.Deferred();

                        $.ajax({
                            url: "{{ route('departments') }}",
                            dataType: "json"
                        }).done(function(response) {
                            d.resolve(response.value);
                            console.log('response');
                        });

                        return d.promise();
                    }
                },

                fields: [{
                        name: "Name",
                        type: "text",
                        width: 150,
                        validate: "required"
                    },

                    {
                        type: "control"
                    }
                ]
            });


        });

    //    function getdep() {
    //     $.ajax({
    //         type: "Get",
    //         url: "/departments",
    //         data: "data",
    //         dataType: "dataType",
    //         success: function (response) {
    //             alert('hi')
    //         }, 
    //         error:function(er){
    //             console.log('error');
    //         }
    //     });
        
    //    }
    </script>
@endsection

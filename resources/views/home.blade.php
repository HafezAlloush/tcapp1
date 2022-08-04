@extends('layouts.app')
@section('contnet')
    <div class="row">
        <div class="col-lg-6 col-12">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h6 class="text-muted">الدوائر والأقسام </h6>
                                <h3>{{ App\Models\Department::count() }}</h3>

                            </div>
                            <div class="align-self-center">
                                <i class="icon-trophy success font-large-2 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // set active list
            activeList('#home')
        });
    </script>
@endsection

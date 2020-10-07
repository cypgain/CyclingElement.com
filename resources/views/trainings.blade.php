@extends('layouts.default')

@section('title') Trainings @endsection

@section('content')
    <div class="col-sm-12">
        <div class="card height-equal">
            <div class="card-body">
                <ul class="nav nav-pills float-left" id="pills-icontab" role="tablist">
                    <li class="nav-item"><a class="nav-link active" id="pills-planning-tab" data-toggle="pill" href="#pills-planning" role="tab" aria-controls="pills-planning" aria-selected="true"><i class="fa fa-calendar"></i>Planning</a></li>
                    <li class="nav-item"><a class="nav-link" id="pills-edit-tab" data-toggle="pill" href="#pills-edit" role="tab" aria-controls="pills-edit" aria-selected="false"><i class="fa fa-edit"></i>Edit</a></li>
                    <li class="nav-item"><a class="nav-link" id="pills-add-tab" data-toggle="pill" href="#pills-add" role="tab" aria-controls="pills-add" aria-selected="false"><i class="fa fa-plus-circle"></i>Add</a></li>
                </ul>

                <div class="clearfix"></div>

                <div class="tab-content" id="pills-icontabContent">
                    <div class="tab-pane fade show active" id="pills-planning" role="tabpanel" aria-labelledby="pills-planning-tab">
                        <div class="bg-primary p-25 b-r-5 mb-3 mt-4">Aujourd'hui</div>
                        <div class="bg-dark p-15 p-l-25 b-r-5 mb-2">Etirements</div>
                        <div class="bg-dark p-15 p-l-25 b-r-5 mb-2">Abdos</div>
                        <div class="bg-primary p-25 b-r-5 mb-3 mt-4">Demain</div>
                        <div class="bg-dark p-15 p-l-25 b-r-5 mb-2">Etirements</div>
                        <div class="bg-dark p-15 p-l-25 b-r-5 mb-2">Abdos</div>
                    </div>

                    <div class="tab-pane fade" id="pills-edit" role="tabpanel" aria-labelledby="pills-edit-tab">
                        <div class="bg-primary p-25 b-r-5 mb-3 mt-4">Recurrents</div>
                        <div class="bg-dark p-15 p-l-25 p-r-25 b-r-5 mb-2">
                            <span>
                                <a href="#" class="txt-light mr-2">
                                    <i class="fa fa-trash-o hover-link"></i>
                                </a>
                                Etirements
                            </span>
                            <span class="float-right">Tous les lundis</span>
                        </div>
                        <div class="bg-dark p-15 p-l-25 p-r-25 b-r-5 mb-2">
                            <span>
                                <a href="#" class="txt-light mr-2">
                                    <i class="fa fa-trash-o hover-link"></i>
                                </a>
                                Abdos
                            </span>
                            <span class="float-right">Tous les jours</span>
                        </div>
                        <div class="bg-primary p-25 b-r-5 mb-3 mt-4">Mercredi 7 Octobre</div>
                        <div class="bg-dark p-15 p-l-25 p-r-25 b-r-5 mb-2">
                            <span>
                                <a href="#" class="txt-light mr-2">
                                    <i class="fa fa-trash-o hover-link"></i>
                                </a>
                                Abdos
                            </span>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-add" role="tabpanel" aria-labelledby="pills-add-tab"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

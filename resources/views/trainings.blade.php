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

                <div class="tab-content mt-4" id="pills-icontabContent">
                    <div class="tab-pane fade show active" id="pills-planning" role="tabpanel" aria-labelledby="pills-planning-tab">
                        <div class="bg-primary p-25 b-r-5 mb-3">Aujourd'hui</div>
                        <div class="bg-dark p-15 p-l-25 b-r-5 mb-2">
                            <span>
                                <a href="#" class="txt-light mr-2">
                                    <i class="fa fa-times hover-link"></i>
                                </a>
                                <span class="text-line-through">Etirements</span>
                            </span>
                        </div>
                        <div class="bg-dark p-15 p-l-25 b-r-5 mb-2">
                            <span>
                                <a href="#" class="txt-light mr-2">
                                    <i class="fa fa-check hover-link"></i>
                                </a>
                                <span>Etirements</span>
                            </span>
                        </div>
                        <div class="bg-primary p-25 b-r-5 mb-3 mt-4">Demain</div>
                        <div class="bg-dark p-15 p-l-25 b-r-5 mb-2">
                            <span>
                                <a href="#" class="txt-light mr-2">
                                    <i class="fa fa-check hover-link"></i>
                                </a>
                                <span>Etirements</span>
                            </span>
                        </div>
                        <div class="bg-dark p-15 p-l-25 b-r-5 mb-2">
                            <span>
                                <a href="#" class="txt-light mr-2">
                                    <i class="fa fa-check hover-link"></i>
                                </a>
                                <span>Etirements</span>
                            </span>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-edit" role="tabpanel" aria-labelledby="pills-edit-tab">
                        <div class="bg-primary p-25 b-r-5 mb-3">Recurrent</div>
                        <div class="bg-dark p-15 p-l-25 p-r-25 b-r-5 mb-2">
                            <span>
                                <a href="#" class="txt-light mr-2">
                                    <i class="fa fa-trash-o hover-link"></i>
                                </a>
                                Etirements
                            </span>
                            <span class="float-right">Every monday between 01/10/2020 and 10/10/2020</span>
                        </div>
                        <div class="bg-dark p-15 p-l-25 p-r-25 b-r-5 mb-2">
                            <span>
                                <a href="#" class="txt-light mr-2">
                                    <i class="fa fa-trash-o hover-link"></i>
                                </a>
                                Abdos
                            </span>
                            <span class="float-right">Everyday between 01/10/2020 and 10/10/2020</span>
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

                    <div class="tab-pane fade" id="pills-add" role="tabpanel" aria-labelledby="pills-add-tab">
                        <form class="theme-form" id="recurrence-date" method="post" action="">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control b-r-5 h-50px @error('name') is-invalid @enderror" placeholder="Training Name" value="{{ old('name') }}" required />

                                @error('name')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="recurrence">Recurrence</label>

                                <select class="form-control btn-square digits b-r-5 h-50px" id="recurrence-1" name="recurrence">
                                    <option value="0">No recurrence</option>
                                    <option value="1">Every monday</option>
                                    <option value="2">Every tuesday</option>
                                    <option value="3">Every wednesday</option>
                                    <option value="4">Every thursday</option>
                                    <option value="5">Every friday</option>
                                    <option value="6">Every saturday</option>
                                    <option value="7">Every sunday</option>
                                    <option value="8">Everyday</option>
                                </select>

                                @error('recurrence')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="date">Date</label>
                                <input class="form-control digits b-r-5 h-50px" type="date" value="2018-01-01" name="date" id="date" required />
                            </div>
                        </form>

                        <form class="theme-form" id="recurrence-start-end" method="post" action="">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control b-r-5 h-50px @error('name') is-invalid @enderror" placeholder="Training Name" value="{{ old('name') }}" required />

                                @error('name')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="recurrence">Recurrence</label>

                                <select class="form-control btn-square digits b-r-5 h-50px" id="recurrence-2" name="recurrence">
                                    <option value="0">No recurrence</option>
                                    <option value="1">Every monday</option>
                                    <option value="2">Every tuesday</option>
                                    <option value="3">Every wednesday</option>
                                    <option value="4">Every thursday</option>
                                    <option value="5">Every friday</option>
                                    <option value="6">Every saturday</option>
                                    <option value="7">Every sunday</option>
                                    <option value="8">Everyday</option>
                                </select>

                                @error('recurrence')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="start_date">Start date</label>
                                        <input class="form-control digits b-r-5 h-50px" type="date" value="2018-01-01" name="start_date" id="start_date" required />
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="end_date">End date</label>
                                        <input class="form-control digits b-r-5 h-50px" type="date" value="2018-01-01" name="end_date" id="end_date" required />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/trainings.js') }}"></script>
@endsection

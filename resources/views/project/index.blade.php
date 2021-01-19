@extends('layouts.app')
@section('content')
<div class="section-body">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="d-flex justify-content-between align-items-center">
<ul class="nav nav-tabs page-header-tab">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addtask"><i class="fe fe-plus mr-2"></i>Add Project</button>
</ul>
<div class="header-action d-md-flex">
<div class="input-group mr-2">
<input type="text" class="form-control" placeholder="Search...">
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="section-body mt-3">
<div class="container-fluid">
<div class="tab-content">
<div class="tab-pane fade show active" id="Project-OnGoing" role="tabpanel">
<div class="row">
    @foreach ($allProjects as $project)

    <div class="col-lg-6 col-md-12">
    <div class="card">
    <div class="card-header">
    <h3 class="card-title">Project Reference Number : {{$project->reference_number}}</h3>
    <div class="card-options">
    <label class="custom-switch m-0">
    <input type="checkbox" value="1" class="custom-switch-input" checked>
    <span class="custom-switch-indicator"></span>
    </label>
    <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
    </div>
    </div>
    <div class="card-body">
    <span class="tag tag-blue mb-3">{{$project->name}}</span>
    <div class="row">
    <div class="col-5 py-1"><strong>Project Manager:</strong></div>
    <div class="col-7 py-1">{{$project->project_manager}}</div>
    <div class="col-5 py-1"><strong>Project Sponsor:</strong></div>
    <div class="col-7 py-1">{{$project->project_sponsor}}</div>
    <div class="col-5 py-1"><strong>Pursuit Lead:</strong></div>
    <div class="col-7 py-1">{{$project->pursuit_lead}}</div>
    <div class="col-5 py-1"><strong>Market Sector:</strong></div>
    <div class="col-7 py-1">{{$project->market_sector}}</div>
    <div class="col-5 py-1"><strong>Type of Work:</strong></div>
    <div class="col-7 py-1">{{$project->type_of_work}}</div>
    <div class="col-5 py-1"><strong>Region:</strong></div>
    <div class="col-7 py-1">{{$project->region}}</div>
    <div class="col-5 py-1"><strong>Expected Start Date:</strong></div>
    <div class="col-7 py-1">{{$project->expected_start_date}}</div>
    <div class="col-5 py-1"><strong>Expected End Date:</strong></div>
    <div class="col-7 py-1">{{$project->expected_end_date}}</div>
    </div>
    </div>
    </div>
    </div>
    @endforeach
</div>



</div>
</div>
<div class="tab-pane fade" id="Project-add" role="tabpanel">


</div>
</div>
</div>
</div>



<div class="modal fade" id="addtask" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
    <form action="{{route('project.store')}}" method="post">
        @csrf
    <div class="modal-content">
    <div class="modal-header">
    <h6 class="title" id="defaultModalLabel">Add New Project</h6>
    </div>
    <div class="modal-body">
    <div class="row clearfix">
    <div class="col-12">
    <div class="form-group">
    <input type="text" class="form-control" placeholder="Project Name" name="name">
    </div>
    <div class="form-group">
    <input type="text" class="form-control" placeholder="Project Reference Number" name="reference_number">
    </div>
    <div class="form-group">
    <input type="text" class="form-control" placeholder="Project Manager" name="project_manager">
    </div>
    <div class="form-group">
    <input type="text" class="form-control" placeholder="Project Sponsor" name="project_sponsor">
    </div>
    <div class="form-group">
    <input type="text" class="form-control" placeholder="Project Pursuit Lead" name="pursuit_lead">
    </div>
    <div class="form-group">
    <input type="text" class="form-control" placeholder="Market Sector" name="market_sector">
    </div>
    <div class="form-group">
    <input type="text" class="form-control" placeholder="Type of Work" name="type_of_work">
    </div>
    <div class="form-group">
    <input type="text" class="form-control" placeholder="Region" name="region">
    </div>
    <div class="form-group">
    <input type="text" class="form-control" placeholder="Expected Start Date" name="expected_start_date">
    </div>
    <div class="form-group">
    <input type="text" class="form-control" placeholder="Expected End Date" name="expected_end_date">
    </div>
    </div>

    </div>
    </div>
    <div class="modal-footer">
    <button type="submit" class="btn btn-primary">Save</button>
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

</div>
</form>
    </div>
    </div>
    </div>
@endsection

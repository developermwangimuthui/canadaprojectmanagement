@extends('layouts.app')
@section('content')
<div class="section-body">
<div class="container-fluid">
<div class="row">
    @foreach ($projectspursuitsummarys as $project)
<div class="col-md-12">
<div class="d-flex justify-content-between align-items-center">


</div>
</div>
</div>

<div class="section-body mt-3">
<div class="container-fluid">

    <form action="{{route('ppsUpdate')}}" method="post">
        @csrf
    <h6 class="title" id="defaultModalLabel">Edit Project Pursuit Summary</h6>

    <div class="row ">
    <div class="col-md-12 ">
    <div class="form-group">
        <label for="">Background/Opportunity Source</label>
    <input type="text" class="form-control" placeholder="Background/Opportunity Source" name="bos" value="{{$project->bos}}">
    <input type="hidden" class="form-control"  name="id" value="{{$id}}">
    </div>
    <div class="form-group">

        <label for="">Scope to be Completed</label>
    <input type="text" class="form-control" placeholder="Scope to be Completed" name="stbc" value="{{$project->stbc}}">
    </div>
    <div class="form-group">

        <label for="">Expected Delivarables From Client</label>
    <input type="text" class="form-control" placeholder="Expected Delivarables From Client" name="pedc" value="{{$project->pedc}}">
    </div>
    <div class="form-group">

        <label for="">Proposal timeline (due date to submit)</label>
    <input type="text" class="form-control" placeholder="Proposal timeline (due date to submit)" name="proposal_timeline" value="{{$project->proposal_timeline}}">
    </div>
    <div class="form-group">

        <label for="">Project timeline (start and end dates)</label>
    <input type="text" class="form-control" placeholder="Project timeline (start and end dates)" name="project_timeline" value="{{$project->project_timeline}}">
    </div>
    <div class="form-group">

        <label for="">Project Stakeholders</label>
    <input type="text" class="form-control" placeholder="Project Stakeholders" name="project_stakeholders" value="{{$project->project_stakeholders}}">
    </div>
    <div class="form-group">

        <label for="">Project Bid requirements</label>
    <input type="text" class="form-control" placeholder="Project Bid requirements" name="pb_requirements" value="{{$project->pb_requirements}}">
    </div>
    <div class="form-group">

        <label for="">Identified potential Risk items</label>
    <input type="text" class="form-control" placeholder="Identified potential Risk items" name="ipri" value="{{$project->ipri}}">
    </div>
    <div class="form-group">

        <label for="">Info supplied by client</label>
    <input type="text" class="form-control" placeholder="Info supplied by client" name="isbc" value="{{$project->isbc}}">
    </div>
    <div class="form-group">

        <label for="">Communications notes</label>
    <input type="text" class="form-control" placeholder="Communications notes" name="communication_notes" value="{{$project->communication_notes}}">
    </div>
    <div class="form-group">

        <label for="">Opportunity for additional value</label>
    <input type="text" class="form-control" placeholder="Opportunity for additional value" name="ofav" value="{{$project->ofav}}">
    </div>
    <div class="form-group">

        <label for="">SR&ED Opportunity</label>
    <input type="text" class="form-control" placeholder="SR&ED Opportunity" name="sredo" value="{{$project->sredo}}">
    </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
    </div>

</form>
    @endforeach




</div>
</div>
</div>

    </div>
@endsection

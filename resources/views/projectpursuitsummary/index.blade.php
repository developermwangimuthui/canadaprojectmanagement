@extends('layouts.app')
@section('content')
<div class="section-body">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="d-flex justify-content-between align-items-center">
<ul class="nav nav-tabs page-header-tab mt-2">
    {{-- @foreach ($projectspursuitsummarys as $project) --}}
    {{-- @if (\App\Models\ProjectPursuitSummary::where('project_id',$id)->first())

    <a href="{{route('ppsEdit',$project->id)}}" class="btn btn-primary"><i class="fa fa-pencil mr-2"></i>Edit Project Pursuit Summary</a>
    @else --}}
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addtask"><i class="fe fe-plus mr-2"></i>Add Project Pursuit Summary</button>


   {{-- @endif --}}
   {{-- {{ $id}} --}}
    {{-- @endforeach --}}
</ul>



</div>
</div>
</div>

<div class="section-body mt-3">
<div class="container-fluid">
<div class="tab-content">
<div class="tab-pane fade show active" id="Project-OnGoing" role="tabpanel">
<div class="row">
    @foreach ($projectspursuitsummarys as $project)
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
          </tr>

        </thead>
        <tbody>
          <tr>
            <td >Background / opportunity source</td>
            <td >{{$project->bos}}</td>
          </tr>
          <tr>
            <td >Scope to be completed</td>
            <td >{{$project->stbc}}</td>
          </tr>
          <tr>
            <td >Project expected deliverables from client</td>
            <td >{{$project->pedc}}</td>
          </tr>
          <tr>
            <td >Proposal timeline (due date to submit)</td>
            <td >{{$project->proposal_timeline}}</td>
          </tr>
          <tr>
            <td >Project timeline (start and end dates)</td>
            <td >{{$project->project_timeline}}</td>
          </tr>
          <tr>
            <td >Project Stakeholders</td>
            <td >{{$project->project_stakeholders}}</td>
          </tr>
          <tr>
            <td >Project Bid requirements</td>
            <td >{{$project->pb_requirements}}</td>
          </tr>
          <tr>
            <td >Identified potential Risk items</td>
            <td >{{$project->ipri}}</td>
          </tr>
          <tr>
            <td >Info supplied by client</td>
            <td >{{$project->isbc}}</td>
          </tr>
          <tr>
            <td >Communications notes</td>
            <td >{{$project->communication_notes}}</td>
          </tr>
          <tr>
            <td >Opportunity for additional value</td>
            <td >{{$project->ofav}}</td>
          </tr>
          <tr>
            <td >SR&ED Opportunity</td>
            <td >{{$project->sredo}}</td>
          </tr>


         </tbody>
      </table>
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
    <form action="{{route('pps.store')}}" method="post">
        @csrf
    <div class="modal-content">
    <div class="modal-header">
    <h6 class="title" id="defaultModalLabel">Add New Project Pursuit Summary</h6>
    </div>
    <div class="modal-body">
    <div class="row clearfix">
    <div class="col-12">
    <div class="form-group">
    <input type="text" class="form-control" placeholder="Background/Opportunity Source" name="bos">
    <input type="hidden" class="form-control"  name="project_id" value="{{$id}}">
    </div>
    <div class="form-group">
    <input type="text" class="form-control" placeholder="Scope to be Completed" name="stbc">
    </div>
    <div class="form-group">
    <input type="text" class="form-control" placeholder="Expected Delivarables From Client" name="pedc">
    </div>
    <div class="form-group">
    <input type="text" class="form-control" placeholder="Proposal timeline (due date to submit)" name="proposal_timeline">
    </div>
    <div class="form-group">
    <input type="text" class="form-control" placeholder="Project timeline (start and end dates)" name="project_timeline">
    </div>
    <div class="form-group">
    <input type="text" class="form-control" placeholder="Project Stakeholders" name="project_stakeholders">
    </div>
    <div class="form-group">
    <input type="text" class="form-control" placeholder="Project Bid requirements" name="pb_requirements">
    </div>
    <div class="form-group">
    <input type="text" class="form-control" placeholder="Identified potential Risk items" name="ipri">
    </div>
    <div class="form-group">
    <input type="text" class="form-control" placeholder="Info supplied by client" name="isbc">
    </div>
    <div class="form-group">
    <input type="text" class="form-control" placeholder="Communications notes" name="communication_notes">
    </div>
    <div class="form-group">
    <input type="text" class="form-control" placeholder="Opportunity for additional value" name="ofav">
    </div>
    <div class="form-group">
    <input type="text" class="form-control" placeholder="SR&ED Opportunity" name="sredo">
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
